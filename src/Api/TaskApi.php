<?php
namespace Reglendo\MergadoApiModels\Api;


use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\ITaskApi;
use Reglendo\MergadoApiModels\Models\MTask;
use Reglendo\MergadoApiModels\Traits\ApiAccess;

/**
 * Class TaskApi
 * @package Reglendo\MergadoApiModels\Api
 */
class TaskApi implements ITaskApi
{
    use ApiAccess;

    /**
     * TaskApi constructor.
     */
    public function __construct()
    {
        $this->apiClient = new ApiClient();
    }

    /**
     * Gets single task based on $this->id
     *
     * @method GET
     * @endpoint /api/notifications/$id/
     * @scope shop.notify.read
     *
     * @return MTask
     */
    public function get()
    {
        // TODO: Implement get() method.
    }
}