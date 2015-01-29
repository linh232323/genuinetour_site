<?php

class Admin_Model_Abstract extends Zend_DB {
    
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }
    
    public function __construct() {
        $this->db = Zend_Registry::get('db');
        $this->_language = Benly_Support :: getCrtLanguage();
    }
    
    protected $_table_name = "";
    
    protected $_data;
    
    protected $_language;
    
    public function getData($key = null){
        if(isset($key))
            return $this->_data[$key];
        return $this->_data;
    }
    
    
    
    public function setValue($key,$value){
        
        $this->_data[$key]  = $value;
    }
    
    public function setData($data){
        $this->_data = $data;
    }
   
    public function save()
    {
        if(isset($this->_data['id']) && !empty($this->_data['id'])){
            update();
        }
        else{
            insert();
        }
    }
    public function insert()
    {
        return $this->db->insert($this->_table_name, $this->_data);
    }
    public function update()
    {
        $where = "id = ". $this->_data['id'];
        return $this->db->update($this->_table_name,$this->_data,$where);
    }
    public function load($id)
    {
        if (isset($id)) {

            $select = $this->db->select()
                    ->from($this->_table_name, "*")
                    ->where("id =?", $id);

            $this->_data =  $this->db->fetchRow($select);
           
        }
        return -1;
    }
    public function delete($id)
    {
        if (isset($id)) {
            $where = "id = $id";
            return $this->db->delete($this->_table_name, $where);
        }
        return 0;
    }
    
    public function listAll(){
        $select = $this->db->select()
                ->from($this->_table_name);
        $data = $this->db->fetchAll($select);


        return $data;
    }
}

?>