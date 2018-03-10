<?php
use \WillV\Project\View;
use \WillV\Project\PDOGenerator;
use \WillV\Project\JSONResponse;
use \ProjectExampleApp\Mappers\TaskMapper;
use \ProjectExampleApp\Domain\Task;
use \ProjectExampleApp\Datasets\NewTask as NewTaskDataset;

$db = PDOGenerator::create(
	$this->activeEnvironment->get("db-hostname"),
	$this->activeEnvironment->get("db-database"),
	$this->activeEnvironment->get("db-username"),
	$this->activeEnvironment->get("db-password")
)->getPDO();

$mapper = TaskMapper::create($db);

if (!empty($_POST)) {

	$dataSet = NewTaskDataset::create();
	if (!$dataSet->isValid($_POST, $validationErrors)) {
		JSONResponse::createFromValidationErrors($validationErrors)->send();
		exit;
	}

	// Find max sort index
	$tasks = $mapper->generatePage("sortIndex", "desc", 0, 1);
	if (!empty($tasks)) {
		$maxSortIndex = $tasks[0]->get("sortIndex");
	} else {
		$maxSortIndex = 0;
	}

	$newTask = Task::create(array("title" => $_POST["title"], "sortIndex" => $maxSortIndex + 1));
	$mapper->save($newTask);

	echo json_encode($newTask->getForPublic());
	exit;
}


$tasks = array_map(
	function($v) {
		return $v->getForPublic();
	},
	TaskMapper::create($db)->generatePage("sortIndex", "asc", 0, 10)
);

echo View::create("tasks")->set(array(
	"tasks" => $tasks
));





