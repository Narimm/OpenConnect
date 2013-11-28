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
defined('_JEXEC') or die('Restricted access');
class OpenConnectHelpersView
{
    /*Loads the helper view
     * 
     * @param string @viewName 
     * @param string optional $layoutName default value is default
     * @param string optional $viewFormat defaults to html
     * @param mixed optional $vars 
     * @return the view with optinal vars 
     */
    
    function load($viewName,$layoutName='default',$viewFormat='html',$vars=null)
    {
        $app=  JFactory::getApplication();
        $app->input->set('view', $viewName);
        //register the layout path for the view
        $paths = new SplPriorityQueue;
        $paths->insert(JPATH_COMPONENT.'/views/'.strtolower($viewName).'/tmpl', 'normal');
        $viewClass = 'OpenConnectViews'.ucfirst($viewName).ucfirst($viewFormat);
        $modelClass = 'OpenConnectModels'.ucfirst($viewName);
        if (false === class_exists($modelClass))
        {
            $modelClass = 'OpenConnectModelsDefault';
        }
        $view = new $viewClass(new $modelClass,$paths);
        $view->setLayout($layoutName);
        if(isset($vars))
        {
            foreach($vars as $varName => $var)
            {
                $view->$varName = $var;
            }
        }
        return $view;
    }
    /*Loads a partial view located earlier in the View Helper file, and then 
     * once loaded it renders that view out to a variable.
     * 
     * @param string $view name of a view
     * @param string $layout type of layout eg list or profile etc
     * @param string $item an item represented on the view
     * @param mixed $data an array or var containing data from the item.
     * 
     * @return $html the rendered contents of the file referred to by the variables.
     */
    function getHtml($view,$layout,$item,$data)
    {
        $objectView = OpenConnectHelpersView::load($view,$layout,'phtml');
        $objectView->$item =$data;
        ob_start();
        echo $objectView->render();
        $html = ob_get_contents();
        ob_clean();
        
        return $html;
 
    }
}
