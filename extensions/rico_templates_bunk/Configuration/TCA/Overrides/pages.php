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
        $files = \TYPO3\CMS\Core\Utility\GeneralUtility::getFilesInDir(
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($extensionKey).'Configuration/PageTSconfig/',
            'ts,typoscript'
        );
        foreach ($files as $key => $value) {
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
                $extensionKey,
                'Configuration/PageTSconfig/'.$value,
                $value
            );
        }
    },
    'rico_templates_bunk'
);
