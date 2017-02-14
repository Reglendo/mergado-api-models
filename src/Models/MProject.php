<?php
namespace Reglendo\MergadoApiModels\Models;

use Illuminate\Support\Collection;
use MergadoClient\ApiClient;

/**
 * Class MProject
 * @package Reglendo\MergadoApiModels\Models
 */
class MProject extends MergadoApiModel
{

    /**
     * MProject constructor.
     * @param array $attributes
     * @param ApiClient $api
     */
    public function __construct($attributes = [], ApiClient $api)
    {
        parent::__construct($attributes, $api);
    }

    /**
     * Gets project
     * returns $this, populated with data from API
     *
     * @method GET
     * @endpoint /projects/$id/?fields=$fields
     * @scope project.read
     *
     * @param array $fields
     * @return mixed
     */
    public function get(array $fields = [])
    {
        $prepared = $this->api->projects($this->id);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get();

        $this->populate($fromApi);

        return $this;
    }

    /**
     * Gets projects queries
     * returns Collection of MQuery instances populated with data from API
     *
     * @method GET
     * @endpoint /api/projects/$id/queries/?limit=$limit&offset=$offset&fields=$fields
     * @scope project.queries.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return Collection
     */
    public function getQueries($limit = 10, $offset = 0, array $fields = [])
    {
        $prepared = $this->api->projects($this->id)->queries->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $queries = $prepared->get()->data;

        $queries = MQuery::hydrate($this->api, $queries);

        return $queries;
    }

    /**
     * Gets all project queries that have specified name
     * return Collection of MQuery isntances
     * Defaults to high limit to make sure it will pick up all queries
     *
     * @method GET
     * @endpoint /api/projects/$id/queries/?limit=$limit&offset=0&fields=$fields
     * @scope project.queries.read
     *
     * @param int $limit
     * @param array $fields
     * @return Collection
     */
    public function getNamedQueries(array $fields = [], $limit = 500)
    {
        $prepared = $this->api->projects($this->id)->queries->limit($limit)->offset(0);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $queries = $prepared->get()->data;

        $namedQueries = array_filter($queries, function ($query) {
            return !is_null($query->name);
        });

        $queries = MQuery::hydrate($this->api, $namedQueries);

        return $queries;
    }


    /**
     * Gets project query with name equal to "♥ALLPRODUCTS♥" (containing all products)
     *
     * @method GET
     * @endpoint /api/projects/$id/queries/?limit=$limit&offset=0&fields=$fields
     * @scope project.queries.read
     *
     * @param array $fields
     * @return MQuery
     */
    public function fetchAllProductsQuery(array $fields = [])
    {
        if(!empty($fields) && !in_array($fields, "name")) {
            array_push($fields, "name");
        }

        $queries = $this->getNamedQueries($fields);
        $allProducts = $queries->where("name", "♥ALLPRODUCTS♥")->first();
        $allProducts = new MQuery($allProducts, $this->api);

        return $allProducts;
    }

    /**
     * Gets project rules
     * returns Collection of MRule instances populated with data from API
     *
     * @method GET
     * @endpoint /api/projects/$id/rules/?limit=$limit&offset=$offset&fields=$fields
     * @scope project.rules.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return Collection
     */
    public function getRules($limit = 10, $offset = 0, array $fields = [])
    {
        $prepared = $this->api->projects($this->id)->rules->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get()->data;

        $rules = MRule::hydrate($this->api, $fromApi);

        return $rules;
    }

    /**
     * Creates rule asociated to project
     * returns new MRule instance populated with data from API response
     * optional parameter queries will be added to rule["queries"] attribute
     *
     * @method POST
     * @endpoint projects/$id/rules/
     * @scope project.rules.write
     *
     * @param $rule
     * @param array $queries (optional)
     * @return MRule
     */
    public function createRule($rule, array $queries = [])
    {
        if(!empty($queries)) {
            if(is_array($rule)) {
                $rule["queries"] = $queries;
            } elseif(is_object($rule)) {
                $rule->queries = $queries;
            }
        }

        $fromApi = $this->api->projects($this->id)->rules()->post($rule);

        $newRule = new MRule($fromApi, $this->api);

        return $newRule;
    }

