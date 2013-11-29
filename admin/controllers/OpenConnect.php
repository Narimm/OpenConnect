<?php
/**
 * Copyright 2013 benjamincharlton.
 *
 * Licensed under the Charlton Disc Trust License (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * @license http://www.binpress.com/license/view/l/1556fb36cdde3bbd81965401e9ebe417
 * @link  description
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * @author John Doe <john.doe@example.com>
 * @package com_OpenConnect
 **/
defined('_JEXEC') or die('Restricted access'); 
//load classes
JLoader::registerPrefix('OpenConnect', JPATH_COMPONENT_ADMINISTRATOR);
 
//Load plugins
//JPluginHelper::importPlugin('lendr');
 
//application
$app = JFactory::getApplication();
 
// Require specific controller if requested
$controller = $app->input->get('controller', 'display');
 
// Create the controller
$classname  = 'OpenConnectControllers'.ucwords($controller);
$controller = new $classname();
 
// Perform the Request task
$controller->execute();