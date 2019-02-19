<?php
use WillV\Project\App;
use ProjectExampleApp\Config\Router;
use ProjectExampleApp\Config\EnvironmentList;

$projectRoot = __DIR__;
require_once $projectRoot."/vendor/autoload.php";
$APP = App::bootstrap($projectRoot, "ProjectExampleApp", EnvironmentList::create());
