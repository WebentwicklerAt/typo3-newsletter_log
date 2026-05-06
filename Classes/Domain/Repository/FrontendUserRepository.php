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

namespace WebentwicklerAt\NewsletterLog\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;
use WebentwicklerAt\NewsletterLog\Domain\Model\FrontendUser;

class FrontendUserRepository extends Repository
{
    public function findOneByEmailInStoragePageIds(string $email, ?array $storagePageIds = null): ?FrontendUser
    {
        $query = $this->createQuery();

        $querySettings = $query->getQuerySettings();
        if ($storagePageIds === null) {
            $querySettings->setRespectStoragePage(false);
        } else {
            $querySettings->setStoragePageIds($storagePageIds);
        }

        $constraint = $query->equals('email', $email);

        /** @var FrontendUser|null $result */
        $result = $query->matching($constraint)->setLimit(1)->execute()->getFirst();

        return $result;
    }
}