<?php
/**
 * This file is part of the "rico_templates_bunk" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2020 PSVneo
 */
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(
    function ($extensionKey) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
            $extensionKey,
            'Configuration/TypoScript',
            'Base Provider Extension'
        );
    },
    'rico_templates_bunk'
);
