<?php
namespace Reglendo\MergadoApiModels\Models;
use MergadoClient\ApiClient;

/**
 * Class MRule
 * @package Reglendo\MergadoApiModels\Models
 */
class MRule extends MergadoApiModel
{

    /**
     * MRule constructor.
     * @param array $attributes
     * @param ApiClient $api
     */
    public function __construct($attributes = [], ApiClient $api)
    {
        parent::__construct($attributes, $api);
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
        $prepared = $this->api->rules($this->id);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get();

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

        $fromApi = $this->api->rules($this->id)->patch($this->toArray());
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
        $this->api->rules($this->id)->delete();

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
        $prepared = $this->api->rules($this->id)->data->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get();

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
        $prepared = $this->api->rules($this->id)->queries->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get()->data;

        $queries = MQuery::hydrate($this->api, $fromApi);

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
        $this->api->rules($this->id)->queries()->patch(["id" => $queryId]);

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
        $this->api->rules($this->id)->queries()->patch($query);

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
        $this->api->rules($this->id)->queries($queryId)->delete();

        return true;
    }


}