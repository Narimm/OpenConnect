<?php
/* 
 * Copyright 2013 benjamincharlton.
 *
 * Licensed under Charlton Disc Trust License (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.binpress.com/license/view/l/1556fb36cdde3bbd81965401e9ebe417
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
defined( '_JEXEC' ) or die( 'Restricted access' ); 
class OpenConnectControllersEdit extends OpenConnectControllersDefault
{
    //initialize the view
    function execute() {
        $app = JFactory::getApplication();
        $viewName = $app->input->get('view');
        $app->input->set('layout', 'edit');
        $app->input->set('view', $viewName);
        //display the view
        return parent::execute();
    }
}