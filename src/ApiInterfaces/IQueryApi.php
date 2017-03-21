<?php
namespace Reglendo\MergadoApiModels\ApiInterfaces;

use Reglendo\MergadoApiModels\Models\MQuery;

/**
 * Interface IQueryApi
 * @package Reglendo\MergadoApiModels\ApiInterfaces
 */
interface IQueryApi extends HasApiClient
{
    /**
     *
     * @method GET
     * @endpoint /api/queries/$id/
     * @scope projects.queries.read
     *
     * @param array $fields
     * @return MQuery
     */
    public function get(array $fields = []);


    /**
     * Updated a query
     *
     * @method PATCH
     * @endpoint /api/queries/$id/
     * @scope projects.queries.write
     *
     * @param array $query
     * @return MQuery
     */
    public function update($query = []);

    /**
     * Deletes a query
     *
     * @method DELETE
     * @endpoint /api/queries/$id/
     * @scope projects.queries.write
     *
     * @return MQuery
     */
    public function delete();

    /**
     * Getproducts from query
     *
     * @method GET
     * @endpoint /api/queries/$id/products/
     * @scope projects.products.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return MQuery
     */
    public function getProducts($limit = 10, $offset = 0, array $fields = []);

}