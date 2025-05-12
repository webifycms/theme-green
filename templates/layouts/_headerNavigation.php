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
use function Webify\Base\Infrastructure\home_url;

?>

<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link justify-content-center" href="<?= home_url(); ?>">
            <i class="bi bi-house-fill"></i>
            <span>Home</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= administration_url(); ?>">
            <i class="bi bi-sliders"></i>
            <span>Administration</span>
        </a>
    </li>
</ul>