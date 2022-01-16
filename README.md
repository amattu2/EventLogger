# Introduction
This is a basic PHP event logger class for writing HTML based event logs.

# Usage
### addEvent
This function is used to add a new event log. Optionally override the default timestamp (now).

```PHP
/**
 * Add a new event to the log
 *
 * @param string $text event content
 * @param ?DateTime $timestamp event timestamp
 * @return boolean success
 * @author Alec M.
 */
public function addEvent(string $text, \DateTime $timestamp = null) : bool
```

### getStartTime
This function returns the exact DateTime for the timestamp of the first event added.

```PHP
/**
 * Return first event timestamp
 *
 * @return \DateTime
 */
public function getStartTime() : \DateTime
```

### getEndTime
This function returns the timestamp as a DateTime for the last time an event was added to the log.

```PHP
/**
 * Return last event timestamp
 *
 * @return \DateTime
 */
public function getEndTime() : \DateTime
```

### getEvents
This returns the event log as an array.

```PHP
/**
 * Return collection of events
 *
 * @return array
 */
public function getEvents() : array
```

### getEventsTable
This returns the event log formatted as an HTML table. Optionally override the DateTime format for events.

```PHP
/**
  * Return the event list as a HTML table
  *
  * @param string $date_format DateTime format string
  * @return string HTML table
  */
public function getEventsTable(string $date_format = "Y-m-d G:i:s") : string
```

# Requirements & Dependencies
PHP7 or above
