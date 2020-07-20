<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive(
    $GLOBALS['TYPO3_CONF_VARS'],
    [
        'BE' => [
            'debug' => $_ENV['BE_DEBUG'],
        ],
        'DB' => [
            'Connections' => [
                'Default' => [
                    'dbname' => $_ENV['TYPO3_DB_NAME'],
                    'host' => $_ENV['TYPO3_DB_HOST'],
                    'password' => $_ENV['TYPO3_DB_PASSWORD'],
                    'user' => $_ENV['TYPO3_DB_USER'],
                ],
            ],
        ],
        'EXTCONF' => [
            'lang' => [
                'availableLanguages' => [
                    'de',
                ],
            ],
        ],
        'FE' => [
            'debug' => $_ENV['FE_DEBUG']
        ],
        'GFX' => [
            'processor' => $_ENV['GFX'],
            'processor_colorspace' => $_ENV['GFX_COLORSPACE'],
        ],
        'MAIL' => [
            'transport' => $_ENV['MAIL_TRANSPORT'],
            'transport_sendmail_command' => $_ENV['MAIL_SENDMAIL'],
            'transport_smtp_encrypt' => $_ENV['MAIL_ENCRYPT'],
            'transport_smtp_password' => $_ENV['MAIL_PASSWORD'],
            'transport_smtp_server' => $_ENV['MAIL_SERVER'],
            'transport_smtp_username' => $_ENV['MAIL_USERNAME'],
            'defaultMailFromAddress' => $_ENV['MAIL_FROM'],
            'defaultMailFromName' => $_ENV['MAIL_FROMNAME'],
            'defaultMailReplyToAddress' => $_ENV['MAIL_REPLY'],
            'defaultMailReplyToName' => $_ENV['MAIL_REPLYNAME'],
        ],
        'SYS' => [
            'sitename' => $_ENV['SITENAME'],
            'displayErrors' =>  $_ENV['DISPLAY_ERRORS'],
            'enableDeprecationLog' => $_ENV['ENABLE_DEPRECATION_LOG'],
            'exceptionalErrors' => $_ENV['EXCEPTIONAL_ERRORS'],
            'sqlDebug' => $_ENV['SQL_DEBUG'],
            'systemLogLevel' =>  $_ENV['SYSTEM_LOG_LEVEL'],
        ],
        'EXTENSIONS' => [
            'backend' => [
                'backendFavicon' => '',
                'backendLogo' => '',
                //'loginBackgroundImage' => 'EXT:rico_templates/Resources/Public/Images/backend/image.png',
                'loginFootnote' => 'made with a 😃 and 💖 by FailX',
                'loginHighlightColor' => '#005ea8',
                'loginLogo' => 'EXT:rico_templates_bunk/Resources/Public/Images/backend/logo.png',
            ],
        ],
    ]
);