    /**
     * Creates query asociated to project
     * returns new MQuery instance populated with data from API response
     *
     * @method POST
     * @endpoint /api/projects/$id/queries/
     * @scope project.queries.write
     *
     * @param $query
     * @return MQuery
     */
    public function createQuery($query)
    {
        $fromApi = $this->api->projects($this->id)->queries()->post($query);

        $newRule = new MQuery($fromApi, $this->api);

        return $newRule;
    }

    /**
     * Gets project elements
     * returns Collection of MElement instances populated with data from API
     *
     * @method GET
     * @endpoint /api/projects/$id/elements/?limit=$limit&offset=$offset&fields=$fields
     * @scope project.elements.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return Collection
     */
    public function getElements($limit = 10, $offset = 0, array $fields = [])
    {
        $prepared = $this->api->projects($this->id)->elements->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get()->data;

        $elements = MElement::hydrate($this->api, $fromApi);

        return $elements;
    }

    /**
     * Creates element asociated to project
     * returns new MElement instance populated with data from API response
     *
     * @method POST
     * @endpoint /api/projects/$id/elements/
     * @scope project.elements.write
     *
     * @param $element
     * @return MElement
     */
    public function createElement($element)
    {
        $fromApi = $this->api->projects($this->id)->elements->post($element);

        $newElement = new MElement($fromApi, $this->api);

        return $newElement;
    }


    /**
     * Creates variable asociated to project
     * returns new MVariable instance populated with data from API response
     *
     * @method POST
     * @endpoint /api/projects/$id/variables/
     * @scope project.variables.write
     *
     * @param $variable
     * @return MVariable
     */
    public function createVariable($variable)
    {
        $fromApi = $this->api->projects($this->id)->variables->post($variable);

        $newVariable = new MVariable($fromApi, $this->api);

        return $newVariable;
    }

    /**
     * Gets project variables
     * returns Collection of MVariable instances populated with data from API
     *
     * @method GET
     * @endpoint /api/projects/$id/variables/?limit=$limit&offset=$offset&fields=$fields
     * @scope project.variables.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getVariables($limit = 10, $offset = 0, array $fields = [])
    {
        $prepared = $this->api->projects($this->id)->variables->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get()->data;

        $variables = MVariable::hydrate($this->api, $fromApi);

        return $variables;
    }

    /**
     * Gets project products
     * returns Collection of MProduct instances populated with data from API
     *
     * @method GET
     * @endpoint /api/projects/$id/products/?limit=$limit&offset=$offset&fields=$fields
     * @scope project.products.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return Collection
     */
    public function getProducts($limit = 10, $offset = 0, array $fields = [])
    {
        $prepared = $this->api->projects($this->id)->products->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get()->data;

        $products = MProduct::hydrate($this->api, $fromApi);

        return $products;
    }

    /**
     * Gets project products stats
     * return Collecton of MStats instantces populated with data from API
     *
     * @method GET
     * @endpoint /api/projects/$id/stats/products/?fields=$fields&limit=$limit&offset=$offset&date=$date&filter_by=filter_by
     * @scope project.stats.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @param null $date
     * @return Collection
     */
    public function getAllProductsStats($limit = 10, $offset = 0, array $fields = [], $date = null)
    {
        $prepared = $this->api->projects($this->id)->stats->products->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        if ($date) {
            $prepared = $prepared->param("date", $date);
        }

        $fromApi = $prepared->get()->data;

        $stats = MStats::hydrate($this->api, $fromApi);

        return $stats;
    }

    /**
     * Gets project products stats with POST request
     * this method is used to send json containing ids of products
     * return Collecton of MStats instantces populated with data from API
     *
     * @method POST
     * @endpoint /api/projects/$id/stats/products/
     * @scope project.stats.read
     *
     * @param array $itemIds
     * @param array $fields
     * @param int $limit
     * @param int $offset
     * @param null $date
     * @return Collection
     */
    public function getAllProductsStatsByIds(array $itemIds = [], array $fields = [], $limit = 1000, $offset = 0, $date = null)
    {
        $prepared = $this->api->projects($this->id)->stats->products;

        $postData = [];

        if (!empty($itemIds)) {
            $postData["filter_by"] = ["item_id__in" => $itemIds];
        }

        if (!empty($fields)) {
            $postData["fields"] = $fields;
        }

        if ($date) {
            $postData["date"] = $date;
        }

        if ($limit) {
            $postData["limit"] = $limit;
        }

        if ($offset) {
            $postData["offset"] = $offset;
        }

        $fromApi = $prepared->post($postData)->data;

        $stats = MStats::hydrate($this->api, $fromApi);

        return $stats;
    }

