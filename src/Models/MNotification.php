<?php

namespace Reglendo\MergadoApiModels\Models;


/**
 * Class MNotification
 * @package Reglendo\MergadoApiModels\Models
 */
class MNotification extends MergadoApiModel
{

    /**
     * Gets notification from APi and populates $this
     *
     * @method GET
     * @endpoint /api/notifications/$id/
     * @scope shop.notify.read
     *
     * @return $this
     */
    public function get()
    {
        $fromApi = $this->api->notifications($this->id)->get();

        $this->populate($fromApi);

        return $this;
    }
}