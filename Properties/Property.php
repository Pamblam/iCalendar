<?php

namespace iCalendar\Properties;

/**
 * Generic iCalendar property
 * https://tools.ietf.org/html/rfc5545#section-3.1
 */
class Property{
	
	protected $name = '';
	protected $parameters = [
		"ALTREP"			=> null,	// Alternate text representation (3.2.1)
		"CN"				=> null,	// Common name (3.2.2)
		"CUTYPE"			=> null,	// Calendar user type (3.2.3)
		"DELEGATED-FROM"	=> null,	// Delegator
		"DELEGATED-TO"		=> null,	// Delegatee
		"DIR"				=> null,	// Directory entry
		"ENCODING"			=> null,	// Inline encoding
		"FMTTYPE"			=> null,	// Format type
		"FBTYPE"			=> null,	// Free/busy time type
		"LANGUAGE"			=> null,	// Language for text
		"MEMBER"			=> null,	// Group or list membership
		"PARTSTAT"			=> null,	// Participation status
		"RANGE"				=> null,	// Recurrence identifier range
		"RELATED"			=> null,	// Alarm trigger relationship
		"RELTYPE"			=> null,	// Relationship type
		"ROLE"				=> null,	// Participation role
		"RSVP"				=> null,	// RSVP expectation
		"SENT-BY"			=> null,	// Sent by
		"TZID"				=> null,	// Timezone identifier
		"VALUE"				=> null		// Specify property data type
	];
	protected $values = [];
	
	public function setValue($value){
		$this->values[] = $value;
	}
	
	public function setParameter(\iCalendar\Parameters $parameter){
		$name = $parameter->name;
		$this->parameters[$name] = $value;
		
		/// Moving these into their individual parameter classes
//		
//		$name = strtoupper(trim($name));
//		$valid = true;
//		
//		switch($name){
//			case "SENT-BY":
//			case "ALTREP":
//			case "DIR":
//				$valid = filter_var($value, FILTER_VALIDATE_URL);
//				break;
//			case "CUTYPE":
//				$value = strtoupper(trim($value));
//				$valid = in_array($value, [
//					"INDIVIDUAL",
//					"GROUP",
//					"RESOURCE",
//					"ROOM",
//					"UNKNOWN"
//				]);
//				break;
//			case "MEMBER":
//			case "DELEGATED-TO":
//			case "DELEGATED-FROM":
//				$filtered = [];
//				if(!is_array($value)){
//					$value = [$value];
//				}
//				foreach($value as $uri){
//					if(filter_var($uri, FILTER_VALIDATE_URL)){
//						$filtered[] = $uri;
//					}
//				}
//				$valid = count($filtered) > 0;
//				$value = $filtered;
//				break;
//			case "ENCODING":
//				$value = strtoupper(trim($value));
//				$valid = in_array($value, [
//					"BASE64",
//					"8BIT"
//				]);
//				break;
//			case "FBTYPE":
//				$value = strtoupper(trim($value));
//				$valid = in_array($value, [
//					"FREE",
//					"BUSY",
//					"BUSY-UNAVAILABLE",
//					"BUSY-TENTATIVE"
//				]);
//				break;
//			case "PARTSTAT":
//				$value = strtoupper(trim($value));
//				$valid = in_array($value, [
//					"NEEDS-ACTION",		// Event/To-do/Journal needs action
//					"ACCEPTED",			// Event/To-do/Journal accepted
//					"DECLINED",			// Event/To-do/Journal declined
//					"TENTATIVE",		// Event/To-do tentatively accepted
//					"DELEGATED",		// Event/To-do delegated
//					"COMPLETED",		// To-do completed
//					"IN-PROCESS",		// To-do in-process
//				]);
//				break;
//			case "RANGE":
//				$value = strtoupper(trim($value));
//				$valid = $value === "THISANDFUTURE";
//				break;
//			case "PARTSTAT":
//				$value = strtoupper(trim($value));
//				$valid = in_array($value, [
//					"START",			// Trigger off of start
//					"END"				// Trigger off of end
//				]);
//			case "RELTYPE":
//				$value = strtoupper(trim($value));
//				$valid = in_array($value, [
//					"PARENT",
//					"CHILD",
//					"SIBLING"
//				]);
//			case "ROLE":
//				$value = strtoupper(trim($value));
//				$valid = in_array($value, [
//					"CHAIR",			// chair of the calendar entity
//					"REQ-PARTICIPANT",	// a participant whose participation is required
//					"OPT-PARTICIPANT",	// a participant whose participation is optional
//					"NON-PARTICIPANT"	// a participant who is copied for information purposes only
//				]);
//				break;
//			case "RSVP":
//				if(is_string($value)){
//					$value = strtoupper(trim($value));
//					if($value === 'TRUE' || $value === '1') $value = true;
//					if($value === 'FALSE' || $value === '0') $value = false;
//				}else if(is_int($value)){
//					if($value === 1) $value = true;
//					if($value === 0) $value = false;
//				}
//				$valid = is_bool($value);
//				break;
//			case "VALUE":
//				$value = strtoupper(trim($value));
//				$valid = in_array($value, [
//					"BINARY",
//					"BOOLEAN",
//					"CAL-ADDRESS",
//					"DATE",
//					"DATE-TIME",
//					"DURATION",
//					"FLOAT",
//					"INTEGER",
//					"PERIOD",
//					"RECUR",
//					"TEXT",
//					"TIME",
//					"URI",
//					"UTC-OFFSET"
//				]);
//				break;
//		}
//		
//		if($valid){
//			$this->parameters[$name] = $value;
//		}
	}
	
	public function __get($name){
		return $this->$name;
	}
	
}

