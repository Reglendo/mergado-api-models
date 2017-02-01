<?php

namespace Reglendo\MergadoApiModels\Models;
use MergadoClient\ApiClient;


/**
 * Class MTask
 * @package Reglendo\MergadoApiModels\Models
 */
class MTask extends MergadoApiModel
{

    /**
     * MTak constructor.
     * @param array $attributes
     * @param ApiClient $api
     */
    public function __construct($attributes = [], ApiClient $api)
    {
        parent::__construct($attributes, $api);
    }

    /**
     * Gets single task based on $this->id
     *
     * @method GET
     * @endpoint /api/notifications/$id/
     * @scope shop.notify.read
     *
     * @return $this
     */
    public function get()
    {
        $fromApi = $this->api->tasks($this->id)->get();
        $this->populate($fromApi);
        return $this;
    }
}