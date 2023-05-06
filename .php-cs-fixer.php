<?php
/**
 * The file is part of the "webifycms/ext-base", WebifyCMS theme package.
 *
 * @see https://webifycms.com/theme/green
 *
 * @license Copyright (c) 2022 WebifyCMS
 * @license https://webifycms.com/theme/green/license
 * @author Mohammed Shifreen <mshifreen@gmail.com>
 */
declare(strict_types=1);

// should require the composer autoloader on first
require __DIR__ . '/vendor/autoload.php';

use PhpCsFixer\Finder;
use Webify\Tools\Fixer;

$finder = Finder::create()
	->in([
		__DIR__ . '/src',
		__DIR__ . '/test',
	])
	->name('*.php')
;

return (new Fixer($finder))
	->getConfig()
	->setUsingCache(false)
;
