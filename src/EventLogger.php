<?php
/*
 * Produced: Sun Jan 16 2022
 * Author: Alec M.
 * GitHub: https://amattu.com/links/github
 * Copyright: (C) 2022 Alec M.
 * License: License GNU Affero General Public License v3.0
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace amattu2;

/**
 * Simple Event Logger class
 */
class EventLogger
{
  /**
   * The collection of events
   *
   * @var array
   */
  private $events = null;

  /**
   * The time of first event
   *
   * @var \DateTime
   */
  private $startTime = null;

  /**
   * The time of the last event
   *
   * @var \DateTime
   */
  private $endTime = null;

  /**
   * Class Constructor
   *
   * @author Alec M.
   */
  public function __construct()
  {
    $this->events = [];
  }

  /**
   * Add a new event to the logs
   *
   * @param string $text event content
   * @param ?\DateTime $timestamp event timestamp
   * @return boolean success
   * @author Alec M.
   */
  public function addEvent(string $text, \DateTime$timestamp = null): bool
  {
    // Add start timestamp
    if (!$this->startTime) {
      $this->startTime = new \DateTime();
    }

    // Push new event
    $this->events[] = [
      'text' => $text,
      'timestamp' => $timestamp ?: new \DateTime(),
    ];

    // Update last timestamp
    $this->endTime = new \DateTime();

    // Return default
    return true;
  }

  /**
   * Return first event timestamp
   *
   * @return \DateTime
   */
  public function getStartTime(): \DateTime
  {
    return $this->startTime;
  }

  /**
   * Return last event timestamp
   *
   * @return \DateTime
   */
  public function getEndTime(): \DateTime
  {
    return $this->endTime;
  }

  /**
   * Return collection of events
   *
   * @return array
   */
  public function getEvents(): array
  {
    return $this->events;
  }

  /**
   * Return the event list as a HTML table
   *
   * @param string $date_format DateTime format string
   * @return string HTML table
   */
  public function getEventsTable(string $date_format = "Y-m-d G:i:s"): string
  {
    // HTML table
    $html = "<table style='width: 100%; border-collapse: collapse;'><thead style='background: #3b3b3b; color: #fff;'><tr><td>#</td><td>Timestamp</td><td>Event</td></tr></thead>";
    $rows = "";

    // Build result
    foreach ($this->events as $index => $event) {
      $event['index'] = $index + 1;
      $rows .= "<tr><td>{$event['index']}</td><td>{$event['timestamp']->format($date_format)}</td><td>{$event['text']}</td></tr>";
    }
    $html .= "<tbody style='font-size: 14px'>";
    $html .= $rows;
    $html .= "</tbody>";
    $html .= "</table>";

    // Return
    return $html;
  }
}
