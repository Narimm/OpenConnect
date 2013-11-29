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
defined('_JEXEC') or die;

/**
 * Lendr component helper.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_OpenConnect
 * @since       1.6
 */
class OpenConnectHelpersOpenConnect
{
    public static $extension = 'com_OpenConnect';
    /**
         * @return  JObject
         */
        public static function getActions()
        {
                $user        = JFactory::getUser();
                $result        = new JObject;

                $assetName = 'com_OpenConnect';
                $level = 'component';

                $actions = JAccess::getActions('com_OpenConnect', $level);

                foreach ($actions as $action){
                        $result->set($action->name,        $user->authorise($action->name, $assetName));
                }

                return $result;
        }
}