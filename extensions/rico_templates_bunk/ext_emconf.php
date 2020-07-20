<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2018 Felix Herrmann <felix.herrmann@riconet.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'Riconet Basis extension',
    'description' => 'Provider extension for pages content and more.',
    'category' => 'misc',
    'version' => '4.0.0',
    'state' => 'stable',
    'uploadfolder' => false,
    'createDirs' => '',
    'clearCacheOnLoad' => true,
    'author' => 'Felix Herrmann',
    'author_email' => 'felix.herrmann@riconet.de',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-10.4.99',
            'gridelements' => '8.4.1-10.0.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'Riconet\\RicoTemplatesBunk\\' => 'Classes',
        ],
    ],
    'autoload-dev' => [
        'psr-4' => [
            'Riconet\\RicoTemplatesBunk\\Tests\\' => 'Tests',
        ],
    ],
];
