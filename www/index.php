<?php
use WillV\Project\HTTPHeaders\NoCache;
use WillV\Project\PostRequest;
use ProjectExampleApp\Config\Router;

$projectRoot = realpath(__DIR__."/..");
require_once $projectRoot."/global.php";

// Never cache any PHP requests from this app
NoCache::create()->send();

// Parse incoming JSON objects into the POST array if necessary
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$_POST = PostRequest::dataFromJSON();
}

// Set up routes and route the request
Router::create($APP->projectRoot, $APP->activeEnvironment)->go(
	$_SERVER['REQUEST_METHOD'],
	parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);
