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
class OpenConnectModelsProfile extends OpenConnectModelsDefault
{
    var $_user_id = null;
    /* @method __construct()
     * 
     * @return void
     */
    function __construct() {     
        $app = JFactory::getApplication();
        $this->_user_id = $app->input->get('profile_id', JFactory::getUser()->id);
        parent::__construct();
    }
     /* @method getItem
     * 
     *  @return profile with customer attached
     */
    function getItem() {
        $profile = JFactory::getUser($this->_user_id);
        $userDetails = JUserHelper::getProfile($this->_user_id);
        $profile->details =  isset($userDetails->profile) ? $userDetails->profile : array();
        
//connect the Customer Model to the Joomla Profile
        $customerModel = new OpenConnectModelsCustomer();
        $customerModel->set('user_id', $this->_user_id);
        $profile->customer = $customerModel->getItem();
    //recheck the profile is the one we want.    
        $profile->isMine = JFactory::getUser()->id == $profile->id ? TRUE : FALSE;
        return $profile;
    }
    //query returns Joomla Profile as well as Open Customer Profile and counts patients
    protected function _buildQuery() {
        $db = JFactory::getDBO();
        $query = $db->getQuery(TRUE);

        $query->select("u.id, u.username, u.name, u.email, u.registerDate");
        $query->from("#__users as u");
        $query->select("c.customer_id, c.openvpms_customer_id, c.LastName as op_LastName, c.FirstName as op_FirstName, c.Prefix as op_Prefix");   
        $query->leftJoin('#__openonnect_customers as c on c.user_id = u.id');
        $query->select("COUNT(p.patient_id) as totalPatients");
        $query->leftjoin("#__openconnect_patients as p on p.user_id = u.id");

        return $query;
    }
//query groups on u.id
    protected function _buildWhere($query) {
        $query->group("u.id");
        return $query;
    }

}