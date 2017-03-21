<?php
namespace Reglendo\MergadoApiModels\ApiInterfaces;

use Reglendo\MergadoApiModels\Models\MElement;
use Reglendo\MergadoApiModels\Models\MQuery;
use Reglendo\MergadoApiModels\Models\MRule;
use Reglendo\MergadoApiModels\Models\MTask;
use Reglendo\MergadoApiModels\Models\MVariable;

/**
 * Interface IProjectApi
 * @package Reglendo\MergadoApiModels\ApiInterfaces
 */
interface IProjectApi extends HasApiClient
{


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
    public static function get($id, array $fields = []);

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
    public static function getQueries($id, $limit = 10, $offset = 0, array $fields = []);

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
    public static function getNamedQueries($id, array $fields = [], $limit = 500);


    /**
     * Gets project query with name equal to "♥ALLPRODUCTS♥" (containing all products)
     *
     * @method GET
     * @endpoint /api/projects/$id/queries/?limit=$limit&offset=0&fields=$fields
     * @scope project.queries.read
     *
     * @param $id
     * @param array $fields
     * @return MQuery
     */
    public static function fetchAllProductsQuery($id, array $fields = []);

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
    public static function getRules($id, $limit = 10, $offset = 0, array $fields = []);

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
     * @return MRule
     */
    public static function createRule($id, $rule, array $queries = []);

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
     * @return MQuery
     */
    public static function createQuery($id, $query);

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
    public static function getElements($id, $limit = 10, $offset = 0, array $fields = []);

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
     * @return MElement
     */
    public static function createElement($id, $element);


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
     * @return MVariable
     */
    public static function createVariable($id, $variable);

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
    public static function getVariables($id, $limit = 10, $offset = 0, array $fields = []);

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
    public static function getProducts($id, $limit = 10, $offset = 0, array $fields = []);

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
                                               $offset = 0, array $fields = [], $date = null);

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
    public static function getStatsForCategories($id, $limit = 10, $offset = 0, array $fields = []);

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
                                                    $limit = 1000, $offset = 0, $date = null);

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
                                              $metrics = [], $startDate = null, $endDate = null);

    /**
     * Creates new task for project
     *
     * @method POST
     * @endpoint /api/projects/$id/tasks/
     * @scope project.tasks.write
     *
     * @param $id
     * @param $task
     * @return MTask
     */
    public static function createTask($id, $task);
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
    public static function getTasks($id, $limit = 10, $offset = 0, array $fields = []);

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
                                  $offset = 0, array $fields = []);

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
    public static function getImportLog($id, $limit = 10, $offset = 0, array $fields = []);

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
    public static function getApplyLog($id, $limit = 10, $offset = 0, array $fields = []);

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
    public static function getExportLog($id, $limit = 10, $offset = 0, array $fields = []);

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
    public static function getAccessLog($id, $limit = 10, $offset = 0, array $fields = []);


}