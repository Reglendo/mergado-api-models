<?php

require_once __DIR__ . '/../vendor/autoload.php';
$api = new \MergadoClient\ApiClient();
$project = new Reglendo\MergadoApiModels\Models\MProject(1, ["foo" => "bar", "baz" => 55], $api);

var_dump($project);
var_dump($project->foo);