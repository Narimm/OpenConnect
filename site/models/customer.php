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
//`customer_id` int(11) NOT NULL AUTO INCREMENT,
//`user_id` int(11) DEFAULT NULL,
//`openvpms_patient_id` BIGINT(19) NOT NULL,
//`LastName` varchar(100) DEFAULT NULL,
//`FirstName` varchar(100) DEFAULT NULL,
//`Prefix` varchar(20) DEFAULT NULL,
/*
 * this model extracts most of its data from the Openvpms construct.  It will not be user 
 * so we dont need a store routine or save routine as any changes will not propagate to Openvpms
 */
defined( '_JEXEC' ) or die( 'Restricted access' ); 
Class OpenConnectModelsCustomer extends OpenConnectModelsDefault
{
    var $_customer_id = null;
    var $_user_id = null;
    var $_opvms_customer_id = null;
    var $_total       = null;
    var $_pagination  = null;
    var $_published   = 1;
    function __construct() {
        parent::__construct();
        $app=  JFactory::getApplication();
        $this->_customer_id = $app->input->get('customer_id',null);
        $this->_user_id = $app->input->get('user_id',  JFactory::getUser()->id);
        //user_id is extracted from the Joomla Profile 
    }
    /*
     * 
     *  Adds patients to the customer model
     */
    function getItem() {
        $customer = parent::getItem();
        $patientmodel = new OpenConnectModelsPatient();
        $patientmodel->set('_user_id', $this->_user_id);
        $customer->patients = $patientmodel->ListItems();
    }
    function ListItems() {
        $patientmodel = new OpenConnectModelsPatient();
        $customers = parent::ListItems();
        $n = count($customers);
        for ($i=0;$i<$n;$i++)
        {
        $customer = $customers[$i];
        $patientmodel->_customer_id = $customer->id;
        $customer->patients = $patientmodel->ListItems();
        }
        return $customers;
     } 
     protected function _buildQuery() {
        $db = JFactory::getDBO();
        $query = $db->getQuery(TRUE);

        $query->select("c.customer_id, c.FirstName, c.LastName,c.Prefix");
        $query->from("#__openconnect_customers as c");

        $query->select("u.username, u.name");
        $query->leftjoin("#__users as u ON u.id = c.user_id");

        $query->select("p.*");
        $query->leftjoin("#__user_profiles as p on p.user_id = u.id");

        return $query;
    }
    protected function _buildWhere(&$query) {

        if (is_numeric($this->_user_id)) {
            $query->where('c.user_id = ' . (int) $this->_user_id);
        }

        if (is_numeric($this->_customer_id)) {
            $query->where('c.customer_id = ' . (int) $this->_customer_id);
        }

        $query->where('l.published = ' . (int) $this->_published);

        return $query;
    }

}