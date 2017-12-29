<?php
require_once("SimpleRest.php");
require_once("Device.php");
		
class DeviceRestHandler extends SimpleRest {

	function getAllDevices() {	

		$device = new Device();
		$rawData = $device->getAllDevice();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No Devices found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = "text/html";
		$this ->setHttpHeaders($requestContentType, $statusCode);
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($rawData);
			echo $response;
		} else if(strpos($requestContentType,'text/html') !== false){
			$response = $this->encodeHtml($rawData);
			echo $response;
		}

	}
public function encodeHtml($responseData) {
	
		$htmlResponse = "<table border='1'>";
$htmlResponse .= "<tr><td>Device ID</td><td>Device Label</td><td>Last Reported Date Time</td><td>Status</td></tr>";
		foreach($responseData as $key=>$value) {		
                $hourDiff=$this->dateDiff($value[device_last_reported_date]);
if($hourDiff>24)
$status="<p style='color:red'>OFFLINE</p>";
else
$status="<p style='color:green'>OK</p>";

//date_default_timezone_set('UTC');
$timestamp = gmdate('Y-m-d H:i:s', strtotime($value[device_last_reported_date].'UTC'));

$htmlResponse .= "<tr><td>". $value[id]. "</td><td>". $value[device_label]."</td><td>".$timestamp."</td><td>".$status. "</td></tr>";
		}
		$htmlResponse .= "</table>";
		return $htmlResponse;		
	}

       public function dateDiff($dataDate){
	$dayinpass = $dataDate;
	$today = time();
	$dayinpass= strtotime($dayinpass);
	return round(abs($today-$dayinpass)/60/60);
}	
	
	
	public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
	}
	
	
	
}
?>