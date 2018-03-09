<?php
use WillV\Project\App;

$projectRoot = realpath(__DIR__);
require_once $projectRoot."/vendor/autoload.php";
$APP = App::bootstrap($projectRoot, "ProjectExampleApp");
