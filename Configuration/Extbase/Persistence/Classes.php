<?php

declare(strict_types=1);

return [
    \WebentwicklerAt\NewsletterLog\Domain\Model\FrontendUser::class => [
        'tableName' => 'fe_users',
    ],
    \WebentwicklerAt\NewsletterLog\Domain\Model\Log::class => [
        'properties' => [
            'tstamp' => [
                'fieldName' => 'tstamp',
            ],
            'crdate' => [
                'fieldName' => 'crdate',
            ],
        ],
    ],
];