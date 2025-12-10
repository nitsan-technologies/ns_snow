<?php

use Nitsan\NsSnow\Controller\NSnowsController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die('Access denied.');

ExtensionUtility::configurePlugin(
    'NsSnow',
    'Nssnows',
    [
        NSnowsController::class => 'list'
    ],
    [
        NSnowsController::class => 'list'
    ],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
);
