<?php declare(strict_types=1);

use function Webify\Admin\Infrastructure\administration_url;
use function Webify\Base\Infrastructure\home_url;
use function Webify\Base\Infrastructure\view;

/**
 * Partial layout for navigation
 */
?>

<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link justify-content-center" href="<?= home_url() ?>">
            <svg class="bi mr-2" width="16" height="16" fill="currentColor">
                <use xlink:href="<?= view()->theme->baseUrl . '/images/icons.svg#house-fill' ?>" />
            </svg>
            <span>Home</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= administration_url() ?>">
            <svg class="bi mr-2" width="16" height="16" fill="currentColor">
                <use xlink:href="<?= view()->theme->baseUrl . '/images/icons.svg#sliders' ?>" />
            </svg>
            <span>Administration</span>
        </a>
    </li>
</ul>