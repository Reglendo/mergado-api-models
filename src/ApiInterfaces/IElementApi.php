<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 3.3.17
 * Time: 18:56
 */

namespace Reglendo\MergadoApiModels\ApiInterfaces;


use MergadoClient\ApiClient;

interface IElementApi
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
    public static function get(ApiClient $apiClient, $id, array $fields = []);

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
    public static function delete(ApiClient $apiClient, $id);


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
    public static function update(ApiClient $apiClient, $id, $update = []);

}