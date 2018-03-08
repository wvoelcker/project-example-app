<?php
namespace ProjectExampleApp\Config;

class EnvironmentList extends \WillV\Project\EnvironmentList {

	protected function setUp() {

		$this->addEnvironment("development", Environment::create(
			array(
				"human-name" => "Development",
				"private-setting-1" => "Private-value-1-development"
			),
			function() {
				return (empty($_GET["env"]) or $_GET["env"] == "dev");
			}
		));

		$this->addEnvironment("staging", Environment::create(
			array(
				"human-name" => "Staging",
			),
			array(
				__DIR__."/this-file-should-not-be-in-git-staging.json",
			),
			function() {
				return (!empty($_GET["env"]) and $_GET["env"] == "staging");
			}
		));

		$this->addEnvironment("production", Environment::create(
			array(
				"human-name" => "Production",
			),
			array(
				__DIR__."/this-file-should-not-be-in-git-production.json",
			),
			function() {
				return (!empty($_GET["env"]) and $_GET["env"] == "production");
			}
		));

	}
}
