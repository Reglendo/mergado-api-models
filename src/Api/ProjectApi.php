<?php
namespace Reglendo\MergadoApiModels\Api;

use MergadoClient\ApiClient;
use Reglendo\MergadoApiModels\ApiInterfaces\Collection;
use Reglendo\MergadoApiModels\ApiInterfaces\IProjectApi;
use Reglendo\MergadoApiModels\ApiInterfaces\MElement;
use Reglendo\MergadoApiModels\ApiInterfaces\MQuery;
use Reglendo\MergadoApiModels\ApiInterfaces\MRule;
use Reglendo\MergadoApiModels\ApiInterfaces\MTask;
use Reglendo\MergadoApiModels\ApiInterfaces\MVariable;
use Reglendo\MergadoApiModels\Traits\ApiAccess;

/**
 * Class ProjectApi
 * @package Reglendo\MergadoApiModels\Api
 */
class ProjectApi implements IProjectApi
{
    use ApiAccess;

    /**
     * ProjectApi constructor.
     */
    public function __construct()
    {
        $this->apiClient = new ApiClient();
    }

    /**
     * Gets project
     * returns $this, populated with data from API
     *
     * @method GET
     * @endpoint /projects/$id/?fields=$fields
     * @scope project.read
     *
     * @param $id
     * @param array $fields
     * @return object
     */
    public function get($id, array $fields = [])
    {
        return $this->apiClient->projects($id)
            ->fields($fields)->get();
    }

