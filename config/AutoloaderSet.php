<?php
namespace ProjectExampleApp\Config;

class AutoloaderSet extends \WillV\Project\AutoloaderSet {

	private $rootNamespace = "ProjectExampleApp";
	private $namespaceDirectories = array(
		"Config" => "config",
		"Domain" => "domain",
		"Mappers" => "mappers",
		"Helpers" => "helpers",
		"Datasets" => "datasets",
	);

	protected function setUp() {
		$this->addAutoloader(function($className) {
			$classPath = $this->getClassPath($className);
			if (!empty($classPath) and file_exists($classPath)) {
				require_once $classPath;
			}
		});
	}

	private function getClassPath($className, $mappings = array()) {
		$classDetails = explode("\\", $className);
		$numClassDetails = count($classDetails);

		if (($numClassDetails != 3) or ($classDetails[0] != $this->rootNamespace)) {
			return null;
		}

		if (!isset($this->namespaceDirectories[$classDetails[1]])) {
			throw new \Exception("Unknown subnamespace '".$classDetails[1]."'");
		}

		return $this->projectRoot."/".$this->namespaceDirectories[$classDetails[1]]."/".$classDetails[2].".php";
	}

}
