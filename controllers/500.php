<?php
echo "Internal server error";

if ($this->activeEnvironment->get("showExceptionsOn500Page")) {
	echo ": ".$this->lastException->getMessage();	
}



