<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('_JEXEC') or die('Restricted access');
jimport('joomla.session.session');
//load tables
JTable::addIncludePath(JPATH_COMPONENT.'/tables');
//load classes
JLoader::registerPrefix('OpenConnect', JPATH_COMPONENT);
//Load plugins
JPluginHelper::importPlugin('OpenConnect');
//application
$app = JFactory::getApplication();

//assign a default if it requests specifically
$controller = $app->input->get('controller','default')
//build the controller
        
$classname = 'OpenConnectControllers'.ucwords($controller);
$controller = new $classname();
//perform the request
$controller->execute();

