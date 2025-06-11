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

use Webify\Green\ThemeAssets;
use yii\web\View;
use yii\widgets\Menu;
use function Webify\Base\Infrastructure\app;

/**
 * @var View   $this
 * @var string $content
 */
ThemeAssets::register($this);
?>

<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= app()->language; ?>">
    <head>
        <meta charset="<?= app()->charset; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags(); ?>

        <title><?= app()->name; ?></title>

        <?php $this->head(); ?>
    </head>

    <body>
        <?php $this->beginBody(); ?>

        <header class="page-header uk-box-shadow-medium" uk-sticky="sel-target: .uk-navbar-container" id="pageHeader">
            <div class="uk-navbar-container uk-navbar-transparent">
                <div class="uk-container uk-container-expand">
                    <nav class="uk-navbar" uk-navbar>
                        <?= $this->render('_navbarNavLeft'); ?>

                        <?= $this->render('_navbarNavRight'); ?>
                    </nav>
                </div>
            </div>
        </header>

        <aside class="page-sidebar uk-position-fixed" id="pageSidebar">
            <?= Menu::widget([
                'items'          => $this->params['sidebarNavItems'] ?? [],
                'encodeLabels'   => false,
                'activeCssClass' => 'uk-active',
                'options'        => [
                    'class' => 'uk-nav uk-nav-default sidebar-nav'
                ]
            ]) ?>

            <div class="page-sidebar-footer uk-position-fixed">
                <ul class="uk-subnav uk-subnav-pill uk-margin-remove-bottom">
                    <li>
                        <a href="#">
                            <i class="bi bi-brightness-low uk-text-large"></i>
                        </a>
                        <div uk-dropdown="mode: click">
                            <ul class="uk-nav uk-dropdown-nav">
                                <li class="uk-active"><a href="#">Active</a></li>
                                <li><a href="#">Item</a></li>
                                <li class="uk-nav-header">Header</li>
                                <li><a href="#">Item</a></li>
                                <li><a href="#">Item</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="#">Item</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>

        <main class="page-content" id="pageContent">
            <div class="uk-container uk-container-expand">
                <?= $content ?>
            </div>

            <footer class="page-footer uk-margin-top uk-text-right uk-position-fixed" id="pageFooter">
                <div class="uk-container uk-container-expand">
                    <p class="uk-padding-small uk-padding-remove-horizontal">Made with WebifyCMS</p>
                </div>
            </footer>
        </main>

        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>