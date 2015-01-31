<?php
class Admin_Model_Order extends Zend_Db{
protected $_table_name = "order";
	protected $_table_transport ="transport";
	protected $_table_tour_cat = "tour_category";
	protected $_table_customer = "customer_account";
	protected $_table_tour_intro ="tour_intro";
	protected $_id;
	protected $_customer_id;
	protected $_num_0_5_children;
	protected $_num_6_12_children;
	protected $_num_2_12_children;
	protected $_num_adults;
	protected $_num_foreigners;
	protected $_outward_transport;
	protected $_return_transport;
	protected $_tour_cat_id;
	protected $_order_date;
	protected $_status;
	protected $_surcharges;
	protected $_total;
	protected $_payment_id;
	protected $_tour_id;
	protected $_description;
	public function getId(){
		return $this->_id;
	}
	public function getCustomer_Id(){
		return $this->_customer_id;
	}
	public function getNum_0_5_Children(){
		return $this->_num_0_5_children;
	}
	public function getNum_2_12_Children(){
		return $this->_num_2_12_children;
	}
	public function getNum_6_12_Children(){
		return $this->_num_6_12_children;
	}
	public function getNum_Adults(){
		return $this->_num_adults;
	}
	public function getNum_Foreigners(){
		return $this->_num_foreigners ;
	}
	public function getOutward_Transport(){
		return $this->_outward_transport;
	}
	public function getReturn_Transport(){
		return $this->_return_transport;
	}
	public function getTour_Cat_Id(){
		return $this->_tour_cat_id;
	}
	public function getOrder_Date(){
		return $this->_order_date;
	}
	public function getStatus(){
		return $this->_status;
	}
	public function getSurcharges(){
		return $this->_surcharges;
	}
	public function getTotal(){
		return $this->_total;
	}
	public function getPayment_Id(){
		return $this->_payment_id;
	}
	public function getTour_Id(){
		return $this->_tour_id;
	}
	public function getDescription(){
		return $this->_description;
	}
	public function setDescription($description){
		$this->_description = $description;
	}
	public function setId($id){
		$this->_id = $id;
	}
	public function setTour_Id($tour_id){
		$this->_tour_id = $tour_id;
	}
	public function setPayment_Id($payment_id){
		$this->_payment_id = $payment_id;
	}
	public function setCustomer_Id($customer_id){
		//$customer_id = $this->db->quote($customer_id,INTEGER);
		$this->_customer_id = $customer_id;
	}
	public function setNum_0_5_Children($num_0_5_children){
		//$num_0_5_children = $this->db->quote($num_0_5_children,INTEGER);
		$this->_num_0_5_children = $num_0_5_children;
	}
	public function setNum_2_12_Children($num_2_12_children){
		//$num_2_12_children = $this->db->quote($num_2_12_children,INTEGER);
		$this->_num_2_12_children = $num_2_12_children;
	}
	public function setNum_6_12_Children($num_6_12_children){
		//$num_6_12_children = $this->db->quote($num_6_12_children,INTEGER);
		$this->_num_6_12_children = $num_6_12_children;
	}
	public function setNum_Adults($num_adults){
		//$num_adults = $this->db->quote($num_adults,INTEGER);
		$this->_num_adults  =$num_adults;
	}
	public function setNum_Foreigners($num_foreigners){
		//$num_foreigners = $this->db->quote($num_foreigners,INTEGER);
		$this->_num_foreigners =$num_foreigners ;
	}
	public function setOutward_Transport($outward_transport){
		//$outward_transport = $this->db->quote($outward_transport,INTEGER);
		$this->_outward_transport  =$outward_transport;
	}
	public function setReturn_Transport($return_transport){
		//$return_transport = $this->db->quote($return_transport,INTEGER);
		$this->_return_transport = $return_transport;
	}
	public function setTour_Cat_Id($tour_cat_id){
		//$tour_cat_id = $this->db->quote($tour_cat_id,INTEGER);
		$this->_tour_cat_id  = $tour_cat_id;
	}
	public function setOrder_Date($order_date){
		//$order_date = $this->db->quote($order_date,INTEGER);
		$this->_order_date  = $order_date;
	}
	public function setStatus($status){
		//$status = $this->db->quote($status,STRING);
		$this->_status = $status;
	}
	public function setSurcharges($surcharges){
		//$surcharges = $this->db->quote($surcharges,FLOAT);
		$this->_surcharges = $surcharges;
	}
	public function setTotal($total){
		//$total = $this->db->quote($total,FLOAT);
		$this->_total = $total;
	}
	public function __construct(){
		$this->db=Zend_Registry::get('db');
	}
	public function Order_update(){
		$where = "id = $this->_id";
		$data = array(
				'customer_id'=> $this->_customer_id,
				'num_0_5_children'=>$this->_num_0_5_children,
				'num_6_12_children' => $this->_num_6_12_children,
				'num_2_12_children' => $this->_num_2_12_children,
				'num_foreigners'=>$this->_num_foreigners,
				'num_adults'=>$this->_num_adults,
				'tour_cat_id'=>$this->_tour_cat_id,
				'order_date'=>$this->_order_date,
				'status' => $this->_status,
				'surcharges' =>$this->_surcharges,
				'total'=>$this->_total,
				'outward_transport'=>$this->_outward_transport,
				'return_transport' => $this->_return_transport,
				'payment_id' =>$this->_payment_id,
				'tour_id' =>$this->_tour_id,
				'description'=>$this->_description);
		//print_r($data);
		return $this->db->update($this->_table_name,$data,$where);
	}
	
