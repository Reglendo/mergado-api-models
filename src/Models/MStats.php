<?php
namespace Reglendo\MergadoApiModels\Models;


use MergadoClient\ApiClient;

/**
 * Class MStats
 * @package Reglendo\MergadoApiModels\Models
 */
class MStats extends MergadoApiModel
{
    /**
     * MStats constructor.
     * @param array $attributes
     * @param ApiClient $api
     */
    public function __construct($attributes = [], ApiClient $api)
    {
        parent::__construct($attributes, $api);
    }

}