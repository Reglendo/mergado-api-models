<?php
namespace Reglendo\MergadoApiModels\Traits;


trait SetApiToken
{
    /**
     * @param $token
     * @return mixed
     */
    public function setToken($token)
    {
        if($this->api && method_exists($this->api, "setToken")) {
            $this->api->setToken($token);
        }
    }
}