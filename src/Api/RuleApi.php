<?php
namespace Reglendo\MergadoApiModels\Api;


use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\IRuleApi;
use Reglendo\MergadoApiModels\Models\MRule;
use Reglendo\MergadoApiModels\Traits\ApiAccess;

class RuleApi implements IRuleApi
{
    use ApiAccess;

    /**
     * Gets rule and populates this instance
     *
     * @method GET
     * @endpoint /api/rules/$id/?fields=$fields
     * @scope project.rules.read
     *
     * @param array $fields
     * @return MRule
     */
    public function get(array $fields = [])
    {
        // TODO: Implement get() method.
    }

    /**
     * Update this rule with passed data
     *
     * @method PATCH
     * @endpoint /api/rules/$id/
     * @scope project.rules.write
     *
     * @param array $query
     * @return MRule
     */
    public function update($query = [])
    {
        // TODO: Implement update() method.
    }

    /**
     * Deletes this rule
     *
     * @method DELETE
     * @endpoint /api/rules/$id/
     * @scope project.rules.write
     *
     * @return MRule
     */
    public function delete()
    {
        // TODO: Implement delete() method.
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
     * @return MRule
     */
    public function getData($limit = 10, $offset = 0, array $fields = [])
    {
        // TODO: Implement getData() method.
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
        // TODO: Implement getQueries() method.
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
        // TODO: Implement asignQueryById() method.
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
        // TODO: Implement asignNewQuery() method.
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
        // TODO: Implement retractQuery() method.
    }
}