<?php

namespace Reglendo\MergadoApiModels\Models;
use MergadoClient\ApiClient;


/**
 * Class MLog
 * @package Reglendo\MergadoApiModels\Models
 */
class MLog extends MergadoApiModel
{

    /**
     * MLog constructor.
     * @param array $attributes
     * @param ApiClient $api
     */
    public function __construct($attributes = [], ApiClient $api)
    {
        parent::__construct($attributes, $api);
    }

}