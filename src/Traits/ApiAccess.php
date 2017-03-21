<?php
namespace Reglendo\MergadoApiModels\Traits;

use MergadoClient\ApiClient;

/**
 * Class ApiAccess
 * @package Reglendo\MergadoApiModels\Traits
 */
trait ApiAccess
{
    /**
     * @var ApiClient
     */
    protected $apiClient;

    /**
     * @param ApiClient $apiClient
     * @return mixed
     */
    public function setClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * @param $token
     * @return mixed
     */
    public function setToken($token)
    {
        $this->apiClient->setToken($token);
    }

    /**
     * @return ApiClient
     */
    public function getClient()
    {
        return $this->apiClient;
    }
}