<?php
namespace Reglendo\MergadoApiModels\Models;

use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\Api\NotificationApi;
use Reglendo\MergadoApiModels\ApiInterfaces\INotificationApi;
use Reglendo\MergadoApiModels\Traits\SetApiToken;

/**
 * Class MNotification
 * @package Reglendo\MergadoApiModels\Models
 */
class MNotification extends MergadoApiModel
{
    use SetApiToken;
    /**
     * @var INotificationApi
     */
    private $api;

    /**
     * MNotification constructor.
     * @param array $attributes
     * @param ApiClient $apiClient
     */
    public function __construct($attributes = [], ApiClient $apiClient)
    {
        parent::__construct($attributes, $apiClient);

        $this->api = new NotificationApi();
        $this->api->setClient($apiClient);
    }

    /**
     * Gets notification from APi and populates $this
     *
     * @method GET
     * @endpoint /api/notifications/$id/
     * @scope shop.notify.read
     *
     * @return $this
     */
    public function get()
    {
        $fromApi = $this->api->get($this->id);

        $this->populate($fromApi);

        return $this;
    }
}