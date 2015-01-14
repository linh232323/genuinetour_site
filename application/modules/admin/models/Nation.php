<?php
class Admin_Model_Nation extends Zend_Db {
	protected $_table_name ="nation";
	protected $_id;
	protected $_name;
	
	public function getId(){
		return $this->_id;
	}
	public function getName(){
		return $this->_name;
	}
	public function setId($id){
	
		$this->_id = $id;
	}
	public function setName($name){
	
		$this->_name = $name;
	}

	
	public function __construct(){
		$this->db=Zend_Registry::get('db');
	}
	public function Nation_update(){
		$where ="id = $this->_id";
		$data = array(			
				'name' => $this->_name);
		return $this->db->update($this->_table_name,$data,$where);
	}
	public function Nation_listall(){
		
		$select = $this->db->select()
						->from($this->_table_name);
			$data = $this->db->fetchAll($select);
		return $data;
	}
	public function Nation_getById($id){
		//$id = $this->db->quote($id,'INTEGER');
		if($id){
			$select = $this->db->select()
						->from($this->_table_name,"*")
						->where("id =?",$id);
			$data = $this->db->fetchRow($select);
			//$this->db->setFetchMode(Zend_Db::FETCH_ASSOC);
			//$data = $this->db->fetchRow("select * from nation where id=$id");
			if($data){
				$this->_id = $data['id'];
				$this->_name= $data['name'];
			}
			return $data;
		}
		return -1;
	}
	public function Nation_getByName($name){
		//$name = $this->db->quote($name,STRING);
		//$sql = $this->db->query("select * from nation where id=$name");
		//$data = $sql->fetchOne();
		if($name){
			$select = $this->db->select()
					->from($this->_table_name)
					->where("name =?",$name);
			$data = $this->db->fetchRow($select);
			if($data){
				$this->_id = $data['id'];
				$this->_name= $data['name'];
			}
			return $data;
		}
		return -1;
			
		
	}
	public function Nation_insert($name){
		
		if($name){		
			$data = array("name"=>$name);
			return  $this->db->insert($this->_table_name,$data);
			
		}
		return 0;
		
		
		
	}
	public function Nation_delete($id){
		if($id){
			$where = "id = $id";
			return $this->db->delete($this->_table_name,$where);	
		}
		return 0;
	}
}

?>