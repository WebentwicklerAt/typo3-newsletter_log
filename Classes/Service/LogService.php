<?php

declare(strict_types=1);

/*
 * This file is part of the newsletter_log extension for TYPO3 CMS.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace WebentwicklerAt\NewsletterLog\Service;

use TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface;
use WebentwicklerAt\NewsletterLog\Domain\Model\Log;
use WebentwicklerAt\NewsletterLog\Domain\Repository\FrontendUserRepository;
use WebentwicklerAt\NewsletterLog\Domain\Repository\LogRepository;

class LogService
{
    public function __construct(
        private readonly FrontendUserRepository $frontendUserRepository,
        private readonly LogRepository $logRepository,
        private readonly PersistenceManagerInterface $persistenceManager,
    )
    {
    }

    public function logForEmail(int $storagePid, string $email, string $subject, string $body): bool
    {
        $frontendUser = $this->frontendUserRepository->findOneByEmail($email);
        if (!$frontendUser) {
            return false;
        }

        $log = new Log();
        $log->setPid($storagePid);
        $log->setSubject($subject);
        $log->setBody($body);
        $log->setFrontendUser($frontendUser);

        $this->logRepository->add($log);
        $this->persistenceManager->persistAll();

        return true;
    }
}