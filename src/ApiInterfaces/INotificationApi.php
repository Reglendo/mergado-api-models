<?php
namespace Reglendo\MergadoApiModels\ApiInterfaces;

/**
 * Interface INotificationApi
 * @package Reglendo\MergadoApiModels\ApiInterfaces
 */
interface INotificationApi extends HasApiClient
{

    /**
     * Gets notification from APi and populates $this
     *
     * @method GET
     * @endpoint /api/notifications/$id/
     * @scope shop.notify.read
     *
     * @param $id
     * @return $this
     */
    public static function get($id);

}