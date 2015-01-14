<?php
class Admin_Model_Traveller extends Zend_Db{
	protected $_table_name ="traveller";
	protected $_table_nation ="nation";
	protected $_id;
	protected $_order_id;
	protected $_name;
	protected $_passport;
	protected $_nation_id;
	protected $_phone;
	protected $_address;
	protected $_old_year;
	protected $_gender;
	public function getId(){
		return $this->_id;
	}
	public function getOrder_Id(){
		return $this->_order_id;
	}
	public function getName(){
		return $this->_name;
	}
	public function getPassport(){
		return $this->_passport;
	}
	public function getNation_Id(){
		return $this->_nation_id;
	}
	public function getPhone(){
		return $this->_phone;
	}
	public function getAddress(){
		return $this->_address;
	}
	public function getYear_Old(){
		return $this->_old_year;
	}
	public function getGender(){
		return $this->_gender;
	}
	public function setGender($gender){
		$this->_gender = $gender;
	}
	public function setId($id){
		//$id = $this->db->quote($id,INTEGER);
		$this->_id = $id;
	}
	public function setOrder_Id($order_id){
		//$order_id = $this->db->quote($order_id,INTEGER);
		$this->_order_id = $order_id;
	}
	public function setName($name){
		//$name = $this->db->quote($name,STRING);
		$this->_name = $name;
	}
	public function setPassport($passport){
		//$passport = $this->db->quote($passport,STRING);
		$this->_passport= $passport;
	}
	public function setNation_Id($nation_id){
		//$nation_id = $this->db->quote($nation_id,INTEGER);
		$this->_nation_id = $nation_id;
	}
	public function setPhone($phone){
		//$phone = $this->db->quote($phone,STRING);
		$this->_phone = $phone;
	}
	public function setAddress($address){
		//$address = $this->db->quote($address,STRING);
		$this->_address = $address ;
	}
	public function setYear_Old($year_old){
		//$year_old = $this->db->quote($year_old,INTEGER);
		$this->_old_year = $year_old;
	}
	
	
	public function __construct(){
		$this->db=Zend_Registry::get('db');
	}
	public function Traveller_update(){
		$where = "id = $this->_id";
		$data = array(
				'name' => $this->_name,
				'passport' => $this->_passport,
				'nation_id'=>$this->_nation_id,
				'phone'=>$this->_phone,
				'order_id'=>$this->_order_id,
				'address'=>$this->_address,
				'old_year'=>$this->_old_year,
				'gender'=>$this->_gender
		);
		return $this->db->update($this->_table_name,$data,$where);
	}
	public function Traveller_listall(){
		$select = $this->db->select()
					->from(array("p"=>$this->_table_name))
					->join(array("p2"=>$this->_table_nation),
							"p.nation_id = p2.id",
							array($this->_table_nation."_name"=>"name"));
						
		$data = $this->db->fetchAll($select);
		return $data;
	}
	
	public function Traveller_getById($id){
			if($id){
			
				
			$select = $this->db->select()
					->from(array("p"=>$this->_table_name))
					->where("p.id = ?",$id)
					->join(array("p2"=>$this->_table_nation),
							"p.nation_id = p2.id",
							array($this->_table_nation."_name"=>"name"));
			$data = $this->db->fetchRow($select);
			if($data){
				$this->_id = $data['id'];
				$this->_passport=$data['passport'];
				$this->_name = $data['name'];
				$this->_nation_id = $data['nation_id'];
				$this->_phone = $data['phone'];
				$this->_order_id = $data['order_id'];
				$this->_address = $data['address'];
				$this->_old_year = $data['old_year'];	
				$this->_gender = $data['gender'];			
			}
			return $data;
		}
		return -1;
	}
	
	public function Traveller_getByOrderId($order_id){
			if($order_id)
		{
			$select = $this->db->select()
					->from(array("p"=>$this->_table_name))
					->where("p.order_id = ?",$order_id)
					->join(array("p2"=>$this->_table_nation),
							"p.nation_id = p2.id",
							array($this->_table_nation."_name"=>"name"));
			$data = $this->db->fetchAll($select);
			return $data;
		}
		return -1;
	}
	
	public function Traveller_insert($name,$passport ="",$nation_id = 0,$phone ="",$order_id,$address ="",$year_old =0,$gender="Nam"){
		

		if(($name!=null)&& ($order_id>0)){
			$data = array(
					'name' => $name,
					'passport' => $passport,
					'nation_id'=>$nation_id,
					'phone'=>$phone,
					'order_id'=>$order_id,
					'address'=>$address,
					'old_year'=>$year_old,
					'gender'=>$gender					
			);
			$result = $this->db->insert($this->_table_name,$data);
                        if ($result>0){
                            return $this->db->lastInsertId();
                        } else {
                            return $result;
                        }
		}
		return 0;
	}
	
	public function Traveller_insertList($data){
		if($data){
			foreach($data as $value){
				$this->insertTraveller($data['name'],
						$data['passport'],
						$data['nation_id'],
						$data['phone'],
						$data['order_id'],
						$data['address'],
						$data['old_year'],
						$data['gender']);
			}
		}
	}
	public function Traveller_delete($id){
		if($id){
			$where = "id = $id";
			return $this->db->delete($this->_table_name,$where);
		}
		return 0;
	}	
}

?>