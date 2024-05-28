<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();
$extKey = 'ns_snow';
ExtensionManagementUtility::addStaticFile(
    $extKey,
    'Configuration/TypoScript',
    'Snow'
);
