<?php

namespace Reglendo\MergadoApiModels\Api;


use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\INotificationApi;

class NotificationApi implements INotificationApi
{

    /**
     * Gets notification from APi and populates $this
     *
     * @method GET
     * @endpoint /api/notifications/$id/
     * @scope shop.notify.read
     *
     * @param ApiClient $apiClient
     * @param $id
     * @return $this
     */
    public static function get(ApiClient $apiClient, $id)
    {
        // TODO: Implement get() method.
    }
}