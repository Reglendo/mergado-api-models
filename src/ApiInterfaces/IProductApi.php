<?php
namespace Reglendo\MergadoApiModels\ApiInterfaces;

/**
 * Interface IProductApi
 * @package Reglendo\MergadoApiModels\ApiInterfaces
 */
interface IProductApi extends HasApiClient
{

    /**
     * Get data for this product
     * Elements are in the "data" and "input_data" attributes
     *
     * @method GET
     * @endpoint /api/products/$id/
     * @scope project.products.read
     *
     * @param $id
     * @param array $fields
     * @return $this
     */
    public static function get($id, array $fields = []);

    /**
     * Get stats for this product
     *
     * @method GET
     * @endpoint /api/products/$id/stats/
     * @scope project.stats.read
     *
     * @param $id
     * @param null $date
     * @return array
     */
    public static function getStatistics($id, $date = null);
}