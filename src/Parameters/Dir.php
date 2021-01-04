<?php

namespace iCalendar\Parameters;

class Dir extends Parameter{
	protected $name = 'DIR';
	protected $values = [];
	protected $multi_values = false;
	protected $acceptable_types = ['Uri'];
}