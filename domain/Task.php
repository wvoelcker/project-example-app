<?php
namespace ProjectExampleApp\Domain;
use WillV\Project\DomainObject;

class Task extends DomainObject {
	protected function setUp() {
		$this->dataSetName = "\ProjectExampleApp\Datasets\TaskDataset";
	}
}
