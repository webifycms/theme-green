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

namespace Webify\Green\Widget;

use Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Menu;

use function Webify\Base\Infrastructure\administration_url;

/**
 * Administration menu widget.
 */
final class AdminMenuWidget extends Menu
{
	/**
	 * @param array<string, mixed> $item
     * @throws Exception
	 */
	protected function renderItem($item): string
	{
		$template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);

		return strtr(
			$template,
			[
				'{url}'   => isset($item['url']) ? Html::encode(administration_url($item['url'])) : '#',
				'{label}' => $this->renderLabel($item),
			]
		);
	}

	/**
	 * @param array<string, mixed> $item
     * @throws Exception
	 */
	protected function renderLabel(array $item): string
	{
		$template = ArrayHelper::getValue($item, 'template', $this->labelTemplate);

		return strtr(
			$template,
			[
				'{icon}'  => $this->renderIcon($item['icon']),
				'{label}' => $item['label'],
			]
		);
	}

	/**
	 * Render icon template.
	 *
	 * @param string $name the rendered html image tag
	 */
	protected function renderIcon(string $name): string
	{
		return Html::tag('i', '', ['class' => "bi bi-{$name}"]);
	}
}
