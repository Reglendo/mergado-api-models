<?php
namespace Reglendo\MergadoApiModels\Models;
use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\Api\ElementApi;
use Reglendo\MergadoApiModels\ApiInterfaces\IElementApi;
use Reglendo\MergadoApiModels\Traits\SetApiToken;

/**
 * Class MElement
 * @package Reglendo\MergadoApiModels\Models
 */
class MElement extends MergadoApiModel
{
    use SetApiToken;

    /**
     * @var IElementApi
     */
    private $api;

    /**
     * MElement constructor.
     * @param array $attributes
     * @param ApiClient $apiClient
     */
    public function __construct($attributes = [], ApiClient $apiClient)
    {
        parent::__construct($attributes, $apiClient);

        $this->api = new ElementApi();
        $this->api->setClient($apiClient);
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
        $fromApi = $this->api->get($this->id, $fields);

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
        $this->api->delete($this->id);

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

        $fromApi = $this->api->update($this->id, $this->stripNullProperties());
        // populates with the response from API
        $this->populate($fromApi);

        return $this;
    }

    
}