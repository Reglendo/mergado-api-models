<?php

namespace Reglendo\MergadoApiModels\ApiInterfaces;


use MergadoClient\ApiClient;

interface INotificationApi
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
    public static function get(ApiClient $apiClient, $id);

}