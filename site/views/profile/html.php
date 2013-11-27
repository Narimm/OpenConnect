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
class OpenConnectViewsProfileHtml extends JViewHtml
{
    function render() {
        $app = JFactory::getApplication();
        $layout = $app->input->get('layout');
        $profileModel = new OpenConnectModelsProfile();
        
        $this->_modalMessage = OpenConnectHelpersView::load('Profile','_message','phtml')
        
        switch ($layout) {
            case 'profile':
                $this->profile = $profileModel->getItem();
                $this->_addPatientView = OpenConnectHelpersView::load('Patient','_add','phtml');
                $this->_customerView = OpenConnectHelpersView::load('Customer','_customer','phtml');
                $this->_customerView->customer = $this->profile->customer;
                $this->_patientlistView = OpenConnectHelpersView::load('PatientList','_patientlist','phtml');
                $this->_patientlistView->patientlist = $this->profile->patientlist;
               break;
            case 'list':
                default:
                $this->profiles = $profileModel->ListItems();
                $this->_profileListView = OpenConnectHelpersView::load('Profile','_entry','phtml');
                break;
        }
        //displayu
        return parent::render();
    }
}