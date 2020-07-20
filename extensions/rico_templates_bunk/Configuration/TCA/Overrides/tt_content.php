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
 *
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

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(
    function ($_EXTKEY) {

        // Create TCA columns.
        $columns = [
            'header' => [
                'config' => [
                    'type' => 'text',
                    'cols' => 40,
                    'rows' => 3,
                    'default' => 'Ändere mich',
                    'eval' => 'required',
                ],
            ],
            'media' => [
                'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media',
                'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('media', [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            '0' => [
                                'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                                'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                                'showitem' => '
                                --palette--;;audioOverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                                'showitem' => '
                                --palette--;;videoOverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                                'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette'
                            ]
                        ],
                    ],

                ], $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'])
            ],
            'header_font_color' => [
                'label' => 'Farbe der Überschrift',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        ['CSS Vorgabe', ''],
                        ['Schwarz', 'clfo-black'],
                        ['Weiß', 'clfo-white'],
                        ['Pink', 'clfo-pink'],
                        ['Lila', 'clfo-purple'],
                        ['Blau', 'clfo-blue']
                    ],
                ],
            ],
            'speaking_anchor' => [
                'label' => 'Sprechender Anker (a-z,-,_)',
                'exclude' => 0,
                'config' => [
                    'type' => 'input',
                    'eval' => 'trim,nospace,alphanum_x,lower',
                ],
            ],
            'imageroundcorners' => [
                'label' => 'Bild mit Rundung',
                'exclude' => 0,
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'items' => [
                        [
                            0 => '',
                            1 => '',
                        ]
                    ],
                ],
            ],
            'parallax' => [
                'label' => 'Bild mit Parallax',
                'exclude' => 0,
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'items' => [
                        [
                            0 => '',
                            1 => '',
                        ]
                    ],
                ],
            ],
            'parallaxoption' => [
                'label' => 'Parallax-Optionen',
                'description' => 'Positive Zahl für Bewegung von unten nach oben; Negative Zahl für Bewegung von oben nach unten; Default: -0.15',
                'exclude' => 0,
                'config' => [
                    'type' => 'input',
                    'eval' => 'trim',
                    'default' => '-0.15',
                ],
            ],
            'animatecss' => [
                'label' => 'Zusätzliche Animationsklassen',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        ['Keine', ''],
                        ['FadeIn', 'fadeIn'],
                        ['FadeInDown', 'fadeInDown'],
                        ['FadeInLeft', 'fadeInLeft'],
                        ['FadeInRight', 'fadeInRight'],
                        ['FadeInUp', 'fadeInUp'],
                        ['SlideIn', 'slideIn'],
                        ['SlideInDown', 'slideInDown'],
                        ['SlideInLeft', 'slideInLeft'],
                        ['SlideInRight', 'slideInRight'],
                        ['SlideInUp', 'slideInUp'],
                    ],
                ],
            ],
        ];

        // Add TCA columns.
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
            'tt_content',
            $columns
        );
        // Add TCA columns.
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
            'tt_content',
            'speaking_anchor,header_font_color',
            '',
            'after:subheader'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
            'tt_content',
            'mediaAdjustments',
            'imageroundcorners,parallax,parallaxoption',
            'after:imageborder'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
            'tt_content',
            'frames',
            '--linebreak--',
            'after:layout'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
            'tt_content',
            'frames',
            '--linebreak--, animatecss,--linebreak--',
            'after:frame_class'
        );

        $GLOBALS['TCA']['tt_content']['types']['gridelements_pi1']['showitem'] = '
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
            --palette--;;headers,
            tx_gridelements_backend_layout,
            pi_flexform,
            tx_gridelements_children,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
            media,imageborder,imageroundcorners,parallax,parallaxoption,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,--palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
            --div--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_category.tabs.category,
            categories,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,rowDescription
        ';

    }, 'rico_templates_bunk'
);
