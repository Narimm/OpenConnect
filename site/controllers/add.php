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
 
class OpenConnectControllersAdd extends JControllerBase
{
  public function execute()
  {
    $app = JFactory::getApplication();
    $return = array("success"=>false);

    $modelName = $app->input->get('model', 'Patient');
    $view = $app->input->get('view', 'Patient');
    $layout = $app->input->get('layout', '_entry');
    $item = $app->input->get('item', 'patient');

    $modelName = 'OpenConnectModels'.ucwords($modelName);

           $model = new $modelName();
           if ( $row = $model->store() )
           {
                   $return['success'] = true;
                   $return['msg'] = JText::_('COM_OPENCONNECT_SAVE_SUCCESS');

     $return['html'] = OpenConnectHelpersView::getHtml($view, $layout, $item, $row);
           }else{
                   $return['msg'] = JText::_('COM_OPENCONNECT_SAVE_FAILURE');
           }
    
          echo json_encode($return);

  }

}