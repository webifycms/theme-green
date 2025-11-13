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

use Webify\Base\Infrastructure\Component\Theme\ThemeComponent;

use function dirname;

/**
 * WebifyCMS Green theme main class.
 */
final class Theme extends ThemeComponent
{
	public const THEME_ID = 'green';

	public function init(): void
	{
		$this->setBasePath(dirname(__DIR__));
		parent::init();
	}

	public function getId(): string
	{
		return self::THEME_ID;
	}
}
