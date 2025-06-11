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

use function Webify\Base\Infrastructure\administration_url;
use function Webify\Base\Infrastructure\app;

?>

<div class="uk-navbar-left">
    <a href="<?= administration_url(); ?>" class="uk-navbar-item uk-logo">
        <i class="bi bi-x-diamond"></i>
        <span><?= app()->name; ?></span>
    </a>
</div>
