<?php
namespace ProjectExampleApp\Datasets;
use WillV\Project\Dataset;

class NewTask extends Dataset {
	protected function setUp() {
		$this->fields = array(
			"title" => array(
				"required" => true,
				"customValidation" => "is_string"
			),
		);
	}
}
