<?php

namespace Reglendo\MergadoApiModels\ApiInterfaces;

use MergadoClient\ApiClient;

/**
 * Interface HasApiClient
 * @package Reglendo\MergadoApiModels\ApiInterfaces
 */
interface HasApiClient
{

    /**
     * @param ApiClient $apiClient
     * @return mixed
     */
    public function setClient(ApiClient $apiClient);

    /**
     * @param $token
     * @return mixed
     */
    public function setToken($token);

    /**
     * @return ApiClient
     */
    public function getClient();

}