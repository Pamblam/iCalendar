<?php

namespace iCalendar\Parameters;

class CommonName extends Parameter{
	protected $name = 'CN';
	protected $values = [];
	protected $multi_values = false;
	protected $acceptable_types = ['Text'];
}