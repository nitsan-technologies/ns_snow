<?php
defined('TYPO3_MODE') || die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Nitsan.NsSnow',
    'Nssnows',
    [
        'NSnows' => 'list'
    ],
    // non-cacheable actions
    [
        'NSnows' => ''
    ]
);
