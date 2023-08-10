<?php
/*
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

// use Webify\Base\Infrastructure\Service\Theme\Theme as BaseTheme;

use Webify\Base\Domain\Service\Theme\ThemeInterface;
use yii\base\Theme as BaseTheme;

use function Webify\Base\Infrastructure\app;
use function Webify\Base\Infrastructure\url;

/**
 * WebifyCMS Green theme main class.
 */
final class Theme extends BaseTheme implements ThemeInterface
{
	public function init(): void
	{
		$this->setBasePath(\dirname(__DIR__));
		$this->setBaseUrl($this->publishAssets());

		$this->pathMap = [
			'@App/templates'  => $this->getBasePath() . '/templates',
		];

		parent::init();
	}

	public function getId(): string
	{
		return 'green';
	}

	/**
	 * Published assets of this theme to the public folder.
	 */
	private function publishAssets(): string
	{
		$published = app()->assetManager->publish(\dirname(__DIR__) . '/dist');

		return url($published[1]);
	}
}
