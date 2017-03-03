<?php

namespace Reglendo\MergadoApiModels\ApiInterfaces;


use MergadoClient\ApiClient;

interface IHeurekaCategoryApi
{


    /**
     * Gets single category based on $this->id
     *
     * @method GET
     * @endpoint /api/heureka/categories/$id/
     * @scope null
     *
     * @param ApiClient $apiClient
     * @param $id
     * @return $this
     */
    public static function get(ApiClient $apiClient, $id);

    /**
     * Gets list of all categories (with offset and limit to paginate)
     *
     * @method GET
     * @endpoint /api/heureka/categories/$id/
     * @scope null
     *
     * @param ApiClient $apiClient
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public static function getList(ApiClient $apiClient, $id, $limit = 10, $offset = 0, array $fields = []);

}