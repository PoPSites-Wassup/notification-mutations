<?php

declare(strict_types=1);

namespace PoPSitesWassup\NotificationMutations\MutationResolverBridges;

use Symfony\Contracts\Service\Attribute\Required;
use PoP\ComponentModel\MutationResolvers\MutationResolverInterface;
use PoPSitesWassup\NotificationMutations\MutationResolvers\MarkAsUnreadNotificationMutationResolver;

class MarkAsUnreadNotificationMutationResolverBridge extends AbstractMarkAsReadOrUnreadNotificationMutationResolverBridge
{
    protected MarkAsUnreadNotificationMutationResolver $markAsUnreadNotificationMutationResolver;

    #[Required]
    public function autowireMarkAsUnreadNotificationMutationResolverBridge(
        MarkAsUnreadNotificationMutationResolver $markAsUnreadNotificationMutationResolver,
    ): void {
        $this->markAsUnreadNotificationMutationResolver = $markAsUnreadNotificationMutationResolver;
    }

    public function getMutationResolver(): MutationResolverInterface
    {
        return $this->markAsUnreadNotificationMutationResolver;
    }

    protected function onlyExecuteWhenDoingPost(): bool
    {
        return false;
    }
}
