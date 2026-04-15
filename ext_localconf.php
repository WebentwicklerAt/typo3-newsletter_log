<?php

declare(strict_types=1);

defined('TYPO3') or die();

(static function (): void {
    $_EXTKEY = 'newsletter_log';
    $extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        $extensionName,
        'LogIndex',
        [
            \WebentwicklerAt\NewsletterLog\Controller\LogController::class => 'index',
        ],
        [
            \WebentwicklerAt\NewsletterLog\Controller\LogController::class => 'index',
        ],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        $extensionName,
        'LogShow',
        [
            \WebentwicklerAt\NewsletterLog\Controller\LogController::class => 'show',
        ],
        [
            \WebentwicklerAt\NewsletterLog\Controller\LogController::class => 'show',
        ],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
    );
})();