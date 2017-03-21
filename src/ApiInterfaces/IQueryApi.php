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
     * @param $id
     * @param array $fields
     * @return MQuery
     */
    public function get($id, array $fields = []);


    /**
     * Updated a query
     *
     * @method PATCH
     * @endpoint /api/queries/$id/
     * @scope projects.queries.write
     *
     * @param $id
     * @param array $query
     * @return MQuery
     */
    public function update($id, $query = []);

    /**
     * Deletes a query
     *
     * @method DELETE
     * @endpoint /api/queries/$id/
     * @scope projects.queries.write
     *
     * @param $id
     * @return MQuery
     */
    public function delete($id);

    /**
     * Getproducts from query
     *
     * @method GET
     * @endpoint /api/queries/$id/products/
     * @scope projects.products.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return MQuery
     */
    public function getProducts($id, $limit = 10, $offset = 0, array $fields = []);

}