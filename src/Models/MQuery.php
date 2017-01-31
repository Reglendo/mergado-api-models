<?php
namespace Reglendo\MergadoApiModels\Models;


/**
 * Class MQuery
 * @package Reglendo\MergadoApiModels\Models
 */
class MQuery extends MergadoApiModel
{

    /**
     *
     * @method GET
     * @endpoint /api/queries/$id/
     * @scope projects.queries.read
     *
     * @param array $fields
     * @return $this
     */
    public function get(array $fields =[]) {
        $prepared = $this->api->queries($this->id);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get();

        $this->populate($fromApi);

        return $this;
    }

    /**
     * Updated a query
     *
     * @method PATCH
     * @endpoint /api/queries/$id/
     * @scope projects.queries.write
     *
     * @param array $query
     * @return $this
     */
    public function update($query = []) {
        $this->populate($query);

        $fromApi = $this->api->queries($this->id)->patch($this->stripNullProperties());
        $this->populate($fromApi);

        return $this;
    }

    /**
     * Deletes a query
     *
     * @method DELETE
     * @endpoint /api/queries/$id/
     * @scope projects.queries.write
     *
     * @return $this
     */
    public function delete() {
        $this->api->queries($this->id)->delete();

        $this->exists = false;

        return $this;
    }

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
     * @return $this
     */
    public function getProducts($limit = 10, $offset = 0, array $fields = [])
    {
        $prepared = $this->api->queries($this->id)->products->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get();

        $products = MProduct::hydrate($this->api, $fromApi);

        return $products;
    }

}