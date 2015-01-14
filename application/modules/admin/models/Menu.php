<?php
class Admin_Model_Menu extends Zend_DB{
	protected $_table_name = "menu";
	protected $_id;
	protected $_name;
	protected $_name_en;
	protected $_parent_id;
	protected $_link;
	protected $_link_en;
	public function __construct(){
		$this->db=Zend_Registry::get('db');
	}
	
	public function Menu_listall(){
		$select = $this->db->select()
					->from($this->_table_name);
		$data = $this->db->fetchAll($select);
		
		
		return $data;		
	}
	public function getId(){
		return $this->_id;
	}
	public function getName(){
		return $this->_name;
	}
	public function getName_En(){
		return $this->_name_en;
	}
	public function getParent_Id(){
		return $this->_parent_id;
	}
	public function getLink(){
		return $this->_link;
	}
	public function getLink_En(){
		return $this->_link_en;
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
	public function setParent_Id($parent_id){
		$this->_parent_id = $parent_id;
	}
	public function setLink($link){
		$this->_link = $link;
	}
	public function setLink_En($link_en){
		$this->_link_en = $link_en;
	}
	public function Menu_update(){
		$where = "id = $this->_id";
		$data = array(
						'name'=> $this->_name,
						'name_en' => $this->_name_en,
						'parent_id'=>$this->_parent_id,
						'link'=>$this->_link,
						'link_en'=>$this->_link_en);
		//print($this->_id);
		return $this->db->update($this->_table_name,$data,$where);
	}
	
	
	
	
	
	public function Menu_insert($name,$name_en = "",$parent_id=0,$link=null,$link_en=null){
		
			//$name =  $this->db->quote($name,STRING);
			//$name_en = $this->db->quote($name_en,STRING);
			{
				$data = array(
						'name'=> $name,
						'name_en' => $name_en,
						'parent_id'=>$parent_id,
						'link'=>$link,
						'link_en'=>$link_en);
	
				return $this->db->insert($this->_table_name,$data);
			}
		
	
	
	}
	public function Menu_getById($id){
		if($id){
			$select = $this->db->select()
					->from($this->_table_name)
					->where("id =?",$id);
			$data = $this->db->fetchRow($select);
			//$id = $this->db->quote($id,INTEGER);
			//$sql = $this->db->query("select * from transport where id = $id");
			//$data = $sql->fetchOne();
			
			if($data){
				$this->_id = $data['id'];
				$this->_name = $data['name'];
				$this->_name_en = $data['name_en'];
				$this->_parent_id = $data['parent_id'];
				$this->_link = $data['link'];
				$this->_link_en = $data['link'];
			}
			return $data;
		}
		return -1;
	
	}
	public function Menu_hasChild($data,$id){
		function is_parent($data,$id){
			foreach($data as $val){
				if($val['parent_id'] == $id){
					return 1;
					break;
				}
			}
			return 0;
		}
	}
	public function Menu_delete($id){
		if($id){
			$data = $this->Menu_listall();
			if(!$this->Menu_hasChild($data, $id)){
				$where = "id = $id";
				return $this->db->delete($this->_table_name,$where);
			}else{
				return -1;
			}
		}
		return -1;
	}
}

?>