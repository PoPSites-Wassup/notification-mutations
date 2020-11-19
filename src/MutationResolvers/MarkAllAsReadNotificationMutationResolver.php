<?php

declare(strict_types=1);

namespace PoPSitesWassup\NotificationMutations\MutationResolvers;

use PoP\Hooks\Facades\HooksAPIFacade;
use PoP\ComponentModel\MutationResolvers\AbstractMutationResolver;

class MarkAllAsReadNotificationMutationResolver extends AbstractMutationResolver
{
    protected function additionals($form_data)
    {
        HooksAPIFacade::getInstance()->doAction('GD_NotificationMarkAllAsRead:additionals', $form_data);
    }

    protected function markAllAsRead($form_data)
    {
        // return AAL_Main::instance()->api->setStatusMultipleNotifications($form_data['user_id'], AAL_POP_STATUS_READ);
        return \PoP_Notifications_API::setStatusMultipleNotifications($form_data['user_id'], \AAL_POP_STATUS_READ);
    }

    /**
     * @return mixed
     */
    public function execute(array $form_data)
    {
        $hist_ids = $this->markAllAsRead($form_data);
        $this->additionals($form_data);

        return $hist_ids;
    }
}
