<?php

namespace Reglendo\MergadoApiModels\Models;
use MergadoClient\ApiClient;


/**
 * Class MNotification
 * @package Reglendo\MergadoApiModels\Models
 */
class MNotification extends MergadoApiModel
{

    /**
     * MNotification constructor.
     * @param array $attributes
     * @param ApiClient $apiClient
     */
    public function __construct($attributes = [], ApiClient $apiClient)
    {
        parent::__construct($attributes, $apiClient);
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
        $fromApi = $this->api->notifications($this->id)->get();

        $this->populate($fromApi);

        return $this;
    }
}