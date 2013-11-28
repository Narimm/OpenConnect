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
 
class OpenConnectViewsStatisticsHtml extends JViewHtml {

    function render() {
        $app = JFactory::getApplication();

        //retrieve task list from model
        $model = new OpenConnectModelsStatistics();
        $this->stats = $model->getStats();

        $this->addToolbar();

        //display
        return parent::render();
    }

    /**
     * Add the page title and toolbar.
     *
     * @since   1.6
     */
    protected function addToolbar() {
        $canDo = OpenConnectHelpersOpenConnect::getActions();

        // Get the toolbar object instance
        $bar = JToolBar::getInstance('toolbar');

        JToolbarHelper::title(JText::_('COM_OPENCONNECT_STATISTICS'));

        if ($canDo->get('core.admin')) {
            JToolbarHelper::preferences('com_OpenConnect');
        }
    }

}
