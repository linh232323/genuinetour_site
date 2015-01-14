<?php
class Admin_Model_RoomOrder extends Zend_Db{
	protected $_table_name = "room_order";
	protected $_table_room_category = "room_category";
	protected $_order_id;
	protected $_room_cat_id;
	protected $_num_1_0;
	protected $_num_2_0;
	protected $_num_1_1;
	protected $_num_0_2;
	
	public function getOrder_Id(){
		return $this->_order_id;
	}
	public function getRoom_Cat_Id(){
		return $this->_room_cat_id;
	}
	public function getNum_1_0(){
		return $this->_num_1_0;
	}
	public function getNum_1_1(){
		return $this->_num_1_1;
	}
	public function getNum_2_0(){
		return $this->_num_2_0;
	}
	public function getNum_0_2(){
		return $this->_num_0_2;
	}
	public function setOrder_Id($order_id){
		//$order_id = $this->db->quote($order_id,INTEGER);
		$this->_order_id = $order_id;
	}
	public function setRoom_Cat_Id($room_cat_id){
		//$room_cat_id = $this->db->quote($room_cat_id,INTEGER);
		$this->_room_cat_id = $room_cat_id;
	}
	public function setNum_1_0($num_1_0){
		//$num = $this->db->quote($num,INTEGER);
		return $this->_num_1_0 = $num_1_0;
	}
	public function setNum_1_1($num_1_1){
		//$num = $this->db->quote($num,INTEGER);
		return $this->_num_1_1 = $num_1_1;
	}
	public function setNum_2_0($num_2_0){
		//$num = $this->db->quote($num,INTEGER);
		return $this->_num_2_0 = $num_2_0;
	}
	public function setNum_0_2($num_0_2){
		//$num = $this->db->quote($num,INTEGER);
		return $this->_num_0_2 = $num_0_2;
	}
	
	public function __construct(){
		$this->db=Zend_Registry::get('db');
	}
	public function RoomOrder_update(){
		$data = array('num_1_0' => $this->_num_1_0,
				'num_1_1' => $this->_num_1_1,
				'num_2_0' => $this->_num_2_0,
				'num_0_2' => $this->_num_0_2);
		$where = "order_id = $this->_order_id and room_cat_id = $this->_room_cat_id";
		return $this->db->update($this->_table_name,$data,$where);
	}
	public function RoomOrder_listall(){
		$select = $this->db->select()
					->from(array("p"=>$this->_table_name))
					->join(array("p2"=>$this->_table_room_category),
							"p.room_cat_id = p2.id",
							array($this->_table_room_category."_room_cat_name"=>"room_cat_name"));
						
		$data = $this->db->fetchAll($select);
		return $data;
	}
	
	public function RoomOrder_getByOrder_And_Room_Cat($order_id,$room_cat_id){
		if($order_id && $room_cat_id){
			//$order_id=$this->db->quote($order_id,INTEGER);
			//$room_cat_id=$this->db->quote($room_cat_id,INTEGER);
			
			//$sql = $this->db->query("select * from room_order where order_id=$order_id and room_cat_id = $room_cat_id");
			//$data = $sql->fetchOne();
			$select = $this->db->select()
			->from(array("p"=>$this->_table_name))
			->join(array("p2"=>$this->_table_room_category),
					"p.room_cat_id = p2.id",
					array($this->_table_room_category."_room_cat_name"=>"room_cat_name"));
			
			$data = $this->db->fetchRow($select);
			if($data){
				$this->_order_id = $data['order_id'];
				$this->_room_cat_id = $data['room_cat_id'];
				
				$this->_num_1_0 = $data['num_1_0'];
				$this->_num_2_0 = $data['num_2_0'];
				$this->_num_1_1 = $data['num_1_1'];
				$this->_num_0_2 = $data['num_0_2'];
				
				
			}
			return $data;
		}
		return -1;
	}
	
	public function RoomOrder_getByOrder($order_id){
		if($order_id ){
			//$order_id=$this->db->quote($order_id,INTEGER);
			
				
			//$sql = $this->db->query("select * from room_order where order_id=$order_id ");
			
			//return  $sql->fetchAll();
			$select = $this->db->select()
					->from(array("p"=>$this->_table_name))
					->where("order_id =?",$order_id)
					->join(array("p2"=>$this->_table_room_category),
							"p.room_cat_id = p2.id",
							array($this->_table_room_category."_room_cat_name"=>"room_cat_name"));
			$data = $this->db->fetchAll($select);
			return $data;
			
		}
		return -1;
	}
	
	public function RoomOrder_getByRoom_Cat_Id($room_cat_id){
		if($room_cat_id ){
			
			//$room_cat_id=$this->db->quote($room_cat_id,INTEGER);
	
			//$sql = $this->db->query("select * from room_order where room_cat_id=$room_cat_id");
			//return  $sql->fetchAll();
			$select = $this->db->select()
			->from(array("p"=>$this->_table_name))
			->where("room_cat_id =?",$room_cat_id)
			->join(array("p2"=>$this->_table_room_category),
					"p.room_cat_id = p2.id",
					array($this->_table_room_category."_room_cat_name"=>"room_cat_name"));
			$data = $this->db->fetchAll($select);
			return $data;
		}
		return -1;
	}
	
	public function RoomOrder_CheckExist($order_id,$room_cat_id){
		if($order_id && $room_cat_id)
		{
			//$order_id=$this->db->quote($order_id,INTEGER);
			//$room_cat_id=$this->db->quote($room_cat_id,INTEGER);
				
			//$sql = $this->db->query("select * from room_order where order_id=$order_id and room_cat_id = $room_cat_id");
			//$data = $sql->fetchAll();
			$select = $this->db->select()
				->from(array("p"=>$this->_table_name))
				->where("p.room_cat_id =?",$room_cat_id)
				->where("p.order_id = ?",$order_id)
				->join(array("p2"=>$this->_table_room_category),
					"p.room_cat_id = p2.id",
					array($this->_table_room_category."_room_cat_name"=>"room_cat_name"));
			$data = $this->db->fetchAll($select);
			return count($data);
				
		
		}
		return -1;
		
		
	}
	
	public function RoomOrder_insert($order_id,$room_cat_id,$num_1_0 = 0,$num_1_1 = 0,$num_2_0 = 0,$num_0_2 = 0){
		
		if($order_id && $room_cat_id){
			
			//$order_id=$this->db->quote($order_id,INTEGER);
			//$room_cat_id=$this->db->quote($room_cat_id,INTEGER);
			//$num = $this->db->quote($num,INTEGER);
			
			if($this->RoomOrder_CheckExist($order_id, $room_cat_id) == 0){
				
				$data = array(
						'order_id'=>$order_id,
						'room_cat_id'=>$room_cat_id,
						'num_1_0' => $num_1_0,
						'num_2_0' => $num_2_0,
						'num_1_1' => $num_1_1,
						'num_0_2' => $num_0_2);
				
				return $this->db->insert($this->_table_name,$data);
			}
			
			
			
		}
		return -1;
		
	}
	public function RoomOrder_delete($order_id,$room_cat_id){
		if($order_id && $room_cat_id){
			$where = "order_id = ".$order_id." and room_cat_id = ".$room_cat_id;
			return $this->db->delete($this->_table_name,$where);
		}
		return 0;
	}
}

?>