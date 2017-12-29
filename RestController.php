<?php
require_once("DeviceRestHandler.php");
		
$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/
switch($view){

	case "all":
		// to handle REST Url list/
		$deviceRestHandler = new DeviceRestHandler();
		$deviceRestHandler->getAllDevices();
		break;	
	

	case "" :
		//404 - not found;
		break;
}
?>
