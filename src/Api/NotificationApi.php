<?php
namespace Reglendo\MergadoApiModels\Api;

use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\INotificationApi;
use Reglendo\MergadoApiModels\Traits\ApiAccess;

class NotificationApi implements INotificationApi
{
    use ApiAccess;

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
        // TODO: Implement get() method.
    }
}