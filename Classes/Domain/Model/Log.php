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

namespace WebentwicklerAt\NewsletterLog\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Log extends AbstractEntity
{
    protected ?\DateTime $crdate = null;

    public function setCrdate(?\DateTime $crdate): void
    {
        $this->crdate = $crdate;
    }

    public function getCrdate(): ?\DateTime
    {
        return $this->crdate;
    }

    protected ?\DateTime $tstamp = null;

    public function setTstamp(?\DateTime $tstamp): void
    {
        $this->tstamp = $tstamp;
    }

    public function getTstamp(): ?\DateTime
    {
        return $this->tstamp;
    }

    protected ?string $subject = null;

    public function setSubject(?string $subject): void
    {
        $this->subject = $subject;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    protected ?string $body = null;

    public function setBody(?string $body): void
    {
        $this->body = $body;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    protected ?FrontendUser $frontendUser = null;

    public function setFrontendUser(?FrontendUser $frontendUser): void
    {
        $this->frontendUser = $frontendUser;
    }

    public function getFrontendUser(): ?FrontendUser
    {
        return $this->frontendUser;
    }
}