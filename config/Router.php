<?php
namespace ProjectExampleApp\Config;

class Router extends \WillV\Project\Router {
	protected $catchExceptions = false;

	protected function setUp() {
		$this->get("/", "home");
	}

}
