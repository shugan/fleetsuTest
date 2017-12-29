<?php
/* 
A domain Class to demonstrate RESTful web services
*/
Class Device{	
	

private $devices = [
    [
      "id"   => 1,
      "device_label" => "Auto Wiz OBD",
      "device_last_reported_date" => "2017-12-28 23:58:04"
    ],
    [
      "id"   => 2,
      "device_label" => "Telus Drive +	",
      "device_last_reported_date" => "2017-12-27 23:58:04"
    ],
    [
      "id"   => 3,
      "device_label" => "Silvar Start",
      "device_last_reported_date" => "2017-12-26 23:58:04"
    ],
    [
      "id"   => 4,
      "device_label" => "Sky Track",
      "device_last_reported_date" => "2016-12-28 23:58:04"
    ],
    [
      "id"   => 5,
      "device_label" => "Geo Tab",
      "device_last_reported_date" => "2017-10-28 23:58:04"
    ]
  ];
		
	/*
		you should hookup the DAO here
	*/
	public function getAllDevice(){
                
		return $this->devices;
	}	
		
}
?>