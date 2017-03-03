<?php

namespace Reglendo\MergadoApiModels\Api;


use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\IElementApi;

class ElementApi implements IElementApi
{

    /**
     * Gets element based on $this->id
     *
     * @method GET
     * @endpoint /api/elements/$id/
     * @scope project.elements.read
     *
     * @param ApiClient $apiClient
     * @param $id
     * @param array $fields
     * @return mixed
     */
    public static function get(ApiClient $apiClient, $id, array $fields = [])
    {
        // TODO: Implement get() method.
    }

    /**
     * Deletes element based on $this->id
     *
     * @method DELETE
     * @endpoint /api/elements/$id/
     * @scope project.elements.write
     *
     * @param ApiClient $apiClient
     * @param $id
     * @return $this
     */
    public static function delete(ApiClient $apiClient, $id)
    {
        // TODO: Implement delete() method.
    }

    /**
     * Updates this element
     *
     * @method PATCH
     * @endpoint /api/elements/$id/
     * @scope project.elements.write
     *
     * @param ApiClient $apiClient
     * @param $id
     * @param array $update
     * @return $this
     */
    public static function update(ApiClient $apiClient, $id, $update = [])
    {
        // TODO: Implement update() method.
    }
}