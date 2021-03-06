<?php

namespace iCalendar;

define("ICAL_BASEDIR", realpath(dirname(__FILE__)));

require ICAL_BASEDIR . '/DataTypes/DataType.php';
require ICAL_BASEDIR . '/DataTypes/Binary.php';
require ICAL_BASEDIR . '/DataTypes/Duration.php';
require ICAL_BASEDIR . '/DataTypes/Period.php';
require ICAL_BASEDIR . '/DataTypes/Time.php';
require ICAL_BASEDIR . '/DataTypes/Boolean.php';
require ICAL_BASEDIR . '/DataTypes/Date.php';
require ICAL_BASEDIR . '/DataTypes/FloatNum.php';
require ICAL_BASEDIR . '/DataTypes/Recur.php';
require ICAL_BASEDIR . '/DataTypes/Uri.php';
require ICAL_BASEDIR . '/DataTypes/CalAddress.php';
require ICAL_BASEDIR . '/DataTypes/DateTime.php';
require ICAL_BASEDIR . '/DataTypes/IntegerNum.php';
require ICAL_BASEDIR . '/DataTypes/Text.php';
require ICAL_BASEDIR . '/DataTypes/UtcOffset.php';

require ICAL_BASEDIR . '/Parameters/Parameter.php';
require ICAL_BASEDIR . '/Parameters/AltRep.php';
require ICAL_BASEDIR . '/Parameters/Dir.php';
require ICAL_BASEDIR . '/Parameters/Member.php';
require ICAL_BASEDIR . '/Parameters/Related.php';
require ICAL_BASEDIR . '/Parameters/Value.php';
require ICAL_BASEDIR . '/Parameters/CommonName.php';
require ICAL_BASEDIR . '/Parameters/Encoding.php';
require ICAL_BASEDIR . '/Parameters/Role.php';
require ICAL_BASEDIR . '/Parameters/CuType.php';
require ICAL_BASEDIR . '/Parameters/FbType.php';
require ICAL_BASEDIR . '/Parameters/PartStat.php';
require ICAL_BASEDIR . '/Parameters/Rsvp.php';
require ICAL_BASEDIR . '/Parameters/DelFrom.php';
require ICAL_BASEDIR . '/Parameters/FmtType.php';
require ICAL_BASEDIR . '/Parameters/Range.php';
require ICAL_BASEDIR . '/Parameters/SentBy.php';
require ICAL_BASEDIR . '/Parameters/DelTo.php';
require ICAL_BASEDIR . '/Parameters/Language.php';
require ICAL_BASEDIR . '/Parameters/RelType.php';
require ICAL_BASEDIR . '/Parameters/Tzid.php';

require ICAL_BASEDIR . "/Properties/Property.php";
require ICAL_BASEDIR . "/Properties/Action.php";
require ICAL_BASEDIR . "/Properties/DtStamp.php";
require ICAL_BASEDIR . "/Properties/Priority.php";
require ICAL_BASEDIR . "/Properties/Transp.php";
require ICAL_BASEDIR . "/Properties/Attach.php";
require ICAL_BASEDIR . "/Properties/DtStart.php";
require ICAL_BASEDIR . "/Properties/ProdID.php";
require ICAL_BASEDIR . "/Properties/Trigger.php";
require ICAL_BASEDIR . "/Properties/Attendee.php";
require ICAL_BASEDIR . "/Properties/Due.php";
require ICAL_BASEDIR . "/Properties/TzID.php";
require ICAL_BASEDIR . "/Properties/CalScale.php";
require ICAL_BASEDIR . "/Properties/Duration.php";
require ICAL_BASEDIR . "/Properties/RecurDate.php";
require ICAL_BASEDIR . "/Properties/TzName.php";
require ICAL_BASEDIR . "/Properties/Categories.php";
require ICAL_BASEDIR . "/Properties/ExceptionDate.php";
require ICAL_BASEDIR . "/Properties/RecurRule.php";
require ICAL_BASEDIR . "/Properties/TzOffsetFrom.php";
require ICAL_BASEDIR . "/Properties/Classification.php";
require ICAL_BASEDIR . "/Properties/FreeBusy.php";
require ICAL_BASEDIR . "/Properties/RecurrenceID.php";
require ICAL_BASEDIR . "/Properties/TzOffsetTo.php";
require ICAL_BASEDIR . "/Properties/Comment.php";
require ICAL_BASEDIR . "/Properties/Geo.php";
require ICAL_BASEDIR . "/Properties/RelatedTo.php";
require ICAL_BASEDIR . "/Properties/TzURL.php";
require ICAL_BASEDIR . "/Properties/Completed.php";
require ICAL_BASEDIR . "/Properties/LastModified.php";
require ICAL_BASEDIR . "/Properties/RepeatCount.php";
require ICAL_BASEDIR . "/Properties/UID.php";
require ICAL_BASEDIR . "/Properties/Contact.php";
require ICAL_BASEDIR . "/Properties/Location.php";
require ICAL_BASEDIR . "/Properties/Resources.php";
require ICAL_BASEDIR . "/Properties/URL.php";
require ICAL_BASEDIR . "/Properties/Created.php";
require ICAL_BASEDIR . "/Properties/Method.php";
require ICAL_BASEDIR . "/Properties/Sequence.php";
require ICAL_BASEDIR . "/Properties/Version.php";
require ICAL_BASEDIR . "/Properties/Description.php";
require ICAL_BASEDIR . "/Properties/Organizer.php";
require ICAL_BASEDIR . "/Properties/Status.php";
require ICAL_BASEDIR . "/Properties/DtEnd.php";
require ICAL_BASEDIR . "/Properties/PercentComplete.php";
require ICAL_BASEDIR . "/Properties/Summary.php";

require ICAL_BASEDIR . "/Components/Component.php";
require ICAL_BASEDIR . "/Components/Alarm.php";
require ICAL_BASEDIR . "/Components/DaylightTime.php";
require ICAL_BASEDIR . "/Components/Event.php";
require ICAL_BASEDIR . "/Components/FreeBusy.php";
require ICAL_BASEDIR . "/Components/Journal.php";
require ICAL_BASEDIR . "/Components/StandardTime.php";
require ICAL_BASEDIR . "/Components/TimeZone.php";
require ICAL_BASEDIR . "/Components/ToDo.php";

require ICAL_BASEDIR . "/IO/Parser.php";

class iCalendar extends Components\Component{
	
	protected $name = 'iCalendar';
	protected $properties = [
		'PRODID'	=> null,
		'VERSION'	=> null,
		'CALSCALE'	=> null,
		'METHOD'	=> null
	];
	
	protected $allowed_subcomponents = [
		'VEVENT',
		'VTODO',
		'VJOURNAL',
		'VFREEBUSY',
		'VTIMEZONE'
	];
	
}


