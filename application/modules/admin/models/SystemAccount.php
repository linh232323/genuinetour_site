<?php
class Admin_Model_SystemAccount extends Zend_Db {
	protected $_table_name = "system_account";
	public $_id;
	public $_username;
	public $_email;
	public $_password;
	
	public function getId(){
		return $this->_id;
	}
	public function getPassword(){
		return $this->_password;
	}
	public function getEmail(){
		return $this->_email;
	}
	public function getUser_Name(){
		return $this->_username;
	}

	
	public function setId($id){
		//$id = $this->db->quote($id,INTEGER);
		$this->_id = $id;
	}
	public function setPassword($password){
		//$password = $this->db->quote($password,STRING);
		$password = sha1(md5($password.'system'));
		$this->_password = $password;
	}
	public function setEmail($email){
		//$email = $this->db->quote($email,STRING);
		$this->_email= $email;
	}
	public function setUser_Name($username){
		//$username = $this->db->quote($username,INTEGER);
		$this->_username = $username;
	}

	
	
	public function __construct(){
		$this->db=Zend_Registry::get('db');
	}
	public function SystemAccount_update(){
		$where  = "id = $this->_id";
		$data =  array(
					'username' =>$this->_username,
					'password'=>$this->_password,
					'email'=>$this->_email);
		return $this->db->update($this->_table_name,$data,$where);
	}
	public function SystemAccount_listall(){
		$select = $this->db->select()->from(array("p"=>$this->_table_name),array("p.id","p.username","p.email"));
		return $this->db->fetchAll($select);
		//$sql=$this->db->query("select * from system_account");
		//return $sql->fetchAll();
	}
	
	public function SystemAccount_getByUsername($username)
	{
	
		if($username)
		{
			//$this->db->setFetchMode(Zend_Db::FETCH_ASSOC);
			//$data = $this->db->fetchRow("select * from system_account where username=$username");
			$select  = $this->db->select()->from($this->_table_name,"*")->where("username =?",$username);
			$data = $this->db->fetchRow($select);
			if($data){
				$this->_id = $data['id'];
				$this->_email = $data['email'];
				$this->_username = $data['username'];
				$this->_password = $data['password'];
				
			}
			return $data;
		}
		return -1;
	}
	public function SystemAccount_getById($id)
	{
	
		if($id)
		{
			
			
			$select  = $this->db->select()
							->from($this->_table_name,"*")
							->where("id =?",$id);
			$data = $this->db->fetchRow($select);
			
			//$this->db->select()
			//	->from("")
			
			if($data){
				$this->_id = $data['id'];
				$this->_email = $data['email'];
				$this->_username = $data['username'];
				$this->_password = $data['password'];
	
			}
			return $data;
		}
		return -1;
	}
	public function SystemAccount_checkLogin($username,$password)
	{
		if($username && $password)
		{
			$password = sha1(md5($password.'system'));
			$select  = $this->db->select()
							->from($this->_table_name,"*")
							->where("username =?",$username)
							->where("password =?",$password);
			//$sql = $this->db->query("select * from system_account where username=$username and password=$password");
			$data = $this->db->fetchAll($select);
			if(count($data) == 1)
			{
				$this->_id = $data[0]['id'];
				$this->_email = $data[0]['email'];
				$this->_username = $data[0]['username'];
				$this->_password = $data[0]['password'];
					
				return 1;
			} 
		}
		return 0;
	}
	public function SystemAccount_checkUser($u)
	{
		
		if($u)
		{
			$select  = $this->db->select()
							->from($this->_table_name,"id")
							->where("username =?",$u);
							
			$data = $this->db->fetchAll($select);
			return count($data);
		}
		return -1;
	}
	public function SystemAccount_insert($username,$password,$email)
	{
		if($username && $password && $email){
			//$username = $this->db->quote($username,STRING);
			//$password = $this->db->quote($password,STRING);
			$password = sha1(md5($password.'system'));
			//$email = $this->db->quote($email,STRING);
			if($this->SystemAccount_checkUser($username)==0){
				$data =  array(
						'username' =>$username,
						'password'=>$password,
						'email'=>$email);
				
				return $this->db->insert($this->_table_name,$data);
				
			}
		}
		return 0;
	}
	public function SystemAccount_delete($id){
		if($id){
			$where = "id = $id";
			return $this->db->delete($this->_table_name,$where);
		}
		return 0;
	}
	
	
}

?>
