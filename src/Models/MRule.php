<?php
namespace Reglendo\MergadoApiModels\Models;
use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\Api\RuleApi;
use Reglendo\MergadoApiModels\ApiInterfaces\IRuleApi;
use Reglendo\MergadoApiModels\Traits\SetApiToken;

/**
 * Class MRule
 * @package Reglendo\MergadoApiModels\Models
 */
class MRule extends MergadoApiModel
{
    use SetApiToken;

    /**
     * @var IRuleApi
     */
    private $api;

    /**
     * MRule constructor.
     * @param array $attributes
     * @param ApiClient $apiClient
     */
    public function __construct($attributes = [], ApiClient $apiClient)
    {
        parent::__construct($attributes, $apiClient);

        $this->api = new RuleApi();
        $this->api->setClient($apiClient);
    }

    /**
     * Gets rule and populates this instance
     *
     * @method GET
     * @endpoint /api/rules/$id/?fields=$fields
     * @scope project.rules.read
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
     * Update this rule with passed data
     *
     * @method PATCH
     * @endpoint /api/rules/$id/
     * @scope project.rules.write
     *
     * @param array $query
     * @return $this
     */
    public function update($query = [])
    {
        $this->populate($query);

        $fromApi = $this->api->update($this->id, $this->stripNullProperties());
        $this->populate($fromApi);

        return $this;
    }

    /**
     * Deletes this rule
     *
     * @method DELETE
     * @endpoint /api/rules/$id/
     * @scope project.rules.write
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
     * Get rule data
     *
     * @method GET
     * @endpoint /api/rules/$id/data/
     * @scope project.rules.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return $this
     */
    public function getData($limit = 10, $offset = 0, array $fields = [])
    {
        $fromApi = $this->api->getData($this->id, $limit, $offset, $fields);

        $this->populate($fromApi);

        return $this;
    }

    /**
     * Gets rule queries
     *
     * @method GET
     * @endpoint /api/rules/$id/queries/
     * @scope project.queries.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getQueries($limit = 10, $offset = 0, array $fields = [])
    {
        $fromApi = $this->api->getQueries($this->id, $limit, $offset, $fields)->data;

        $queries = MQuery::hydrate($this->api->getClient(), $fromApi);

        return $queries;
    }

    /**
     * Assigns query to rule
     * takes id of query
     *
     * 400 if query doesn't exist
     * 409 if query is already assigned to rule
     *
     * @method PATCH
     * @endpoint /api/rules/$id/queries/
     * @scope project.rules.write
     *
     * @param $queryId
     * @return bool
     */
    public function asignQueryById($queryId)
    {
        $this->api->asignQueryById($this->id, $queryId);

        return true;
    }


    /**
     * Assigns new query to rule
     *
     * @method PATCH
     * @endpoint /api/rules/$id/queries/
     * @scope project.rules.write
     *
     * @param $query
     * @return bool
     */
    public function asignNewQuery($query)
    {
        $this->api->asignNewQuery($this->id, $query);

        return true;
    }

    /**
     * Retracs query from rule by ikts id
     *
     * @method DELETE
     * @endpoint /api/rules/$rid/queries/$qid/
     * @scope project.rules.write
     *
     * @param $queryId
     * @return bool
     */
    public function retractQuery($queryId)
    {
        $this->api->retractQuery($this->id, $queryId);

        return true;
    }


}