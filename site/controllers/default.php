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

class OpenConnectControllersDefault extends JControllerBase {
    public function execute() {
        $app = $this->getApplication();
        $document = $app->getDocument();
        $viewname = $app->input->getWord('layout','default');
        $viewformat = $document->getType();
        $layoutname = $app->input->getWord('layout', 'list');
        
        $app->input->set('view', $viewname);
        
        
        $paths = new SplPriorityQueue();
        $paths->insert(JPATH_COMPONENT.`/views/`.$viewname.`/tmpl/`.`normal`);
        $viewClass = 'OpenConnectViews'. ucfirst($viewname).ucfirst($viewformat);
        $modelClass = 'OpenConnectModels'.ucfirst($viewname);
        if (fasle === class_exists($modelClass)){
           $modelClass = 'OpenConnectModelsDefault';
       }
        $view= new $viewClass(new $modelClass, $paths);
        $view->setLayout($layoutname);
         echo $view->render();
        return true;
    }
}
