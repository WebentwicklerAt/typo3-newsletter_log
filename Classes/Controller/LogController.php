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

namespace WebentwicklerAt\NewsletterLog\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use WebentwicklerAt\NewsletterLog\Domain\Model\FrontendUser;
use WebentwicklerAt\NewsletterLog\Domain\Model\Log;
use WebentwicklerAt\NewsletterLog\Domain\Repository\FrontendUserRepository;
use WebentwicklerAt\NewsletterLog\Domain\Repository\LogRepository;

class LogController extends ActionController
{
    protected ?FrontendUser $frontendUser = null;

    public function __construct(
        private readonly Context                $context,
        private readonly FrontendUserRepository $frontendUserRepository,
        private readonly LogRepository          $logRepository,
    )
    {
        $frontendUserUid = $this->context->getPropertyFromAspect('frontend.user', 'id');
        if ($frontendUserUid) {
            $this->frontendUser = $this->frontendUserRepository->findByUid($frontendUserUid);
        }
    }

    public function indexAction(): ResponseInterface
    {
        if ($this->frontendUser) {
            $logs = $this->logRepository->findByFrontendUser($this->frontendUser);

            $this->view->assignMultiple([
                'frontendUser' => $this->frontendUser,
                'logs' => $logs,
            ]);

            return $this->htmlResponse();
        }

        return $this->htmlResponse('');
    }

    public function showAction(Log $log): ResponseInterface
    {
        if ($this->frontendUser && $this->frontendUser == $log->getFrontendUser()) {
            $html = $log->getBody();
            return $this->htmlResponse($html);
        }

        return $this->htmlResponse('');
    }
}