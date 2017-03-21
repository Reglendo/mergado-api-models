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

class ProjectApi implements IProjectApi
{
    use ApiAccess;

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
     * @return mixed
     */
    public static function get($id, array $fields = [])
    {
        // TODO: Implement get() method.
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
    public static function getQueries($id, $limit = 10, $offset = 0, array $fields = [])
    {
        // TODO: Implement getQueries() method.
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
     * @param $id
     * @param array $fields
     * @param int $limit
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public static function getNamedQueries($id, array $fields = [], $limit = 500)
    {
        // TODO: Implement getNamedQueries() method.
    }

    /**
     * Gets project query with name equal to "♥ALLPRODUCTS♥" (containing all products)
     *
     * @method GET
     * @endpoint /api/projects/$id/queries/?limit=$limit&offset=0&fields=$fields
     * @scope project.queries.read
     *
     * @param $id
     * @param array $fields
     * @return \Reglendo\MergadoApiModels\Models\MQuery
     */
    public static function fetchAllProductsQuery($id, array $fields = [])
    {
        // TODO: Implement fetchAllProductsQuery() method.
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
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public static function getRules($id, $limit = 10, $offset = 0, array $fields = [])
    {
        // TODO: Implement getRules() method.
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
     * @return \Reglendo\MergadoApiModels\Models\MRule
     */
    public static function createRule($id, $rule, array $queries = [])
    {
        // TODO: Implement createRule() method.
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
    public static function createQuery($id, $query)
    {
        // TODO: Implement createQuery() method.
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
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public static function getElements($id, $limit = 10, $offset = 0, array $fields = [])
    {
        // TODO: Implement getElements() method.
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
    public static function createElement($id, $element)
    {
        // TODO: Implement createElement() method.
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
    public static function createVariable($id, $variable)
    {
        // TODO: Implement createVariable() method.
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
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public static function getVariables($id, $limit = 10, $offset = 0, array $fields = [])
    {
        // TODO: Implement getVariables() method.
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
    public static function getProducts($id, $limit = 10, $offset = 0, array $fields = [])
    {
        // TODO: Implement getProducts() method.
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
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public static function getAllProductsStats($id, $limit = 10,
                                               $offset = 0, array $fields = [], $date = null)
    {
        // TODO: Implement getAllProductsStats() method.
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
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public static function getStatsForCategories($id, $limit = 10, $offset = 0, array $fields = [])
    {
        // TODO: Implement getStatsForCategories() method.
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
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public static function getAllProductsStatsByIds($id, array $itemIds = [], array $fields = [],
                                                    $limit = 1000, $offset = 0, $date = null)
    {
        // TODO: Implement getAllProductsStatsByIds() method.
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
     * @return \Reglendo\MergadoApiModels\ModelCollection
     */
    public static function getGoogleAnalytics($id, $limit = 10,
                                              $offset = 0, array $fields = [], $dimensions = [],
                                              $metrics = [], $startDate = null, $endDate = null)
    {
        // TODO: Implement getGoogleAnalytics() method.
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
     * @return \Reglendo\MergadoApiModels\Models\MTask
     */
    public static function createTask($id, $task)
    {
        // TODO: Implement createTask() method.
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
    public static function getTasks($id, $limit = 10, $offset = 0, array $fields = [])
    {
        // TODO: Implement getTasks() method.
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
    public static function getLog($id, $type = "import", $limit = 10,
                                  $offset = 0, array $fields = [])
    {
        // TODO: Implement getLog() method.
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
    public static function getImportLog($id, $limit = 10, $offset = 0, array $fields = [])
    {
        // TODO: Implement getImportLog() method.
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
    public static function getApplyLog($id, $limit = 10, $offset = 0, array $fields = [])
    {
        // TODO: Implement getApplyLog() method.
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
    public static function getExportLog($id, $limit = 10, $offset = 0, array $fields = [])
    {
        // TODO: Implement getExportLog() method.
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
    public static function getAccessLog($id, $limit = 10, $offset = 0, array $fields = [])
    {
        // TODO: Implement getAccessLog() method.
    }
}