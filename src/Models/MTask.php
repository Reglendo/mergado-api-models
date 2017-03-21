<?php
namespace Reglendo\MergadoApiModels\Models;

use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\Api\TaskApi;
use Reglendo\MergadoApiModels\ApiInterfaces\ITaskApi;
use Reglendo\MergadoApiModels\Traits\SetApiToken;

/**
 * Class MTask
 * @package Reglendo\MergadoApiModels\Models
 */
class MTask extends MergadoApiModel
{
    use SetApiToken;

    /**
     * @var ITaskApi
     */
    private $api;

    /**
     * MTak constructor.
     * @param array $attributes
     * @param ApiClient $apiClient
     */
    public function __construct($attributes = [], ApiClient $apiClient)
    {
        parent::__construct($attributes, $apiClient);

        $this->api = new TaskApi();
        $this->api->setClient($apiClient);
    }

    /**
     * Gets single task based on $this->id
     *
     * @method GET
     * @endpoint /api/notifications/$id/
     * @scope shop.notify.read
     *
     * @return $this
     */
    public function get()
    {
        $fromApi = $this->api->get($this->id);
        $this->populate($fromApi);
        return $this;
    }
}