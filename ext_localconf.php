<?php
defined('TYPO3_MODE') || die('Access denied.');

if (version_compare(TYPO3_branch, '11.0', '>=')) {
    $moduleClass = \Nitsan\NsSnow\Controller\NSnowsController::class;
} else {
    $moduleClass = 'NSnows';
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Nitsan.NsSnow',
    'Nssnows',
    [
        $moduleClass => 'list'
    ],
    [
        $moduleClass => 'list'
    ]
);
