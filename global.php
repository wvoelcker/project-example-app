<?php
use WillV\Project\App;

$projectRoot = __DIR__;
require_once $projectRoot."/vendor/autoload.php";
$APP = App::bootstrap($projectRoot, "ProjectExampleApp");
