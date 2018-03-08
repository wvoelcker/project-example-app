<?php
namespace ProjectExampleApp\Config;

class Environment extends \WillV\Project\Environment {

	protected function setUp() {
		$this->requiredFields = array(
			"human-name",
			"private-setting-1",
		);
	}
}
