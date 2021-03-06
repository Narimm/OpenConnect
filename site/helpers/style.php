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
    // no direct access
    defined('_JEXEC') or die('Restricted access');
     
    class OpenConnectHelpersStyle
    {
    function load()
    {
    $document = JFactory::getDocument();
     
    //stylesheets
    $document->addStylesheet(JURI::base().'components/com_OpenConnect/assets/css/style.css');
     
    //javascripts
    $document->addScript(JURI::base().'components/com_OpenConnect/assets/js/lendr.js');
    }
    }

