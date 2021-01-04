<?php

namespace iCalendar\Parameters;

class Member extends Parameter{
	protected $name = 'MEMBER';
	protected $values = [];
	protected $multi_values = true;
	protected $acceptable_types = ['Uri'];
}