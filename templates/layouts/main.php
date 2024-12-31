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

use function Webify\Base\Infrastructure\app;
use function Webify\Base\Infrastructure\home_url;
use function Webify\Base\Infrastructure\view;

ThemeAssets::register(view());
?>

<?php view()->beginPage(); ?>
<!doctype html>
<html lang="<?php echo app()->language; ?>">

<head>
    <meta charset="<?php echo app()->charset; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo app()->name; ?></title>

    <?php view()->registerCsrfMetaTags(); ?>
    <?php view()->head(); ?>
</head>

<body>
    <?php view()->beginBody(); ?>

    <header class="main-header" id="main-header">
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo home_url(); ?>">
                    <i class="bi bi-x-diamond"></i>
                    <span><?php echo app()->name; ?></span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php echo view()->render('_headerNavigation'); ?>
                </div>
            </div>
        </nav>
    </header>

    <?php echo $content; ?>

    <?php view()->endBody(); ?>
</body>

</html>
<?php view()->endPage(); ?>