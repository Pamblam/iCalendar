<?php

namespace iCalendar\Parameters;

class DelFrom extends Parameter{
	protected $name = 'DELEGATED-FROM';
	protected $values = [];
	protected $multi_values = true;
	protected $acceptable_types = ['Uri'];
}