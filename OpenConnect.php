<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('_JEXEC') or die('Restricted access');
$controller = JControllerLegacy::getInstance('OpenConnect');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();

