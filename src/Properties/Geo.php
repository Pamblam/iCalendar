<?php

namespace iCalendar\Properties;

class Geo extends Property{
	protected $name = 'GEO';
	protected $values = [];
	
	public function setLatLng($lat, $lng){
		$this->setValue("$lat;$lng");
	}
}
