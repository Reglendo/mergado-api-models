<?php

namespace Reglendo\MergadoApiModels\Api;


use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\IProductApi;

class ProductApi  implements IProductApi
{

    /**
     * Get data for this product
     * Elements are in the "data" and "input_data" attributes
     *
     * @method GET
     * @endpoint /api/products/$id/
     * @scope project.products.read
     *
     * @param ApiClient $apiClient
     * @param $id
     * @param array $fields
     * @return $this
     */
    public static function get(ApiClient $apiClient, $id, array $fields = [])
    {
        // TODO: Implement get() method.
    }

    /**
     * Get stats for this product
     *
     * @method GET
     * @endpoint /api/products/$id/stats/
     * @scope project.stats.read
     *
     * @param ApiClient $apiClient
     * @param $id
     * @param null $date
     * @return array
     */
    public static function getStatistics(ApiClient $apiClient, $id, $date = null)
    {
        // TODO: Implement getStatistics() method.
    }
}