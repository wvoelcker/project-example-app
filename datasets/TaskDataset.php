<?php
namespace ProjectExampleApp\Datasets;
use WillV\Project\Dataset;

class TaskDataset extends Dataset {
	protected function setUp() {
		$this->fields = array(
			"id" => array(
				"customValidation" => array($this, "is_integer_or_string_containing_integer"),
			),
			"title" => array(
				"required" => true,
				"visibility" => "public",
				"customValidation" => "is_string"
			),
			"isStarted" => array(
				"customValidation" => "is_bool",
			),
			"sortIndex" => array(
				"required" => true,
				"visibility" => "public",
				"customValidation" => array($this, "is_integer_or_string_containing_integer"),
			)
		);
	}

	protected function is_integer_or_string_containing_integer($value) {
		return ctype_digit((string)$value);
	}
}
