<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/Classes/', __DIR__.'/tests/')
    ->exclude(__DIR__.'/.Build/');

$header = <<<EOF
This file is part of the "rico_templates" Extension for TYPO3 CMS.

For the full copyright and license information, please read the
LICENSE.txt file that was distributed with this source code.

(c) 2020 PSVneo
EOF;

return PhpCsFixer\Config::create()
    ->setUsingCache(false)
    ->setRules([
        '@PSR1' => true,
        '@PSR2' => true,
        '@Symfony' => true,
        'header_comment' => [
            'header' => $header,
            'location' => 'after_open',
            'separate' => 'both',
            'commentType' => 'PHPDoc',
        ],
        'no_useless_else' => true,
        'no_useless_return' => true,
        'ordered_class_elements' => true,
        'ordered_imports' => true,
        'phpdoc_order' => true,
        'phpdoc_summary' => false,
        'blank_line_after_opening_tag' => false,
        'concat_space' => ['spacing' => 'one'],
        'array_syntax' => ['syntax' => 'short'],
        'yoda_style' => ['equal' => false, 'identical' => false, 'less_and_greater' => false],
    ])
    ->setFinder($finder);
