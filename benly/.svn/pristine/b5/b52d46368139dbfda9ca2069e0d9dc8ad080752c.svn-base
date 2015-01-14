<?php
class Admin_Model_CustomerAccount extends Zend_DB{
	protected $_table_name = "customer_account";
	protected $_id;
	protected $_password;
	protected $_email;
	protected $_username;
	protected $_cid_passport;
	protected $_phone;
	protected $_name;
	protected $_nation_id;
	
	public function getId(){
		return $this->_id;
	}
	public function getPassword(){
		return $this->_password;
	}
	public function getEmail(){
		return $this->_email;
	}
	public function getCID_Passport(){
		return $this->_cid_passport;
	}
	public function getPhone(){
		return $this->_phone;
	}
	public function getName(){
		return $this->_name;
	}
	public function getNation_Id(){
		return $this->_nation_id;
	}
	public function getUser_Name(){
		return $this->_username;
	}
	public function setUser_Name($username){
		
		$this->_username = $username;
	
	}
	public function setId($id){
	
		$this->_id = $id;
	}
	public function setPassword($password){
	
		$password = sha1(md5($password.'user'));
		$this->_password = $password;
	}
	public function setEmail($email){
		
		$this->_email= $email;
	}
	public function setCID_Passport($passport){
		
		$this->_cid_passport = $passport;
	}
	public function setPhone($phone){
		
		 $this->_phone = $phone;
	}
	public function setName($name){
		
		$this->_name = $name;
	}
	public function setNation_Id($nation_id){
		
		 $this->_nation_id = $nation_id;
	}
	
	
	
	public function __construct(){
		$this->db=Zend_Registry::get('db');
	}
	public function CustomerAccount_update(){
		$where = ("id = $this->_id");
		$data = array(
				'password'=>$this->_password,
				'email'=>$this->_email,
				'cid_passport'=>$this->_cid_passport,
				'phone'=>$this->_phone,
				'name'=>$this->_name,
				'nation_id'=>$this->_nation_id,
				'username'=>$this->_username);
		return $this->db->update('customer_account',$data,$where);
	}
	public function CustomerAccount_listall(){
		$select = $this->db->select()
						->from($this->_table_name);
						
		
		return $this->db->fetchAll($select);
	}
	
	public function CustomerAccount_getByUsername($u)
	{
	
		if($u)
		{
			$select = $this->db->select()
					->from($this->_table_name,"*")
					->where("username =?",$u);
			
			//$sql = $this->db->query("select * from customer_account where username=$u");
			$data = $this->db->fetchRow($select);
			if($data){
				$this->_id = $data['id'];
				$this->_email = $data['email'];
				$this->_username = $data['username'];
				$this->_password = $data['password'];
				$this->_name =  $data['name'];
				$this->_nation_id = $data['nation_id'];
				$this->_phone = $data['phone'];
				$this->_cid_passport =  $data['cid_passport'];
				
			}
			return $data;
		}
		return -1;
	}
	public function CustomerAccount_checkUser($u)
	{
		
		if($u)
		{
			$select = $this->db->select()
					->from($this->_table_name,"*")
					->where("username =?",$u);
			$data = $this->db->fetchAll($select);
			return count($data);
		}
		return -1;
	}
	
	public function CustomerAccount_checkLogin($username,$password)
	{
		if($username && $password)
		{
			//$username = $this->db->quote($username,STRING);
			//$password = $this->db->quote($password,STRING);
			$password = sha1(md5($password.'user'));
			$select = $this->db->select()
					->from($this->_table_name,"*")
					->where("username =?",$username)
					->where("password =?",$password);
			$data = $this->db->fetchAll($select);
			return count($data);
			/*
			if(count($data) == 1)
			{
				$this->_id = $data[0]['id'];
				$this->_email = $data[0]['email'];
				$this->_username = $data[0]['username'];
				$this->_password = $data[0]['password'];
				$this->_name =  $data[0]['name'];
				$this->_nation_id = $data[0]['nation_id'];
				$this->_phone = $data[0]['phone'];
				$this->_cid_passport =  $data[0]['cid_passport'];
				return 1;
				
			} */
		}
		return -1;
	}
	public function CustomerAccount_insert($username,$password,$email,$cid_passport,$nation_id = 0,$phone ="" ,$name = "")
	{
		
		if($username && $password && $email && $cid_passport){
			if(($this->CustomerAccount_checkUser($username)==0)&& $username && $password){
				$password = sha1(md5($password.'user'));
				$data =  array(
						'username' =>$username,
						'password'=>$password,
						'email'=>$email,
						'name'=>$name,
						'cid_passport'=>$cid_passport,
						'phone'=>$phone,
						'nation_id'=>$nation_id);
					
				return $this->db->insert('customer_account',$data);
			}
		
		}
		return 0;
	}
	public function CustomerAccount_getById($id){
		if($id){
			//$id = $this->db->quote($id,INTEGER);
			//$sql = $this->db->query("select * from customer_account where id=$id");
			//$data = $sql->fetchOne();
			$select = $this->db->select()
					->from($this->_table_name,"*")
					->where("id =?",$id);
					
			$data = $this->db->fetchRow($select);
			if($data){
				$this->_id = $data['id'];
				$this->_email = $data['email'];
				$this->_username = $data['username'];
				$this->_password = $data['password'];
				$this->_name =  $data['name'];
				$this->_nation_id = $data['nation_id'];
				$this->_phone = $data['phone'];
				$this->_cid_passport =  $data['cid_passport'];
				
			}
			return $data;
			
		}
		return -1;
	}

	public function CustomerAccount_delete($id){
		if($id){
			$where = "id = $id";
			return $this->db->delete($this->_table_name,$where);	
		}
		return 0;
	}
}

?>