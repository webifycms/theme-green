<?php

/**
 * The file is part of the "webifycms/theme-green", WebifyCMS theme package.
 *
 * @see https://webifycms.com/theme/green
 *
 * @copyright Copyright (c) 2023 WebifyCMS
 * @license https://webifycms.com/theme/green/license
 * @author Mohammed Shifreen <mshifreen@gmail.com>
 */
declare(strict_types=1);

namespace Webify\Green;

use Webify\Base\Domain\Exception\TranslatableRuntimeException;

use function Webify\Base\Infrastructure\get_alias;

/**
 * Provides utility methods for working with Vite in a PHP application.
 * This class supports both development mode (with a running Vite dev server)
 * and production mode (with a generated manifest.json file).
 */
final class ViteHelper
{
	/**
	 * Path to the distribution directory for theme green assets.
	 */
	public string $distPath = '@Theme/dist';

	/**
	 * Specifies the file path to the main JavaScript entry point for the application.
	 * It should match with Vite configuration.
	 */
	public string $entryPoint = 'assets/js/main.js';

	/**
	 * Specifies the file location of the Vite manifest file.
	 */
	private string $manifestFile = 'manifest.json';

	public function __construct(public string $devServerUrl) {}

	/**
	 * Checks if the development server is currently running.
	 *
	 * @return bool returns true if the development server is running, otherwise false
	 */
	public function isDevServerRunning(): bool
	{
		try {
			return !empty(file_get_contents($this->devServerUrl . '/@vite/client'));
		} catch (\Throwable) {
			return false;
		}
	}

	/**
	 * Retrieves the manifest file and extracts the configuration for the specified entry point.
	 *
	 * @return array<string, mixed> the configuration for the specified entry point within the Vite manifest file
	 *
	 * @throws TranslatableRuntimeException if the manifest file is not found, cannot be read,
	 *                                      or the entry point is missing
	 */
	public function getManifest(): array
	{
		$manifestFilePath = get_alias($this->distPath . '/' . $this->manifestFile);

		if (null === $manifestFilePath || !file_exists($manifestFilePath)) {
			throw new TranslatableRuntimeException('green.unable_to_find_vite_manifest_file');
		}

		$content = file_get_contents($manifestFilePath);

		if (!$content) {
			throw new TranslatableRuntimeException('green.unable_to_read_vite_manifest_file');
		}

		$manifest = json_decode($content, true);

		if (!isset($manifest[$this->entryPoint])) {
			throw new TranslatableRuntimeException(
				'green.entry_point_not_found',
				['entryPoint' => $this->entryPoint]
			);
		}

		return $manifest[$this->entryPoint];
	}
}
