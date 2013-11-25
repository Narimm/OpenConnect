<?php
defined('_JEXEC') or die('Restricted access');
class OpenConnectViewOpenConnect extends JViewLegacy
{
    public function display($tpl=null) {
        $this->msg = 'Test Display';
        parent::display($tpl);
        
    }
}
