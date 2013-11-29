<?php

/**
 * Copyright 2013 benjamincharlton.
 *
 * Licensed under the Charlton Disc Trust License (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *  @copyright (c) 2013, BenCharlton
 *  @license http://www.binpress.com/license/view/l/1556fb36cdde3bbd81965401e9ebe417
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * @package name
 * @author John Doe <john.doe@example.com>
 * @link URL description
 * @category name
 */
defined('_JEXEC') or die('Restricted access');

/** Extendes Base Controller to a Display Controller 
 * @package com_OpenConnect
 * 
 * @since 0.1
 */
class OpenConnectControllersDisplay extends JControllerBase
{

    /** Executes and renders the display
     * 
     * @return boolean
     */
    public function execute() 
    {
        // Get the application
        $app = $this->getApplication();
        // Get the document object.
        $document = JFactory::getDocument();
        $viewName = $app->input->getWord('view', 'statistics');
        $viewFormat = $document->getType();
        $layoutName = $app->input->getWord('layout', 'default');
        $app->input->set('view', $viewName);
        // Register the layout paths for the view
        $paths = new SplPriorityQueue;
        $paths->insert(JPATH_COMPONENT . '/views/' . $viewName . '/tmpl', 'normal');
        $viewClass = 'OpenConnectViews' . ucfirst($viewName) . ucfirst($viewFormat);
        $modelClass = 'OpenConnectModels' . ucfirst($viewName);
        $view = new $viewClass(new $modelClass, $paths);
        $view->setLayout($layoutName);
        // Render our view.
        echo $view->render();
        return true;
    }

}