    /**
     * Gets stats for Heureka categories
     *
     * @method GET
     * @endpoint /api/projects/$id/stats/categories/
     * @scope project.stats.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getStatsForCategories($limit = 10, $offset = 0, array $fields = [])
    {
        $prepared = $this->api->projects($this->id)->stats->products->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get()->data;

        $stats = MStats::hydrate($this->api, $fromApi);
        return $stats;
    }

    /**
     * Gets project google analytics
     * returns Collection of MAnalytics instances populated with data from API
     *
     * @method GET
     * @endpoint /api/projects/$id/google/analytics/?fields=$fields&limit=$limit&offset=$offset&start_date=$start_date&end_date=$end_date&metrics=$metrics&dimensions=$dimensions
     * @scope project.ga.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @param array $dimensions
     * @param array $metrics
     * @param null $startDate
     * @param null $endDate
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getGoogleAnalytics($limit = 10, $offset = 0, array $fields = [], $dimensions = [], $metrics = [], $startDate = null, $endDate = null)
    {
        $prepared = $this->api->projects($this->id)->google->analytics->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        if ($startDate) {
            $prepared = $prepared->param("start_date", $startDate);
        }

        if ($endDate) {
            $prepared = $prepared->param("end_date", $endDate);
        }

        if ($dimensions) {
            $dimensions = implode(',', $dimensions);
            $prepared = $prepared->param("dimensions", $dimensions);
        }

        if($metrics) {
            $metrics = implode(',', $metrics);
            $prepared = $prepared->param("metrics", $metrics);
        }

        $fromApi = $prepared->get()->data;

        $analytics = MAnalytics::hydrate($this->api, $fromApi);

        return $analytics;
    }

    /**
     * Creates new task for project
     *
     * @method POST
     * @endpoint /api/projects/$id/tasks/
     * @scope project.tasks.write
     *
     * @param $task
     * @return MTask
     */
    public function createTask($task)
    {
        $fromApi = $this->api->projects($this->id)->tasks->post($task);

        $task = new MTask($fromApi, $this->api);

        return $task;
    }

    /**
     * Gets projects tasks
     *
     * @method GET
     * @endpoint /api/projects/$id/tasks/
     * @scope project.tasks.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getTasks($limit = 10, $offset = 0, array $fields = [])
    {
        $prepared = $this->api->projects($this->id)->tasks->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get()->data;

        $tasks = MTask::hydrate($this->api, $fromApi);

        return $tasks;
    }

    /**
     * General method for getting projects logs
     *
     * @method GET
     * @endpoint /api/projects/$id/logs/$type/
     * @scope project.logs.read
     *
     * @param string $type
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getLog($type = "import", $limit = 10, $offset = 0, array $fields = [])
    {
        $prepared = $this->api->projects($this->id)->logs($type)->limit($limit)->offset($offset);

        if (!empty($fields)) {
            $prepared = $prepared->fields($fields);
        }

        $fromApi = $prepared->get()->data;

        $logs = MLog::hydrate($this->api, $fromApi);

        $logs->transform(function($item) use ($type) {
            $item->type = $type;
            return $item;
        });

        return $logs;
    }

    /**
     * Get import logs
     *
     * @method GET
     * @endpoint /api/projects/$id/logs/import/
     * @scope project.logs.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getImportLog($limit = 10, $offset = 0, array $fields = [])
    {
        return $this->getLog("import", $limit, $offset, $fields);
    }

    /**
     * Get apply logs
     *
     * @method GET
     * @endpoint /api/projects/$id/logs/apply/
     * @scope project.logs.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getApplyLog($limit = 10, $offset = 0, array $fields = [])
    {
        return $this->getLog("apply", $limit, $offset, $fields);
    }

    /**
     * Get export logs
     *
     * @method GET
     * @endpoint /api/projects/$id/logs/export/
     * @scope project.logs.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getExportLog($limit = 10, $offset = 0, array $fields = [])
    {
        return $this->getLog("export", $limit, $offset, $fields);
    }

    /**
     * Get access logs
     *
     * @method GET
     * @endpoint /api/projects/$id/logs/access/
     * @scope project.logs.read
     *
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getAccessLog($limit = 10, $offset = 0, array $fields = [])
    {
        return $this->getLog("access", $limit, $offset, $fields);
    }


}