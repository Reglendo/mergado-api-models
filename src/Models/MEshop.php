<?php
namespace Reglendo\MergadoApiModels\Models;
use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\Api\EshopApi;
use Reglendo\MergadoApiModels\ApiInterfaces\IEshopApi;
use Reglendo\MergadoApiModels\ModelCollection;
use Reglendo\MergadoApiModels\Traits\SetApiToken;

/**
 * Class MEshop
 * @package Reglendo\MergadoApiModels\Models
 */
class MEshop extends MergadoApiModel
{
    use SetApiToken;
    /**
     * @var IEshopApi
     */
    private $api;

    /**
     * MEshop constructor.
     * @param array $attributes
     * @param ApiClient $apiClient
     */
    public function __construct($attributes = [], ApiClient $apiClient)
    {
        parent::__construct($attributes, $apiClient);

        $this->api = new EshopApi();
        $this->api->setClient($apiClient);
    }

    /**
     * Get eshop
     * returns $this, populated with data from API
     *
     * @method GET
     * @endpoint /api/shops/$id/?fields=$fields
     * @scope shop.read
     *
     * @param array $fields
     * @return $this
     */
    public function get(array $fields = [])
    {
        $fromApi = $this->api->get($this->id, $fields);

        $this->populate($fromApi);

        return $this;
    }

    /**
     * Catches shops info and populates it into this instance
     * Future: Mergado might add "fields" param
     *
     * @method GET
     * @endpoint /api/shops/$id/info/
     * @scope shop.read
     *
     * @return MEshop
     */
    public function getInfo()
    {
        $fromApi = $this->api->getInfo($this->id);

        $this->populate($fromApi);

        return $this;
    }

    /**
     * Gets projects of eshop
     * returns Collection of MProject instances populated with data from API
     *
     * @method GET
     * @endpoint /api/shops/$id/?limit=$limit&offset=$offset&fields=$fields
     * @scope shop.projects.read
     *
     * @param array $fields
     * @param int $limit
     * @param int $offset
     * @return ModelCollection
     */
    public function getProjects(array $fields = [], $limit = 10, $offset = 0)
    {
        $fromApi = $this->api->getProjects($this->id, $fields, $limit, $offset)->data;

        $projects = MProject::hydrate($this->api->getClient(), $fromApi);

        return $projects;
    }

    /**
     * Gets eshop google analytics
     * returns Collection of MAnalytics instances populated with data from API
     *
     * @method GET
     * @endpoint /api/shops/$id/google/analytics/?fields=$fields&limit=$limit&offset=$offset&start_date=$start_date&end_date=$end_date&metrics=$metrics&dimensions=$dimensions
     * @scope project.gs.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @param array $dimensions
     * @param array $metrics
     * @param null $startDate
     * @param null $endDate
     * @return static
     */
    public function getGoogleAnalytics($limit = 10, $offset = 0, array $fields = [], $dimensions = [], $metrics = [], $startDate = null, $endDate = null)
    {
        $fromApi = $this->api->getGoogleAnalytics($this->id, $limit, $offset, $fields,
            $dimensions, $metrics, $startDate, $endDate)
            ->data;

        $analytics = MAnalytics::hydrate($this->api->getClient(), $fromApi);

        return $analytics;
    }

    /**
     * Sends notification to eshop members
     *
     * @method POST
     * @endpoint /api/shops/$id/notifications/
     * @scope shop.notify.write
     *
     * @param $notification
     * @return MNotification
     */
    public function sendNotification($notification)
    {
        $fromApi = $this->api->sendNotification($this->id, $notification);

        $notif = new MNotification($fromApi, $this->api->getClient());

        return $notif;
    }

    /**
     * Get eshop statistics
     *
     * @method GET
     * @endpoint /api/shops/$id/stats/
     * @scope project.stats.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return ModelCollection
     */
    public function getStatistics($limit = 10, $offset = 0, array $fields = [])
    {
        $fromApi = $this->api->getStatistics($this->id, $limit, $offset, $fields)->data;

        $stats = MStats::hydrate($this->api->getClient(), $fromApi);
        return $stats;
    }

}