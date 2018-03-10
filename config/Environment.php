<?php
namespace ProjectExampleApp\Config;

class Environment extends \WillV\Project\Environment {

	protected function setUp() {
		$this->requiredFields = array(
			"human-name",
			"showExceptionsOn500Page",
			"db-hostname",
			"db-database",
			"db-username",
			"db-password"
		);
	}
}

