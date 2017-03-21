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
     * @param ApiClient $apiClient
     */
    public function __construct($attributes = [], ApiClient $apiClient)
    {
        parent::__construct($attributes, $apiClient);
    }

}