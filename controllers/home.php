<?php
use \WillV\Project\View;

echo View::create("home")->set(array(
	"environment-name" => $this->activeEnvironment->get("human-name"),
));

