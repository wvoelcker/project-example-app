<?php
use \WillV\Project\View;
use \WillV\Project\PDOGenerator;
use \ProjectExampleApp\Mappers\TaskMapper;

$db = PDOGenerator::create(
	$this->activeEnvironment->get("db-hostname"),
	$this->activeEnvironment->get("db-database"),
	$this->activeEnvironment->get("db-username"),
	$this->activeEnvironment->get("db-password")
)->getPDO();

$tasks = TaskMapper::create($db)->generatePage("sortIndex", "desc", 0, 10);



