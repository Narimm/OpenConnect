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

class OpenConnectModelsDefault extends JModelBase {
    protected $__state_set = null;
    protected $_total = null;
    protected $_pagination = null;
    protected $_db = null;
    protected $id = null;
    protected $limit_start = 0;
    protected $limit = 10;
    
    function __construct() {
        parent::__construct();
        }
     /* Store Data
      * 
      * @param array data data to be stored.
      * 
      * returns array Data in a row array
      */
     public function store($data=null){
      $data = $data ? $data : JInput::get('post');
      $row = JTable::getInstance($data['table'],'table');
      $date = date("Y-m-d H:i:s");
      if(!$row->bind($data)){
          return false;      
     }
     $row->modified = $date;
     if(!$row->created){
         $row->created = $date;
     }
     if(!$row->check()){
         return false;
     }
     if(!$row->store())
     {
         return false;
     }
     return $row;
     }
     /**
* Modifies a property of the object, creating it if it does not already exist.
*
* @param string $property The name of the property.
* @param mixed $value The value of the property to set.
*
* @return mixed Previous value of the property.
*
* @since 11.1
*/
     public function set($property,$value=null){
         $previous = isset($this->$property)? $this->$property : null;
         $this->$property = $value;
         return $previous;
     }
     /*Method to return the value of a property
      * 
      * @param string $property The item to return
      * @param mixed optional $default Default value of the param
      * 
      * @return the value of the property or null if not set.
      */
     public function get($property,$default=null)
     {
         return isset($this->$property)?$this->$property:$default;
     }
     /*
      * Builds a query and where clause and returns the object
      */
     public function getItem()
     {
         $db = JFactory::getDbo();
         $query = $this->_buildquery();
         $this->_buildwhere($query);
         $db->setQuery($query);
         $item = $db->loadObject();
         return $item;
     }
     /**
     * Build query and where for protected _getList function and return a list
     *
     * @return array An array of results.
     */
    public function ListItems()
    {
    $query = $this->_buildquery();
    $queryw = $this->_buildwhere($query);
    $list = $this->_getList($queryw, $this->limitstart, $this->limit);

    return $list;
    }

    /**
     * Gets an array of objects from the results of database query.
     *
     * @param string $query The query.
     * @param integer $limitstart Offset.
     * @param integer $limit The number of records.
     *
     * @return array An array of results.
     *
     * @since 11.1
     */
protected function _getList($query,$limitStart,$limit){
    $db=  JFactory::getDbo();
    $db->setQuery($query, $limitStart, $limit);
    $result=$db->loadObjectList();
    return $result;
}
 /**
* Returns a record count for the query
*
* @param string $query The query.
*
* @return integer Number of rows for query
*
* @since 11.1
*/
protected function _getListCount($query)
{
$db = JFactory::getDBO();
$db->setQuery($query);
$db->query();
 
return $db->getNumRows();
}
 /* Method to get model state variables
*
* @param string $property Optional parameter name
* @param mixed $default Optional default value
*
* @return object The property where specified, the state object where omitted
*
* @since 11.1
*/
public function getState($property = null, $default = null)
{
if (!$this->__state_set)
{
// Protected method to auto-populate the model state.
$this->populateState();
 
// Set the model state set flag to true.
$this->__state_set = true;
}
 
return $property === null ? $this->state : $this->state->get($property, $default);
}
 /**
* Get total number of rows for pagination
*/
function getTotal()
{
if ( empty ( $this->_total ) )
{
$query = $this->buildquery();
$this->_total = $this->_getListCount($query);
}
return $this->_total;
}
 /**
* Generate pagination
*/
function getPagination() {
    if(empty($this->_pagination)){
        $this->_pagination= new JPagination
                ($this->_pagination,$this->getState($this->_view.'_limitstart'),
                $this->getState($this->_view.'_limit'),
                null,
                JRoute::_('index.php?view='.$this->_view.'&layout='.$this->_layout));
        
        
    }
    return $this->_pagination;
}
}
