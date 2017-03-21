<?php
namespace Reglendo\MergadoApiModels\Api;


use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\ITaskApi;
use Reglendo\MergadoApiModels\Models\MTask;
use Reglendo\MergadoApiModels\Traits\ApiAccess;

class TaskApi implements ITaskApi
{
    use ApiAccess;

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