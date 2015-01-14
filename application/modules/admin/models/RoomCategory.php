<?php
class Admin_Model_RoomCategory extends Zend_Db{
	protected $_table_name ="room_category";
	protected $_id;
	protected $_room_cat_name;
	protected $_room_cat_name_en;
	
	public function getId(){
		return $this->_id;
	}
	public function getRoom_Cat_Name(){
		return $this->_room_cat_name;
	}
	public function getRoom_Cat_Name_En(){
		return $this->_room_cat_name_en;
	}
	
	public function setId($id){
		//$id = $this->db->quote($id,INTEGER);
		$this->_id = $id;
	}
	public function setRoom_Cat_Name($room_cat_name){
		//$room_cat_name = $this->db->quote($room_cat_name,STRING);
		$this->_room_cat_name = $room_cat_name;
	}
	public function setRoom_Cat_Name_En($room_cat_name_en){
		//$room_cat_name_en = $this->db->quote($room_cat_name_en,STRING);
		$this->_room_cat_name_en = $room_cat_name_en;
	}
	
	public function __construct(){
		$this->db=Zend_Registry::get('db');
	}
	

	public function RoomCategory_listall()
	{
		$select = $this->db->select()
						->from($this->_table_name);
		$data = $this->db->fetchAll($select);
		return $data;
	}
	public function RoomCategory_update(){
		$where = "id = $this->_id";
		$data = array(
				'room_cat_name'=> $this->_room_cat_name,
				'room_cat_name_en' => $this->_room_cat_name_en);
		//print_r($data);
		return $this->db->update($this->_table_name,$data,$where);
	}
	public function RoomCategory_checkExist($room_cat_name,$room_cat_name_en){
		if($room_cat_name && $room_cat_name_en)
		{
			//$room_cat_name = $this->quote($room_cat_name,STRING);
			//$room_cat_name_en = $this->quote($room_cat_name_en,STRING);
			//$sql = $this->db->query("select * from room_category where room_cat_name = $room_cat_name or room_cat_name_en = $room_cat_name_en");
			//$data = $sql->fetchAll();
			$select = $this->db->select()
				->from($this->_table_name)
				->where("room_cat_name = ?",$room_cat_name)
				->orwhere("room_cat_name_en = ?",$room_cat_name_en);
			$data = $this->db->fetchAll($select);
			return count($data);
		}
		return -1;
	}
	
	public function RoomCategory_insert($room_cat_name,$room_cat_name_en){
		if($room_cat_name &&$room_cat_name_en){
			//$room_cat_name =  $this->db->quote($room_cat_name,STRING);
			//$room_cat_name_en = $this->db->quote($room_cat_name_en,STRING);
			if($this->RoomCategory_checkExist($room_cat_name,$room_cat_name_en) == 0){
				$data = array(
						'room_cat_name'=> $room_cat_name,
						'room_cat_name_en' => $room_cat_name_en);
				
				return $this->db->insert($this->_table_name,$data);
			}
		}	
		return 0;	
		
		
	}
	public function RoomCategory_getById($id){
		if($id){
			//$id = $this->db->quote($id,INTEGER);
			//$sql = $this->db->query("select * from room_category where id = $id");
			//$data = $sql->fetchOne();
			//$this->_id = $data['id'];
			//$this->_room_cat_name = $data['room_cat_name'];
			//$this->_room_cat_name_en = $data['room_cat_name_en'];
			$select = $this->db->select()
					->from($this->_table_name)
					->where("id = ?",$id);
			$data = $this->db->fetchRow($select);
			if($data){
				$this->_id = $data['id'];
				$this->_room_cat_name = $data['room_cat_name'];
				$this->_room_cat_name_en = $data['room_cat_name_en'];
			}
			return $data;
		}
		return -1;
		
	}
	public function RoomCategory_delete($id){
		if($id){
			$where = "id = $id";
			return $this->db->delete($this->_table_name,$where);
		}
		return 0;
	}
}

?>