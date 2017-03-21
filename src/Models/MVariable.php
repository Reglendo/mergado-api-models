<?php
namespace Reglendo\MergadoApiModels\Models;

use MergadoClient\ApiClient;

/**
 * Class MVariable
 * @package Reglendo\MergadoApiModels\Models
 */
class MVariable extends MergadoApiModel
{

    /**
     * MVariable constructor.
     * @param array $attributes
     * @param ApiClient $apiClient
     */
    public function __construct($attributes = [], ApiClient $apiClient)
    {
        parent::__construct($attributes, $apiClient);
    }

    /**
     * Gets variable based on $this->id
     *
     * @method GET
     * @endpoint /api/variables/$id/
     * @scope project.variables.read
     *
     * @param array $fields
     * @return $this
     */
    public function get(array $fields = [])
    {
        $prepared = $this->api->variables($this->id);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get();

        $this->populate($fromApi);

        return $this;
    }

    /**
     * Deletes variable based on $this->id
     *
     * @method DELETE
     * @endpoint /api/variables/$id/
     * @scope project.variables.write
     *
     * @return $this
     */
    public function delete()
    {
        $prepared = $this->api->variables($this->id);

        $prepared->delete();

        $this->exists = false;

        return $this;
    }


    /**
     * Updates this variables
     *
     * @method PATCH
     * @endpoint /api/variables/$id/
     * @scope project.variables.write
     *
     * @param $update
     * @return $this
     */
    public function update($update = [])
    {
        // pupulates with the update
        $this->populate($update);

        $fromApi = $this->api->variables($this->id)->patch($this->stripNullProperties());
        // populates with the response from API
        $this->populate($fromApi);

        return $this;
    }


}