<?php

/* 
 * Copyright 2013 benjamincharlton.
 *
 * Licensed under the Charlton Disc Trust License (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *  http://www.binpress.com/license/view/l/1556fb36cdde3bbd81965401e9ebe417
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

class OpenConnectModelsStatistics extends JModelBase
{
 
 public function getStats()
 {
    $db = JFactory::getDbo();

    $stats = array();

    //Retrieve Total customers
    $query = $db->getQuery(true);
    $query->select('COUNT(*)')
          ->from('#__openconnect_customers')
          ->where('active = 1');
    $db->setQuery($query);
    $stats['total_customers'] = $db->loadResult();

    //Retrieve Total Patients
    $query = $db->getQuery(true);
    $query->select('COUNT(*)')
          ->from('#__openconnect_patients')
          ->where('alive = 1');
    $db->setQuery($query);
    $stats['total_patients'] = $db->loadResult();

    //Retrieve Total Reminders Due including Overdues
    $query = $db->getQuery(true);
    $rdate = date_add(date(), date_interval_create_from_date_string('30 days'));
    $query->select('COUNT(*)')
          ->from('#__openconnect_preminder')
          ->where('published = 1')
          ->where('reminder_dueDate < ADDDATE(CURRENT_DATE(), INTERVAL 1 MONTH)');
    $db->setQuery($query);
    $stats['total_reminderDue'] = $db->loadResult();

        //Retrieve Total Reminders OverDue
    $query = $db->getQuery(true);
    $rdate = date_add(date(), date_interval_create_from_date_string('30 days'));
    $query->select('COUNT(*)')
          ->from('#__openconnect_preminder')
          ->where('published = 1')
          ->where('reminder_dueDate < CURRENT_DATE()');
    $db->setQuery($query);
    $stats['total_reminderOverDue'] = $db->loadResult();

    $stats['total_remindersJustDue'] = $stats['total_reminderDue']-$stats['total_reminderOverDue'];
    
//Retrieve Average Patient Counts
    $query = $db->getQuery(true);
    $query->select('COUNT(patient_id)')
          ->from('#__openconnect_patients')
          ->where('alive = 1')
          ->group('user_id');
    $db->setQuery($query);
    $userCustomer = $db->loadColumn();

    $stats['avg_library'] = count($userCustomer) > 0 ? round(array_sum($userCustomer) / count($userCustomer),0) : 0;

     return $stats;
 }

}