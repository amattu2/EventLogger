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

require(dirname(__FILE__, 2) . "/EventLogger.class.php");

$logger = new amattu\EventLogger();

$logger->addEvent("Found 247 tickets to be exported");
$logger->addEvent("Skipped 11 ticket line items");
$logger->addEvent("Wrote 236 ticket line items to file");
$logger->addEvent("Uplaoded file TEST_PROD_20220116.txt to the VHR server");
$logger->addEvent("Tickets updated and logs inserted");
$logger->addEvent("Completed job");

echo $logger->getEventsTable();

