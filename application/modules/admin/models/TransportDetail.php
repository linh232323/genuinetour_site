<?php
class Admin_Model_TransportDetail extends Zend_Db {
protected $_table_name="transport_detail";
	protected $_table_tour_intro = "tour_intro";
	protected $_table_transport = "transport";
	protected $_id;
	protected $_transport_id;
	protected $_price;
	protected $_price_description;
	protected $_tour_id;

	
	public function getId(){
		return $this->_id;
	}
	public function getTransport_Id(){
		return $this->_transport_id;
	}
	public function getPrice(){
		return $this->_price;
	}
	public function getPrice_Description(){
		return $this->_price_description;
	}
	public function getTour_Id(){
		return $this->_tour_id;
	}

	
	public function setId($id){
		//$id = $this->db->quote($id,INTEGER);
		$this->_id = $id;
	}
	public function setTransport_Id($transport_id){
		//$transport_id = $this->db->quote($transport_id,INTEGER);
		$this->_transport_id = $transport_id;
	}
	public function setPrice($price){
		//$price = $this->db->quote($price,FLOAT);
		$this->_price = $price;
	}
	public function setPrice_Description($price_description){
		$this->_price_description= $price_description;
	}
	public function setTour_Id($tour_id){
		//$tour_id = $this->db->quote($tour_id,INTEGER);
		$this->_tour_id = $tour_id;
	}
	
	
	
	public function __construct(){
		$this->db=Zend_Registry::get('db');
	}
	public function TransportDetail_update(){
		$where = "id = $this->_id";
		$data = array(
				
				'transport_id' => $this->_transport_id,
				'price'=>$this->_price,
				'price_description'=>$this->_price_description,
				'tour_id'=>$this->_tour_id
		);
		return $this->db->update($this->_table_name,$data,$where);
	}
	public function TransportDetail_listall(){
			$select = $this->db->select()
					->from(array("p"=>$this->_table_name))
					
					->join(array("p2"=>$this->_table_tour_intro),
							"p.tour_id = p2.id",
							array($this->_table_tour_intro."_name"=>"name_vi"))
					->join(array("p3" => $this->_table_transport),
							"p.transport_id = p3.id",
							array($this->_table_transport."_name"=>"name_vi"));
			$data = $this->db->fetchAll($select);
			return $data;	
	}
	
	public function TransportDetail_getById($id){
		if($id){
			$select = $this->db->select()
					->from(array("p"=>$this->_table_name))
					->where("p.id = ?",$id)
					->join(array("p2"=>$this->_table_tour_intro),
							"p.tour_id = p2.id",
							array($this->_table_tour_intro."_name"=>"name"))
					->join(array("p3" => $this->_table_transport),
							"p.transport_id = p3.id",
							array($this->_table_transport."_name"=>"name",
									$this->_table_transport."_name_en"=>"name_en"));
			$data = $this->db->fetchRow($select);
			if($data){
				$this->_id = $data['id'];
				$this->_tour_id = $data['tour_id'];
				$this->_transport_id = $data['transport_id'];
				$this->_price = $data['price'];
				$this->_price_description = $data['price_description'];
			}		
			return $data;
			
		}
		return -1;
	}
	public function TransportDetail_getByTourId_And_TransportId($tour_id,$transport_id){
		if($tour_id && $transport_id){
			$select = $this->db->select()
			->from(array("p"=>$this->_table_name))
			->where("p.transport_id = ?",$transport_id)
			->wher("p.tour_id = ?",$tour_id)
			->join(array("p2"=>$this->_table_tour_intro),
					"p.tour_id = p2.id",
					array($this->_table_tour_intro."_name"=>"name"))
					->join(array("p3" => $this->_table_transport),
							"p.transport_id = p3.id",
							array($this->_table_transport."_name"=>"name",
									$this->_table_transport."_name_en"=>"name_en"));
					$data = $this->db->fetchAll($select);
					if($data){
						$this->_id = $data['id'];
						$this->_tour_id = $data['tour_id'];
						$this->_transport_id = $data['transport_id'];
						$this->_price = $data['price'];
						$this->_price_description = $data['price_description'];
					}
					return $data;
						
		}
		return -1;
	}
	
	public function TransportDetail_getByTourId($tour_id){
		if($tour_id){
			$select = $this->db->select()
					->from(array("p"=>$this->_table_name))
					->where("p.tour_id = ?",$tour_id)
					->join(array("p2"=>$this->_table_tour_intro),
							"p.tour_id = p2.id",
							array($this->_table_tour_intro."_name"=>"name_vi"))
					->join(array("p3" => $this->_table_transport),
							"p.transport_id = p3.id",
							array($this->_table_transport."_name"=>"name_vi",
									$this->_table_transport."_name_en"=>"name_en"));
			$data = $this->db->fetchAll($select);		
			return $data;
		}
		return -1;
	}
	public function TransportDetail_getByTransportId($transport_id){
		if($transport_id){
			$select = $this->db->select()
			->from(array("p"=>$this->_table_name))
			->where("p.transport_id = ?",$transport_id)
			->join(array("p2"=>$this->_table_tour_intro),
					"p.tour_id = p2.id",
					array($this->_table_tour_intro."_name"=>"name"))
					->join(array("p3" => $this->_table_transport),
							"p.transport_id = p3.id",
							array($this->_table_transport."_name"=>"name",
									$this->_table_transport."_name_en"=>"name_en",));
					$data = $this->db->fetchAll($select);
					return $data;
		}
		return -1;
	}
	
	public function TransportDetail_insert($transport_id,$price = 0,$price_description = "",$tour_id){
	
		//$transport_id = $this->db->quote($transport_id,INTEGER);
		//$price = $this->db->quote($price,FLOAT);
		//$price_description = $this->db->quote($price_description,STRING);
		//$tour_id = $this->db->quote($tour_id,INTEGER);
		
	
		if($transport_id  && $tour_id){
			$data = array(
					'transport_id' => $transport_id,
					'price' => $price,
					'price_description'=>$price_description,
					'tour_id'=>$tour_id
			);
			return $this->db->insert($this->_table_name,$data);
		}
		return 0;
	}
	
	public function TransportDetail_insertList($data){
		if($data){
			foreach($data as $value){
				$this->insertTraveller($data['transport_id'],
						$data['price'],
						$data['price_description'],
						$data['tour_id']);
			}
		}
		
	}
	public function TransportDetail_delete($id){
		if($id){
			$where = "id = $id";
			return $this->db->delete($this->_table_name,$where);
		}
		return 0;
	}
}

?>