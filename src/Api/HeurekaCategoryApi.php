<?php

namespace Reglendo\MergadoApiModels\Api;


use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\IHeurekaCategoryApi;

class HeurekaCategoryApi implements IHeurekaCategoryApi
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
    public static function get(ApiClient $apiClient, $id)
    {
        // TODO: Implement get() method.
    }

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
    public static function getList(ApiClient $apiClient, $id, $limit = 10, $offset = 0, array $fields = [])
    {
        // TODO: Implement getList() method.
    }
}