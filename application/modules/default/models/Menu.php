<?php
class Default_Model_Menu extends Zend_Db{
	
		protected $_table_name = "menu";
		protected $_id;
		protected $_name;
		protected $_name_en;
		protected $_parent_id;
		protected $_link;
	
		public function __construct(){
			$this->db=Zend_Registry::get('db');
		}
	
		public function Menu_listall(){
			$select = $this->db->select()
			->from($this->_table_name);
			$data = $this->db->fetchAll($select);
	
	
			return $data;
		}
	
}

?>