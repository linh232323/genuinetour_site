<?php
class Admin_Model_TourSection extends Zend_Db{
	protected $_table_name="tour_section";
	protected $_id;
	protected $_name;
	protected $_name_en;
	
	public function getId(){
		return $this->_id;
	}
	public function getName(){
		return $this->_name;
	}
	public function getName_En(){
		$this->_name_en;
	}
	public function setId($id){
		//$id = $this->db->quote($id,INTEGER);
		$this->_id = $id;
	}
	public function setName($name){
		//$name = $this->db->quote($name,STRING);
		$this->_name = $name;
	}
	public function setName_En($name_en){
		//$name_en = $this->db->quote($name_en,STRING);
		$this->_name_en = $name_en;
	}
	
	public function __construct(){
		$this->db=Zend_Registry::get('db');
	}
	public function TourSection_update(){
		$where = "id = $this->_id";
		$data = array(
						'name'=> $this->_name,
						'name_en' => $this->_name_en);
		return $this->db->update($this->_table_name,$data,$where);
	}
	
	public function TourSection_listall()
	{
		$select = $this->db->select()
						->from($this->_table_name);
		$data = $this->db->fetchAll($select);
		return $data;
	}
	
	public function TourSection_checkExist($name){
		if($name ){

			$select = $this->db->select()
					->from($this->_table_name)
					->where("name = ?",$name);
			$data = $this->db->fetchAll($select);


			return count($data);
		}
		return -1;
	}
	
	public function TourSection_insert($name,$name_en = ""){
		{
			//$name =  $this->db->quote($name,STRING);
			//$name_en = $this->db->quote($name_en,STRING);
			{
				$data = array(
						'name'=> $name,
						'name_en' => $name_en);
	
				return $this->db->insert('tour_section',$data);

			}
		}
	
	
	}
	public function TourSection_getById($id){
		if($id){
			//$id = $this->db->quote($id,INTEGER);
			//$sql = $this->db->query("select * from tour_section where id = $id");
			//$data = $sql->fetchOne();
			$select = $this->db->select()
					->from($this->_table_name)
					->where("id =?",$id);
			$data = $this->db->fetchRow($select);
			if($data){
				$this->_id = $data['id'];
				$this->_name = $data['name'];
				$this->_name_en = $data['name_en'];
			}
			return $data;
		}
		return -1;
	
	}
	public function TourSection_delete($id){
		if($id){
			$where = "id = $id";
			return $this->db->delete($this->_table_name,$where);
		}
		return -1;
	}
}

?>