<?php
namespace Reglendo\MergadoApiModels\Api;

use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\INotificationApi;
use Reglendo\MergadoApiModels\Traits\ApiAccess;

/**
 * Class NotificationApi
 * @package Reglendo\MergadoApiModels\Api
 */
class NotificationApi implements INotificationApi
{
    use ApiAccess;

    /**
     * NotificationApi constructor.
     */
    public function __construct()
    {
        $this->apiClient = new ApiClient();
    }

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
    public function get($id)
    {
        return $this->apiClient->notifications($id)->get();
    }
}