    /**
     * Gets projects queries
     * returns Collection of MQuery instances populated with data from API
     *
     * @method GET
     * @endpoint /api/projects/$id/queries/?limit=$limit&offset=$offset&fields=$fields
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
        return $this->apiClient->projects($id)->queries
            ->limit($limit)->offset($offset)
            ->fields($fields)->get();
    }

    /**
     * Gets project rules
     * returns Collection of MRule instances populated with data from API
     *
     * @method GET
     * @endpoint /api/projects/$id/rules/?limit=$limit&offset=$offset&fields=$fields
     * @scope project.rules.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return object
     */
    public function getRules($id, $limit = 10, $offset = 0, array $fields = [])
    {
        return $this->apiClient->projects($id)->rules
            ->limit($limit)->offset($offset)
            ->fields($fields)->get();
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
     * @param $id
     * @param $rule
     * @param array $queries (optional)
     * @return object
     */
    public function createRule($id, $rule, array $queries = [])
    {
        if (!empty($queries)) {
            if (is_array($rule)) {
                $rule["queries"] = $queries;
            } elseif (is_object($rule)) {
                $rule->queries = $queries;
            }
        }

        return $this->apiClient->projects($id)->rules()
            ->post($rule);
    }

    /**
     * Creates query asociated to project
     * returns new MQuery instance populated with data from API response
     *
     * @method POST
     * @endpoint /api/projects/$id/queries/
     * @scope project.queries.write
     *
     * @param $id
     * @param $query
     * @return \Reglendo\MergadoApiModels\Models\MQuery
     */
    public function createQuery($id, $query)
    {
        return $this->apiClient->projects($id)->queries()
            ->post($query);
    }

    /**
     * Gets project elements
     * returns Collection of MElement instances populated with data from API
     *
     * @method GET
     * @endpoint /api/projects/$id/elements/?limit=$limit&offset=$offset&fields=$fields
     * @scope project.elements.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return object
     */
    public function getElements($id, $limit = 10, $offset = 0, array $fields = [])
    {
        return $this->apiClient->projects($id)->elements
            ->limit($limit)->offset($offset)
            ->fields($fields)->get();
    }

    /**
     * Creates element asociated to project
     * returns new MElement instance populated with data from API response
     *
     * @method POST
     * @endpoint /api/projects/$id/elements/
     * @scope project.elements.write
     *
     * @param $id
     * @param $element
     * @return \Reglendo\MergadoApiModels\Models\MElement
     */
    public function createElement($id, $element)
    {
        return $this->apiClient->projects($id)->elements
            ->post($element);
    }

    /**
     * Creates variable asociated to project
     * returns new MVariable instance populated with data from API response
     *
     * @method POST
     * @endpoint /api/projects/$id/variables/
     * @scope project.variables.write
     *
     * @param $id
     * @param $variable
     * @return \Reglendo\MergadoApiModels\Models\MVariable
     */
    public function createVariable($id, $variable)
    {
        return $this->apiClient->projects($id)->variables
            ->post($variable);
    }

    /**
     * Gets project variables
     * returns Collection of MVariable instances populated with data from API
     *
     * @method GET
     * @endpoint /api/projects/$id/variables/?limit=$limit&offset=$offset&fields=$fields
     * @scope project.variables.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return object
     */
    public function getVariables($id, $limit = 10, $offset = 0, array $fields = [])
    {
        return $this->apiClient->projects($id)->variables
            ->limit($limit)->offset($offset)
            ->fields($fields)->get();
    }

    /**
     * Gets project products
     * returns Collection of MProduct instances populated with data from API
     *
     * @method GET
     * @endpoint /api/projects/$id/products/?limit=$limit&offset=$offset&fields=$fields
     * @scope project.products.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getProducts($id, $limit = 10, $offset = 0, array $fields = [])
    {
        return $this->apiClient->projects($id)->products
            ->limit($limit)->offset($offset)
            ->fields($fields)->get();
    }

    /**
     * Gets project products stats
     * return Collecton of MStats instantces populated with data from API
     *
     * @method GET
     * @endpoint /api/projects/$id/stats/products/?fields=$fields&limit=$limit&offset=$offset&date=$date&filter_by=filter_by
     * @scope project.stats.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @param null $date
     * @return object
     */
    public function getAllProductsStats($id, $limit = 10,
                                        $offset = 0, array $fields = [], $date = null)
    {
        $prepared =  $this->apiClient->projects($id)->stats->products
            ->limit($limit)->offset($offset)
            ->fields($fields);

        if ($date) {
            $prepared = $prepared->param("date", $date);
        }

        return $prepared->get();
    }

    /**
     * Gets stats for Heureka categories
     *
     * @method GET
     * @endpoint /api/projects/$id/stats/categories/
     * @scope project.stats.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return object
     */
    public function getStatsForCategories($id, $limit = 10, $offset = 0, array $fields = [])
    {
        return $this->apiClient->projects($id)->stats->categories
            ->limit($limit)->offset($offset)
            ->fields($fields)->get();
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
     * @param $id
     * @param array $itemIds
     * @param array $fields
     * @param int $limit
     * @param int $offset
     * @param null $date
     * @return object
     */
    public function getAllProductsStatsByIds($id, array $itemIds = [], array $fields = [],
                                             $limit = 1000, $offset = 0, $date = null)
    {
        $prepared = $this->apiClient->projects($id)->stats->products;

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

        return $prepared->post($postData);
    }

    /**
     * Gets project google analytics
     * returns Collection of MAnalytics instances populated with data from API
     *
     * @method GET
     * @endpoint /api/projects/$id/google/analytics/?fields=$fields&limit=$limit&offset=$offset&start_date=$start_date&end_date=$end_date&metrics=$metrics&dimensions=$dimensions
     * @scope project.ga.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @param array $dimensions
     * @param array $metrics
     * @param null $startDate
     * @param null $endDate
     * @return object
     */
    public function getGoogleAnalytics($id, $limit = 10,
                                       $offset = 0, array $fields = [], $dimensions = [],
                                       $metrics = [], $startDate = null, $endDate = null)
    {
        $prepared = $this->apiClient->projects($id)->google->analytics->limit($limit)->offset($offset);

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

        return $prepared->get();
    }

    /**
     * Creates new task for project
     *
     * @method POST
     * @endpoint /api/projects/$id/tasks/
     * @scope project.tasks.write
     *
     * @param $id
     * @param $task
     * @return object
     */
    public function createTask($id, $task)
    {
        return $this->apiClient->projects($id)->tasks->post($task);
    }

    /**
     * Gets projects tasks
     *
     * @method GET
     * @endpoint /api/projects/$id/tasks/
     * @scope project.tasks.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getTasks($id, $limit = 10, $offset = 0, array $fields = [])
    {
        return $this->apiClient->projects($id)->tasks
            ->limit($limit)->offset($offset)
            ->fields($fields)->get();
    }

    /**
     * General method for getting projects logs
     *
     * @method GET
     * @endpoint /api/projects/$id/logs/$type/
     * @scope project.logs.read
     *
     * @param $id
     * @param string $type
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getLog($id, $type = "import", $limit = 10,
                           $offset = 0, array $fields = [])
    {
        return $this->apiClient->projects($id)->logs($type)
            ->limit($limit)->offset($offset)
            ->fields($fields)->get();
    }

    /**
     * Get import logs
     *
     * @method GET
     * @endpoint /api/projects/$id/logs/import/
     * @scope project.logs.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getImportLog($id, $limit = 10, $offset = 0, array $fields = [])
    {
        $this->getLog($id, "import", $limit, $offset, $fields);
    }

    /**
     * Get apply logs
     *
     * @method GET
     * @endpoint /api/projects/$id/logs/apply/
     * @scope project.logs.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getApplyLog($id, $limit = 10, $offset = 0, array $fields = [])
    {
        $this->getLog($id, "apply", $limit, $offset, $fields);
    }

    /**
     * Get export logs
     *
     * @method GET
     * @endpoint /api/projects/$id/logs/export/
     * @scope project.logs.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getExportLog($id, $limit = 10, $offset = 0, array $fields = [])
    {
        $this->getLog($id, "export", $limit, $offset, $fields);
    }

    /**
     * Get access logs
     *
     * @method GET
     * @endpoint /api/projects/$id/logs/access/
     * @scope project.logs.read
     *
     * @param $id
     * @param int $limit
     * @param int $offset
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public function getAccessLog($id, $limit = 10, $offset = 0, array $fields = [])
    {
        $this->getLog($id, "access", $limit, $offset, $fields);
    }
}