<?php
class Admin_Model_Post extends Zend_Db{
protected $_table_name = "post";
	protected $_table_system_account = "system_account";
	protected $_table_post_category = "post_category";
	protected $_id;
	protected $_title;
	protected $_content;
	protected $_thumbnail_url;
	protected $_create_date;
	protected $_last_modify;
	protected $_user_id;
	protected $_post_cat_id;
	protected $_description;
	public function getId(){
		return $this->_id;
	}
	public function getTitle(){
		return $this->_title;
	}
	public function getContent(){
		return $this->_content;
	}
	public function getThumbnail_Url(){
		return $this->_thumbnail_url;
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
	public function getPost_Cat_Id(){
		return $this->_post_cat_id;
	}
	public function getDescription(){
		return $this->_description;
	}
	public function setId($id){
		//$id = $this->db->quote($id,'INTEGER');
		$this->_id = $id;
	}
	public function setContent($content){
	
		$this->_content = $content;
	}
	public function setCreate_Date($create_date){
	//	$create_date = $this->db->quote($create_date,'INTEGER');
		$this->_create_date = $create_date;
	}
	public function setLast_Modify($last_modify){
	//	$last_modify = $this->db->quote($last_modify,'INTEGER');
		$this->_last_modify = $last_modify;
	}
	public function setUser_Id($user_id){
	//	$user_id = $this->db->quote($user_id,'INTEGER');
		$this->_user_id =  $user_id;
	}
	public function setThumbnail_Url($url){
	//	$url = $this->db->quote($url,STRING);
		$this->_thumbnail_url = $url;
	}
	
	public function setTitle($title){
	//	$title = $this->db->quote($title,STRING);
		$this->_title = $title;
	}
	public function setDescription($description){
		$this->_description = $description;
	}
	public function setPost_Cat_Id($post_cat_id){
		$this->_post_cat_id = $post_cat_id;
	}
	public function __construct(){
		$this->db=Zend_Registry::get('db');
	}
	
	public function Post_listall(){
		$select = $this->db->select()
					->from(array("p" => $this->_table_name))
					->join(array("p2" => $this->_table_system_account),
							"p.user_id = p2.id",
							array($this->_table_system_account."_username"=>"username"))
					->join(array("p3" => $this->_table_post_category),
							"p.post_cat_id = p3.id",
							array($this->_table_post_category."_name"=>"name"));
		$data = $this->db->fetchAll($select);
		return $data;
	}
	public function Post_update(){
		$where = "id = $this->_id";
		$data = array(
				'title'=>$this->_title,
				'content'=>$this->_content,
				'thumbnail_url'=>$this->_thumbnail_url,
				'user_id'=>$this->_user_id ,
				'create_date'=>$this->_create_date,
				'last_modify'=>$this->_last_modify	,	
				'post_cat_id' =>$this->_post_cat_id	,
				'description'=>$this->_description		);
		return $this->db->update($this->_table_name,$data,$where);
	}
	public function Post_insert($title,
			$content,$thumbnail_url ="",$create_date,$last_modify,$user_id,$post_cat_id,$description=""){
		//if($title && $content && $user_id && $post_cat_id)
		{
		//	$title = $this->db->quote($title,STRING);
		//	$content = $this->db->quote($content,STRING);
		//	$thumbnail_url = $this->db->quote($thumbnail_url,STRING);		
		//	$user_id = $this->db->quote($user_id,'INTEGER');
			if($post_cat_id == null || $post_cat_id == "" )
				$post_cat_id = 1;
			$data = array(
					'title'=>$title,
					'content'=>$content,
					'thumbnail_url'=>$thumbnail_url,
					'user_id'=>$user_id ,
					'create_date'=>$create_date,
					'last_modify'=>$last_modify	,
					'post_cat_id'=>$post_cat_id		,
					'description'=>$description		);
			return $this->db->insert($this->_table_name,$data);
		}
		return 0;
		
	}
	
	public function Post_getById($id){
		
		if($id){

			$select = $this->db->select()
						->from(array("p"=>$this->_table_name))
						->where("p.id = ?",$id)
						->join(array("a"=>$this->_table_system_account),
								"p.user_id = a.id",
								array($this->_table_system_account."_username"=>"username"))
						->join(array("p3"=>$this->_table_post_category),
								"p.post_cat_id = p3.id",
								array($this->_table_post_category."_name"=>"name",
										$this->_table_post_category."_name_en"=>"name_en"));
            $data = $this->db->fetchRow($select);
			if($data){
				$this->_id = $data['id'];
				$this->_content = $data['content'];
				$this->_create_date = $data['create_date'];
				$this->_last_modify = $data['last_modify'];
				$this->_user_id = $data['user_id'];
				$this->_thumbnail_url = $data['thumbnail_url'];
				$this->_title = $data['title'];
				$this->_post_cat_id = $data['post_cat_id'];
				$this->_description = $data['description'];
			}
			return $data;
		}
	}
	public function Post_getByPostCat($post_cat_id,$query = true,$limit = 0){
	
		if($post_cat_id){
			$select = $this->db->select()
			->from(array("p"=>$this->_table_name))
			->limit($limit,0)
			->where("p.post_cat_id = ?",$post_cat_id)
			->join(array("a"=>$this->_table_system_account),
					"p.user_id = a.id",
					array($this->_table_system_account."_username"=>"username"))
					->join(array("p3"=>$this->_table_post_category),
							"p.post_cat_id = p3.id",
							array($this->_table_post_category."_name"=>"name",
									$this->_table_post_category."_name_en"=>"name_en"));
					if(!$query)
						$data = $this->db->fetchAll($select);
					else{
						$data = $select;
					}
					return $data;
		}
	}
	public function Post_delete($id){
		if($id){
			$where = "id = $id";
			return $this->db->delete($this->_table_name,$where);	
		}
		return 0;
	}	
}
?>