	public function Order_listall(){
		$select = $this->db->select()
						->from(array("p"=>$this->_table_name))
						
						->join(array("p1"=>$this->_table_tour_cat),
								"p.tour_cat_id = p1.id",
								array($this->_table_tour_cat."_name"=>"tour_cat_name"))
						->join(array("p2"=>$this->_table_transport),
								"p.outward_transport = p2.id",
								array($this->_table_transport."_outward"=>"name"))
						->join(array("p3"=>$this->_table_transport),
								"p.return_transport = p3.id",
								array($this->_table_transport."_return"=>"name"))
						->join(array("p4"=>$this->_table_customer),
								"p.customer_id = p4.id",
								array($this->_table_customer."_username"=>"username"))
										->join(array("p5"=>$this->_table_tour_intro),
												"p.tour_id = p5.id",
												array($this->_table_tour_intro."_name"=>"name"
												))
						;
		$data = $this->db->fetchAll($select);
		return $data;
	}
	public function Order_getById($id){
		
		if($id){
			$select = $this->db->select()
						->from(array("p"=>$this->_table_name))
						->where("p.id = ?",$id )
						->join(array("p1"=>$this->_table_tour_cat),
								"p.tour_cat_id = p1.id",
								array($this->_table_tour_cat."_name"=>"tour_cat_name"))
						//->join(array("p2"=>$this->_table_transport),
						//		"p.outward_transport = p2.id",
						//		array($this->_table_transport."_outward"=>"name"))
						//->join(array("p3"=>$this->_table_transport),
						//		"p.return_transport = p3.id",
						//		array($this->_table_transport."_return"=>"name"))
						->join(array("p4"=>$this->_table_customer),
								"p.customer_id = p4.id",
								array($this->_table_customer."_username"=>"username"))
										->join(array("p5"=>$this->_table_tour_intro),
												"p.tour_id = p5.id",
												array($this->_table_tour_intro."_name"=>"name"
												))
						;
						
			$data = $this->db->fetchRow($select);
			
			if($data){
				 $this->_id = $data['id'];
				 $this->_customer_id = $data['customer_id'] ;
				 $this->_num_0_5_children = $data['num_0_5_children'];
				 $this->_num_6_12_children = $data['num_6_12_children'];
				 $this->_num_2_12_children = $data['num_2_12_children'];
				 $this->_num_adults = $data['num_adults'];
				 $this->_num_foreigners = $data['num_foreigners'];
				 $this->_outward_transport = $data['outward_transport'];
				 $this->_return_transport = $data['return_transport'];
				 $this->_tour_cat_id = $data['tour_cat_id'];
				 $this->_order_date = $data['order_date'];
				 $this->_status = $data['status'];
				 $this->_surcharges = $data['surcharges'];
				 $this->_total = $data['total'];
				 $this->_tour_id = $data['tour_id'];
				 $this->_payment_id = $data['payment_id'];
				 $this->_description = $data['description'];
				 
			}
			return $data;
		}
		return -1;
	}
	public function Order_getByStatus($status){
		if($status){
		
			$select = $this->db->select()
						->from(array("p"=>$this->_table_name))
						->where("p.status = ?",$status )
						->join(array("p1"=>$this->_table_tour_cat),
								"p.tour_cat_id = p1.id",
								array($this->_table_tour_cat."_name"=>"tour_cat_name"))
						->join(array("p2"=>$this->_table_transport),
								"p.outward_transport = p2.id",
								array($this->_table_transport."_outward"=>"name"))
						->join(array("p3"=>$this->_table_transport),
								"p.return_transport = p3.id",
								array($this->_table_transport."_return"=>"name"))
						->join(array("p4"=>$this->_table_customer),
								"p.customer_id = p4.id",
								array($this->_table_customer."_username"=>"username"))
										->join(array("p5"=>$this->_table_tour_intro),
												"p.tour_id = p5.id",
												array($this->_table_tour_intro."_name"=>"name"
												))
						;
						
			$data = $this->db->fetchAll($select);
			return $data;
		}
		return -1;
		
	}
	public function Order_getByCustomerId($customer_id){
		if($customer_id){
	
			$select = $this->db->select()
			->from(array("p"=>$this->_table_name))
			->where("p.customer_id = ?",$customer_id )
			->join(array("p1"=>$this->_table_tour_cat),
					"p.tour_cat_id = p1.id",
					array($this->_table_tour_cat."_name"=>"tour_cat_name"))
					->join(array("p2"=>$this->_table_transport),
							"p.outward_transport = p2.id",
							array($this->_table_transport."_outward"=>"name"))
							->join(array("p3"=>$this->_table_transport),
									"p.return_transport = p3.id",
									array($this->_table_transport."_return"=>"name"))
									->join(array("p4"=>$this->_table_customer),
											"p.customer_id = p4.id",
											array($this->_table_customer."_username"=>"username"))
													->join(array("p5"=>$this->_table_tour_intro),
															"p.tour_id = p5.id",
															array($this->_table_tour_intro."_name"=>"name"
																	));
			$data = $this->db->fetchAll($select);
			return $data;
		}
		return -1;
	}
	public function Order_insert($customer_id,$num_0_5_children = 0 ,$num_6_12_children = 0,$num_2_12_children = 0,$num_foreigners =0 ,$num_adults = 0,
			$tour_cat_id,$order_date,$status = "None",$surcharges = 0,$total = 0,$outward_transport = 0 ,$return_transport = 0,$tour_id){
		
		if($customer_id && $tour_cat_id && $order_date ){
			//$customer_id = $this->db->quote($customer_id,INTEGER);
			//$num_0_5_children = $this->db->quote($customer_id,INTEGER);
			//$num_6_12_children= $this->db->quote($customer_id,INTEGER);
			//$num_2_12_children= $this->db->quote($customer_id,INTEGER);
			//$num_foreigners= $this->db->quote($customer_id,INTEGER);
			//$num_adults= $this->db->quote($customer_id,INTEGER);		
			//$tour_cat_id = $this->db->quote($customer_id,INTEGER);
			//$order_date= $this->db->quote($customer_id,INTEGER);
			//$status= $this->db->quote($customer_id,STRING);
			//$surcharges= $this->db->quote($customer_id,FLOAT);
			//$total= $this->db->quote($customer_id,FLOAT);
			//$outward_transport= $this->db->quote($customer_id,INTEGER);
			//$return_transport= $this->db->quote($customer_id,INTEGER);
			
			$data = array(
					'customer_id'=> $customer_id,
					'num_0_5_children'=>$num_0_5_children,
					'num_6_12_children' => $num_6_12_children,
					'num_2_12_children' => $num_2_12_children,
					'num_foreigners'=>$num_foreigners,
					'num_adults'=>$num_adults,
					'tour_cat_id'=>$tour_cat_id,
					'order_date'=>$order_date,
					'status' => $status,
					'surcharges' =>$surcharges,
					'total'=>$total,
					'outward_transport'=>$outward_transport,
					'return_transport' => $return_transport,
					'tour_id'=>$tour_id);
			
			$result =  $this->db->insert('order',$data);
                        if ($result>0){
                            return $this->db->lastInsertId();
                        } else {
                            return $result;
                        }
		}
		return 0;
		
	}
	public function Order_delete($id){
		if($id){
			$where = "id = $id";
			return $this->db->delete($this->_table_name,$where);	
		}
		return 0;
	}
}

?>