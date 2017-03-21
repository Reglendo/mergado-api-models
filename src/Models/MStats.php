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
     * @param ApiClient $apiClient
     */
    public function __construct($attributes = [], ApiClient $apiClient)
    {
        parent::__construct($attributes, $apiClient);
    }

}