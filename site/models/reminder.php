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

//`reminder_id` int(11) NOT NULL AUTO INCREMENT,
//`patient_id` int(11) DEFAULT NULL,
//`reminder_createdDate` datetime not null,
//`reminder_dueDate` datetime DEFAULT NULL,
//`reminder_name` varchar(50) DEFAULT NULL,
//`OPENVPMS_reminder_id` BIGINT(19) NOT NULL,
//`active` tinyint(2) DEFAULT 0,
//`created_date` datetime NOT NULL,
//`modified_date` datetime NOT NULL,

defined( '_JEXEC' ) or die( 'Restricted access' ); 
class OpenConnectModelsReminder extends OpenConnectModelsDefault
{
    var $_reminder_id = null;
    var $_patient_id = null;
    var $_active = 1;
    var $_remindersDUE = FALSE;
    var $_remindersOVERDUE = FALSE;
        
    function __construct() {
        parent::__construct();
    }
    protected function buildquery()
    {
        $db=  JFactory::getDbo();
        $query = $db->getQuery(TRUE);
        $query->select('r.reminder_id,r.patient_id,r.reminder_createdDate,'
                . 'r_reminder_deuDate,r.reminder_name,r.OPENVPMS_reminder_id');
        $query->select('p.name');
        $query->leftJoin('#__openconnect_patients as p on p.patient_id = r.patient_id');
        return $query;
    }
     /**
* Builds the filter for the query
* @param object Query object
* @return object Query object
*
*/
    protected function buildwhere($query)
    {
        //if _reminderDUE set returns reminder due in the next 30 days if reminders due is 
        //not set and remindersOVERDUE is set it only returns reminders overdue as of today
        if (is_numeric($this->_patient_id)){
            $query->where('p.patient_id = '.(int)$this->_patient_id);
            }
        if ($this->_remindersDUE){
            $query->where('r.reminder_dueDate < '.date_add(datedate('Y-m-d'),date_interval_create_from_date_string('30 days')));
            }
        if (!$this->_remindersDUE && $this->_remindersOVERDUE){
            $query->where('r.reminder_dueDate < '.date('Y-m-d'));
            }
        $query->where('r.active = '.$this->_active);
  
    }
}

