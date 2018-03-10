<?php
namespace ProjectExampleApp\Mappers;
use WillV\Project\DataMapper\MySQLMapper;

class TaskMapper extends MySQLMapper {

	protected function setUp() {
		$this->primaryDomainObject = "\ProjectExampleApp\Domain\Task";
		$this->primaryDatabaseTable = "tasks";
	}

	protected function getColumnMappings() {
		return array(
			"id" => "id",
			"title" => "title",
			"is_started" => array(
				function($object) {
					return array(
						"key" => "is_started",
						"value" => (int)$object->get("isStarted")
					);
				},
				function($row) {
					return array(
						"key" => "isStarted",
						"value" => (bool)$row["is_started"]
					);
				}
			),
			"sortIndex" => "sort_index"
		);
	}

}