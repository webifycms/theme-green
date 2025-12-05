<?php

/**
 * The file is part of the "webifycms/theme-green", WebifyCMS theme package.
 *
 * @see https://webifycms.com/theme/green
 *
 * @license Copyright (c) 2023 WebifyCMS
 * @license https://webifycms.com/theme/green/license
 * @author Mohammed Shifreen <mshifreen@gmail.com>
 */
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use PhpCsFixer\Finder;
use Webify\Tools\Fixer\Fixer;

$finder = Finder::create()
	->in(__DIR__)
	->exclude([
		'vendor',
		'node_modules',
		'dist',
		'assets',
	])
	->ignoreDotFiles(false)
	->name('*.php')
;
$rules = [
	'echo_tag_syntax' => [
		'format'                         => 'short',
		'shorten_simple_statements_only' => false,
	],
	'phpdoc_to_comment'                 => false,
	'single_import_per_statement'       => false,
	'global_namespace_import'           => [
		'import_classes'   => true,
		'import_constants' => true,
		'import_functions' => true,
	],
	'group_import' => [
		'group_types' => ['classy', 'functions', 'constants'],
	],
	'no_superfluous_phpdoc_tags' => true,
];

return (new Fixer($finder, $rules))->getConfig()->setUsingCache(false);
