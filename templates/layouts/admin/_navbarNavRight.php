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

use Webify\Base\Infrastructure\Component\View\WebViewComponent;
use Yiisoft\Yii\Widgets\Menu;

/**
 * @var WebViewComponent $this
 */
?>

<div class="uk-navbar-right">
    <ul class="uk-navbar-nav">
        <li>
            <a href="<?= home_url(); ?>" target="_blank">
                <i class="bi bi-window"></i>
            </a>
        </li>
        <li>
            <a href="#adminMenu" uk-toggle>
                <i class="bi bi-app"></i>
            </a>

            <div id="adminMenu" class="uk-modal-full" uk-modal>
                <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" uk-height-viewport>
                    <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>

                    <div class="uk-container">
                        <?= Menu::widget()
                        	->activateItems(false)
                        	->activeClass('uk-active')
                        	->itemsTag('div')
                        	->itemsContainerClass('admin-menu-item')
                        	->tagName('div')
                        	->attributes([
                        		'class'   => 'uk-grid-small uk-child-width-auto uk-flex-center uk-grid-match uk-text-center',
                        		'uk-grid' => true,
                        	])
                        	->items($this->params['primaryMenuItems'] ?? [])
                        	->linkClass('uk-display-block uk-text-center uk-padding-small')
                        	->render()
;
?>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a href="#">
                <i class="bi bi-person-circle"></i>
            </a>
            <div uk-dropdown="animation: uk-animation-slide-top-small; duration: 500; mode: click">
                <ul id="userDropdown" class="uk-nav uk-dropdown-nav">
                    <li>
                        <a href="#">
                            <i class="bi bi-person-vcard"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="uk-nav-divider"></li>
                    <li>
                        <a href="#">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>
