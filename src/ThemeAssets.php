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

use Webify\Base\Domain\Service\Config\ConfigServiceInterface;
use yii\web\AssetBundle;
use yii\web\View;

/**
 * The ThemeAssets class is responsible for managing theme assets during both development
 * and production phases. It integrates with the Vite.js tool for modern build processes.
 */
final class ThemeAssets extends AssetBundle
{
	public $jsOptions = [
		'type'     => 'module',
		'position' => View::POS_HEAD,
	];

	public $cssOptions = [
		'rel'    => 'preload',
		'as'     => 'style',
		'onload' => "this.rel = 'stylesheet'",
	];

	private ViteHelper $viteHelper;

	/**
	 * The class constructor.
	 *
	 * @param array<string, mixed> $config
	 */
	public function __construct(
		private readonly ConfigServiceInterface $configService,
		array $config = []
	) {
		$this->viteHelper = new ViteHelper($this->configService->getConfig('vite.dev_server_url'));

		parent::__construct($config);
	}

	/**
	 * {@inheritDoc}
	 *
	 * Initialises the necessary helper and asset configurations of the theme.
	 */
	public function init(): void
	{
		$this->setDevAssets();
		$this->setProductionAssets();
		parent::init();
	}

	/**
	 * Configures development assets when the Vite development server is running.
	 */
	private function setDevAssets(): void
	{
		if (!$this->viteHelper->isDevServerRunning()) {
			return;
		}

		$this->baseUrl = $this->viteHelper->devServerUrl;
		$this->js      = [
			'@vite/client',
			'assets/js/main.js',
		];
	}

	/**
	 * Sets the production assets by retrieving and processing the manifest file
	 * when the development server is not running.
	 */
	private function setProductionAssets(): void
	{
		if ($this->viteHelper->isDevServerRunning()) {
			return;
		}

		$this->sourcePath = $this->viteHelper->distPath;
		$manifest         = $this->viteHelper->getManifest();

		if (isset($manifest['css'])) {
			foreach ($manifest['css'] as $css) {
				$this->css[] = $css;
			}
		}

		$this->js[] = $manifest['file'];
	}
}
