<?php
namespace ProjectExampleApp\Config;

class EnvironmentList extends \WillV\Project\EnvironmentList {

	protected function setUp() {

		$this->addEnvironment("development", Environment::create(
			array(
				"human-name" => "Development",
				"showExceptionsOn500Page" => true,
				"db-hostname" => "localhost",
				"db-database" => "project-example-app",
				"db-username" => "project-example-app",
				"db-password" => "project-example-app",
			),
			function() {
				return (empty($_GET["env"]) or $_GET["env"] == "dev");
			}
		));

		$this->addEnvironment("staging", Environment::create(
			array(
				"human-name" => "Staging",
				"showExceptionsOn500Page" => false,
			),
			array(
				__DIR__."/database-settings-not-for-git-staging.json",
			),
			function() {
				return (!empty($_GET["env"]) and $_GET["env"] == "staging");
			}
		));

		$this->addEnvironment("production", Environment::create(
			array(
				"human-name" => "Production",
				"showExceptionsOn500Page" => false,
			),
			array(
				__DIR__."/database-settings-not-for-git-production.json",
			),
			function() {
				return (!empty($_GET["env"]) and $_GET["env"] == "production");
			}
		));

	}
}

