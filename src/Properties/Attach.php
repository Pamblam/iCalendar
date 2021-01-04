<?php

namespace iCalendar\Properties;

class Attach extends Property{
	protected $name = 'ATTACH';
	protected $values = [];
	
	public function fromURL($url, $mime=null){
		$this->setParameter('FMTTYPE', $mime);
		$this->setValue($url);
	}
	
	public function fromFile($path){
		$this->setParameter('ENCODING', 'BASE64');
		$this->setParameter('VALUE', 'BINARY');
		$this->setValue(base64_encode(file_get_contents($path)));
	}
}

