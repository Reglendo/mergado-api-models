<?php
namespace Reglendo\MergadoApiModels\Api;


use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\IRuleApi;
use Reglendo\MergadoApiModels\Models\MRule;
use Reglendo\MergadoApiModels\Traits\ApiAccess;

/**
 * Class RuleApi
 * @package Reglendo\MergadoApiModels\Api
 */
class RuleApi implements IRuleApi
{
    use ApiAccess;

    /**
     * RuleApi constructor.
     */
    public function __construct()
    {
        $this->apiClient = new ApiClient();
    }

    /**
     * Gets rule and populates this instance
     *
     * @method GET
     * @endpoint /api/rules/$id/?fields=$fields
     * @scope project.rules.read
     *
     * @param $id
     * @param array $fields
     * @return MRule
     */
    public function get($id, array $fields = [])
    {
        return $this->apiClient->rules($id)
            ->fields($fields)->get();
    }

    /**
     * Update this rule with passed data
     *
     * @method PATCH
     * @endpoint /api/rules/$id/
     * @scope project.rules.write
     *
     * @param $id
     * @param array $rule
     * @return MRule
     */
    public function update($id, $rule = [])
    {
        return $this->apiClient->rules($id)
            ->patch($rule);
    }

    /**
     * Deletes this rule
     *
     * @method DELETE
     * @endpoint /api/rules/$id/
     * @scope project.rules.write
     *
     * @param $id
     * @return MRule
     */
    public function delete($id)
    {
        return $this->apiClient->rules($id)
            ->delete();
    }

    /**
     * Get rule data
     *
     * @method GET
     * @endpoint /api/rules/$id/data/
     * @scope project.rules.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return MRule
     */
    public function getData($id, $limit = 10, $offset = 0, array $fields = [])
    {
        return $this->apiClient->rules($id)->data
            ->limit($limit)->offset($offset)
            ->fields($fields)->get();
    }

    /**
     * Gets rule queries
     *
     * @method GET
     * @endpoint /api/rules/$id/queries/
     * @scope project.queries.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getQueries($id, $limit = 10, $offset = 0, array $fields = [])
    {
        return $this->apiClient->rules($id)->queries
            ->limit($limit)->offset($offset)
            ->fields($fields)->get();
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
     * @param $id
     * @param $queryId
     * @return bool
     */
    public function asignQueryById($id, $queryId)
    {
        return $this->apiClient->rules($id)->queries()
            ->patch(["id" => $queryId]);
    }

    /**
     * Assigns new query to rule
     *
     * @method PATCH
     * @endpoint /api/rules/$id/queries/
     * @scope project.rules.write
     *
     * @param $id
     * @param $query
     * @return bool
     */
    public function asignNewQuery($id, $query)
    {
        return $this->apiClient->rules($id)->queries()
            ->patch($query);
    }

    /**
     * Retracs query from rule by ikts id
     *
     * @method DELETE
     * @endpoint /api/rules/$rid/queries/$qid/
     * @scope project.rules.write
     *
     * @param $id
     * @param $queryId
     * @return bool
     */
    public function retractQuery($id, $queryId)
    {
        return $this->apiClient->rules($id)->queries($queryId)
            ->delete();
    }
}