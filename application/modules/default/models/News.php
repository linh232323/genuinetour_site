<?php
class Default_Model_News extends Zend_Db{
protected $_table_name ="news";
	protected $_id;
	protected $_content;
	protected $_create_date;
	protected $_last_modify;
	protected $_user_id;
	
	public function getId(){
		return $this->_id;
	}
	public function getContent(){
		return $this->_content;
	}
	public function getCreate_Date(){
		return $this->_create_date;
	}
	public function getLast_Modify(){
		return $this->_last_modify;
	}
	public function getUser_Id(){
		return $this->_user_id;
	}
		
	public function setId($id){
	
		$this->_id = $id;
	}
	public function setContent($content){
		$this->_content = $content;
	}
	public function setCreate_Date($create_date){
		$this->_create_date = $create_date;
	}
	public function setLast_Modify($last_modify){
		$this->_last_modify = $last_modify;
	}
	public function setUser_Id($user_id){
		
		$this->_user_id =  $user_id;
	}
	
	public function __construct(){
		$this->db=Zend_Registry::get('db');
	}
	public function News_update(){
		$where = "id=$this->_id";
		$data = array(
				'content'=>$this->_content,
				'create_date'=>$this->_create_date,
				'last_modify'=>$this->_last_modify,
				'user_id'=>$this->_user_id);
		return $this->db->update($this->_table_name,$data,$where);
	}
	public function News_getById($id){
	
		
		if($id){
			$select = $this->db->select()
						->from($this->_table_name)
						->where("id =?",$id);
						
			$data = $this->db->fetchRow($select);
			
			if($data ){
				$this->_id = $data['id'];
				$this->_content = $data['content'];
				$this->_create_date = $data['create_date'];
				$this->_last_modify = $data['last_modify'];
				$this->_user_id = $data['user_id'];
				
				
			}
			return $data;
		}
		return -1;
	}
	
	public function News_listall(){
		$select = $this->db->select()
						->from($this->_table_name,"*");
						
		$data = $this->db->fetchAll($select);
		return $data;
	}
	
	public function News_insert($content,$create_date,$last_modify,$user_id){
		if($content && $create_date && $last_modify && $user_id)
		{
			//$content = $this->db->quote($content,STRING);
			//$create_date = $this->db->quote($content,STRING);
			//$last_modify = $this->db->quote($content,STRING);
			//$user_id = $this->db->quote($content,INTEGER);
			
			$data = array(
					'content'=>$content,
					'create_date'=>$create_date,
					'last_modify'=>$last_modify,
					'user_id'=>$user_id);
			
			return $this->db->insert($this->_table_name,$data);
		}
		return 0;
	}
	public function News_delete($id){
	if($id){
			$where = "id = $id";
			return $this->db->delete($this->_table_name,$where);	
		}
		return 0;
	}
}

?>