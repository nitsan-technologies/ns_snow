<?php

defined('TYPO3') || die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'NsSnow',
    'Nssnows',
    [
        \Nitsan\NsSnow\Controller\NSnowsController::class => 'list'
    ],
);
