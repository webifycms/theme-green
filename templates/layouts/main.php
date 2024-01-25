<?php declare(strict_types=1);

use function Webify\Base\Infrastructure\app;
use function Webify\Base\Infrastructure\home_url;
use function Webify\Base\Infrastructure\view;

?>

<?php view()->beginPage(); ?>
<!doctype html>
<html lang="<?php echo app()->language; ?>">

<head>
    <meta charset="<?php echo app()->charset; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo app()->name; ?></title>

    <link href="<?php echo view()->theme->baseUrl . '/css/site.css'; ?>" rel="stylesheet">

    <?php view()->registerCsrfMetaTags(); ?>
    <?php view()->head(); ?>
</head>

<body>
    <?php view()->beginBody(); ?>

    <header class="main-header" id="main-header">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo home_url(); ?>">
                    <svg class="bi mr-2" width="32" height="32" fill="currentColor">
                        <use xlink:href="<?php echo view()->theme->baseUrl . '/images/icons.svg#x-diamond'; ?>" />
                    </svg>
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

    <script type="module" defer src="<?php echo view()->theme->baseUrl . '/js/site.js'; ?>"></script>

    <?php view()->endBody(); ?>
</body>

</html>
<?php view()->endPage(); ?>