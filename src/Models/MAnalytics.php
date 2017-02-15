<?php
namespace Reglendo\MergadoApiModels\Models;

use MergadoClient\ApiClient;

/**
 * Class MAnalytics
 * @package Reglendo\MergadoApiModels\Models
 */
class MAnalytics extends MergadoApiModel
{

    /**
     * MAnalytics constructor.
     * @param array $attributes
     * @param ApiClient $api
     */
    public function __construct($attributes = [], ApiClient $api)
    {
        parent::__construct($attributes, $api);
    }

}