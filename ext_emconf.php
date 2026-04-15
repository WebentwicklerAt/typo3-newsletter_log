<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Newsletter log',
    'description' => 'Displays newsletter log for frontend users.',
    'category' => 'misc',
    'clearCacheOnLoad' => true,
    'version' => '0.0.0',
    'state' => 'alpha',
    'author' => 'Gernot Leitgab',
    'author_company' => 'Webentwickler.at',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'WebentwicklerAt\\NewsletterLog\\' => 'Classes',
        ],
    ],
];