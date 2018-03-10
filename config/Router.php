<?php
namespace ProjectExampleApp\Config;

class Router extends \WillV\Project\Router {
	protected function setUp() {
		$this->get("/", "home");
		$this->get("/items", "items");
		$this->post("/items", "items");
	}
}
