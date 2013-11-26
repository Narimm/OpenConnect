<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class TablePatient extends JTable
{
/**
* Constructor
*
* @param object Database connector object
*/
function __construct($db){
    parent::__construct('#__OpenConnect_patient', 'patient_id', $db);
}
}
