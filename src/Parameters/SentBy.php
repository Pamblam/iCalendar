<?php

namespace iCalendar\Parameters;

class SentBy extends Parameter{
	protected $name = 'SENT-BY';
	protected $values = [];
	protected $multi_values = false;
	protected $acceptable_types = ['Uri'];	
}