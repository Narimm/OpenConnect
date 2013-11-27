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

defined( '_JEXEC' ) or die( 'Restricted access' ); 

class OpenConnectModelsPatient extends OpenConnectModelsDefault{
    var $_patient_id = null;
    var $_user_id = null;
    var $_customer_id = null;
    var $_total       = null;
    var $_pagination  = null;
    var $_alive  = 1;
    var $_reminderdue = FALSE;
    //_reminderdue set True will return only patients with a reminder due.  
    
    function __construct() {
        parent::__construct();
    }
    protected function _buildquery() {
        $db = JFactory::getDbo();
        $query = $db->getQuery(TRUE);
        $query -> select('p.patient_id, p.user_id,p.customer_id,p.openvpms_patient_id,p.name,p.description,p.dob,p.created_date,p.modified_date,p.image,');
        $query -> from('#__openconnect_patients as p');
        $query -> select(`r.reminder_id,r.reminder_dueDate`);
        $query -> leftjoin(`#__openconnect_preminder as r on r.patient_id = p.patient_id`);
        
        return $query;
}
public function getItem() {
    $patient = parent::getItem();
    $reminderModel = new OpenConnectModelsReminder();
    $reminderModel->set('_patient_id',$patient->_patient_id);
    $patient->reminders = $reminderModel->ListItems();
    return $patient;
}


/**
* Builds the filter for the query
* @param object Query object
* @return object Query object
*
*/
       protected function _buildWhere(&$query)
{
if(is_numeric($this->_patient_id)){$query->where('p.patient_id = ' . (int) $this->_patient_id);}
if(is_numeric($this->_user_id)){$query->where('p.user_id = ' . (int) $this->_user_id);}
if(is_numeric($this->_customer_id)){$query->where('p.customer_id = ' . (int) $this->_customer_id);}
if($this->_reminderdue){$query->where('r.reminderdueDate <= DATE()';}
$query->where('p.alive = ' . (int) $this->_alive);
return $query;
}
}
