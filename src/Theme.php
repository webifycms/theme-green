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

use Webify\Base\Domain\Service\Theme\ThemeInterface;
use Webify\Base\Infrastructure\Service\Theme\Theme as BaseTheme;

/**
 * WebifyCMS Green theme main class.
 */
final class Theme extends BaseTheme implements ThemeInterface
{
	public const THEME_ID = 'green';

	public function init(): void
	{
		$this->setBasePath(\dirname(__DIR__));

		$this->pathMap    = [
			'@App/templates' => $this->getBasePath() . '/templates',
		];

		parent::init();
	}

	public function getId(): string
	{
		return self::THEME_ID;
	}
}
