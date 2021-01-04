
# iCalendar

There are no full-featured PHP iCal implementtaions... even the official one sucks and isn't full featured. So that's what I'm trying to do here. This should be able to read and write as well as serialize data so it is easily searchable via sql.

#### Todo

 [x] Implement type validation in `\iCalendar\Parameters\Parameter::isValidType()`.
 [x] Finish converting all known parameters in `\iCalendar\Properties\Property()` to individual `Parameter` classes.
 [ ] Implement the `Recur` datatype.
