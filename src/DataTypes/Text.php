<?php

namespace iCalendar\DataTypes;

class Text extends DataType {
	protected $name = 'TEXT';
	
	public function setValue($value){
		$value = strval($value);
		$unescaped = self::unescape($value);
		$this->value = self::escape($unescaped);
	}
	
	public static function escape($string){
		$unescapeds = ['/\\\\/', '/"/', '/:/', '/;/', '/,/', '/\n/'];
		$escapeds = ['\\\\\\', '\\"', '\\:', '\\;', '\\,', '\\n'];
		return preg_replace($unescapeds, $escapeds, $string);
	}

	public static function unescape($string){
		$escapeds = ['/\\\\\\\\/', '/\\\\"/', '/\\\\:/', '/\\\\;/', '/\\\\,/', '/\\\\n/'];
		$unescapeds = ['\\', '"', ':', ';', ',', "\n"];
		return preg_replace($escapeds, $unescapeds, $string);
	}
	
	public static function isValueCastable($value){
		return is_string($value);
	}
}
