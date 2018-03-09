<?php
namespace ProjectExampleApp\Config;

class Router extends \WillV\Project\Router {
	protected function setUp() {
		$this->get("/", "home");
	}
}
