<?php
namespace Reglendo\MergadoApiModels\Models;
use MergadoClient\ApiClient;

/**
 * Class MElement
 * @package Reglendo\MergadoApiModels\Models
 */
class MElement extends MergadoApiModel
{

    /**
     * MElement constructor.
     * @param array $attributes
     * @param ApiClient $api
     */
    public function __construct($attributes = [], ApiClient $api)
    {
        parent::__construct($attributes, $api);
    }

    /**
     * Gets element based on $this->id
     *
     * @method GET
     * @endpoint /api/elements/$id/
     * @scope project.elements.read
     *
     * @param array $fields
     * @return mixed
     */
    public function get(array $fields = [])
    {
        $prepared = $this->api->elements($this->id);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get();

        $this->populate($fromApi);

        return $this;
    }

    /**
     * Deletes element based on $this->id
     *
     * @method DELETE
     * @endpoint /api/elements/$id/
     * @scope project.elements.write
     *
     * @return $this
     */
    public function delete()
    {
        $this->api->elements($this->id)->delete();

        $this->exists = false;

        return $this;
    }


    /**
     * Updates this element
     *
     * @method PATCH
     * @endpoint /api/elements/$id/
     * @scope project.elements.write
     *
     * @param $update
     * @return $this
     */
    public function update($update = [])
    {
        // pupulates with the update
        $this->populate($update);

        $fromApi = $this->api->elements($this->id)->patch($this->stripNullProperties());
        // populates with the response from API
        $this->populate($fromApi);

        return $this;
    }

    
}