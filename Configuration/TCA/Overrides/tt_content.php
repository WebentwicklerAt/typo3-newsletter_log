<?php

declare(strict_types=1);

defined('TYPO3') or die();

(static function (): void {
    $_EXTKEY = 'newsletter_log';
    $extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);
    $llBackend = 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/Backend.xlf:';

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        $extensionName,
        'LogIndex',
        $llBackend . 'plugin.LogIndex'
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        $extensionName,
        'LogShow',
        $llBackend . 'plugin.LogShow'
    );
})();