<?php

namespace Reglendo\MergadoApiModels\Models;


/**
 * Class MHeurekaCategory
 * @package Reglendo\MergadoApiModels\Models
 */
class MHeurekaCategory extends MergadoApiModel
{

    /**
     * Gets single category based on $this->id
     *
     * @method GET
     * @endpoint /api/heureka/categories/$id/
     * @scope null
     *
     * @return $this
     */
    public function get()
    {
        $fromApi = $this->api->heureka->categories($this->id)->get();

        $this->populate($fromApi);
        return $this;
    }

    /**
     * Gets list of all categories (with offset and limit to paginate)
     *
     * @method GET
     * @endpoint /api/heureka/categories/$id/
     * @scope null
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getList($limit = 10, $offset = 0, array $fields = [])
    {
        $prepared = $this->api->heureka->categories->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get()->data;

        $stats = MHeurekaCategory::hydrate($this->api, $fromApi);
        return $stats;
    }
}