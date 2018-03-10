<?php
namespace ProjectExampleApp\Domain;
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
			),
			"is_started" => array(
				"customValidation" => "is_bool",
			),
			"sortindex" => array(
				"customValidation" => array($this, "is_integer_or_string_containing_integer"),
			)
		);
	}

	private function is_integer_or_string_containing_integer($value) {
		return ctype_digit((string)$value);
	}
}
