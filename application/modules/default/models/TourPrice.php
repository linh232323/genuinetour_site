<?php
class Default_Model_TourPrice extends Zend_Db{
protected $_table_name="tour_price";
	protected $_table_tour_intro="tour_intro";
	protected $_table_tour_category="tour_category";
	protected $_tour_id;
	protected $_tour_cat_id;
	protected $_price;
	protected $_surcharge;
	protected $_foreign_charge;
	
	public function getTour_Id(){
		return $this->_tour_id;
	}
	public function getTour_Cat_Id(){
		return $this->_tour_cat_id;
	}
	public function getPrice(){
		return $this->_price;
	}
	public function getForeign_Charge(){
		return $this->_foreign_charge;
	}
	public function getSurcharge(){
		return $this->_surcharge;
	}
	public function setTour_Id($tour_id){
		//$tour_id = $this->db->quote($tour_id,INTEGER);
		$this->_tour_id = $tour_id;
	}
	public function setTour_Cat_Id( $tour_cat_id){
		//$tour_cat_id = $this->db->quote($tour_cat_id,INTEGER);
		$this->_tour_cat_id = $tour_cat_id;
	}
	public function setPrice($price){
		//$price = $this->db->quote($price,FLOAT);
		$this->_price = $price;
	}
	public function setForeign_Charge($foreign_charge){
		//$foreign_charge = $this->db->quote($foreign_charge,FLOAT);
		$this->_foreign_charge = $foreign_charge;
	}
	public function setSurcharge($surcharge){
		$this->_surcharge = $surcharge;
	}
	
	
	public function __construct(){
		$this->db=Zend_Registry::get('db');
	}
	public function TourPrice_update(){
		$where = "tour_id = $this->_tour_id and tour_cat_id = $this->_tour_cat_id";
		$data = array(
				
				'price' => $this->_price,
				'surcharge' => $this->_surcharge,
				'foreign_charge' => $this->_foreign_charge);
		
		return $this->db->update($this->_table_name,$data,$where);
	}
	public function TourPrice_listall(){
		$select = $this->db->select()
					->from(array("p"=>$this->_table_name))
					->join(array("p2"=>$this->_table_tour_intro),
							"p.tour_id = p2.id",
							array($this->_table_tour_intro."_name"=>"name",
									$this->_table_tour_intro."_name_en"=>"name_en"))
					->join(array("p3"=>$this->_table_tour_category),
							"p.tour_cat_id = p3.id",
							array($this->_table_tour_category."_tour_cat_name"=>"tour_cat_name",
									$this->_table_tour_category."_tour_cat_name_en"=>"tour_cat_name_en"));
		$data = $this->db->fetchAll($select);
		return $data;
	}
	
	public function TourPrice_getByTour_Id_And_Tour_Cat_ID($tour_id,$tour_cat_id){
		if($tour_id && $tour_cat_id){
			//$tour_id= $this->db->quote($tour_id,'INTEGER');
			//$tour_cat_id = $this->db->quote($tour_cat_id,'INTEGER');
			//$this->db->setFetchMode(Zend_Db::FETCH_ASSOC);
			//$data = $this->db->fetchRow("select * from tour_price where tour_id = $tour_id and tour_cat_id = $tour_cat_id");
			$select = $this->db->select()
						->from(array("p"=>$this->_table_name))
						->where("tour_id = ?",$tour_id)
						->where("tour_cat_id = ?",$tour_cat_id)
						->join(array("p2"=>$this->_table_tour_intro),
								"p.tour_id = p2.id",
								array($this->_table_tour_intro."_name"=>"name",
										$this->_table_tour_intro."_name_en"=>"name_en"))
										->join(array("p3"=>$this->_table_tour_category),
												"p.tour_cat_id = p3.id",
												array($this->_table_tour_category."_tour_cat_name"=>"tour_cat_name",
														$this->_table_tour_category."_tour_cat_name_en"=>"tour_cat_name_en"));
			$data = $this->db->fetchRow($select);
							
			if($data){
				$this->_tour_cat_id = $data['tour_cat_id'];
				$this->_foreign_charge = $data['foreign_charge'];
				$this->_price = $data['price'];
				$this->_surcharge = $data['surcharge'];
				$this->_tour_id = $data['tour_id'];
				
				
			}
			return $data;
		}
		return -1;		
	}
	
	public function TourPrice_getByTour($tour_id){
		if($tour_id ){
			$select = $this->db->select()
			->from(array("p"=>$this->_table_name))
			->where("tour_id = ?",$tour_id)
			
			->join(array("p2"=>$this->_table_tour_intro),
					"p.tour_id = p2.id",
					array($this->_table_tour_intro."_name"=>"name",
							$this->_table_tour_intro."_name_en"=>"name_en"))
							->join(array("p3"=>$this->_table_tour_category),
									"p.tour_cat_id = p3.id",
									array($this->_table_tour_category."_name"=>"tour_cat_name",
											$this->_table_tour_category."_name_en"=>"tour_cat_name_en"));
							$data = $this->db->fetchAll($select);
			//$tour_id= $this->db->quote($tour_id,'INTEGER');
			
			
			//$sql = $this->db->query("select * from tour_price where tour_id = $tour_id ");
			
			return $data;
			
		}		
		return -1;
	}
	
	public function TourPrice_getBy_Tour_Cat_ID($tour_cat_id){
		if($tour_cat_id){
		
			//$tour_cat_id = $this->db->quote($tour_cat_id,'INTEGER');
				
			//$sql = $this->db->query("select * from tour_price where tour_cat_id = $tour_cat_id");
			$select = $this->db->select()
			->from(array("p"=>$this->_table_name))
			
			->where("tour_cat_id = ?",$tour_cat_id)
			->join(array("p2"=>$this->_table_tour_intro),
					"p.tour_id = p2.id",
					array($this->_table_tour_intro."_name"=>"name",
							$this->_table_tour_intro."_name_en"=>"name_en"))
							->join(array("p3"=>$this->_table_tour_category),
									"p.tour_cat_id = p3.id",
									array($this->_table_tour_category."_name"=>"tour_cat_name",
											$this->_table_tour_category."_name_en"=>"tour_cat_name_en"));
			$data = $this->db->fetchAll($select);
			return $data;
			
		}
		return -1;
	}
	
	public function TourPrice_checkExist($tour_id,$tour_cat_id){
		if($tour_id && $tour_cat_id){
			//$tour_id= $this->db->quote($tour_id,INTEGER);
			//$tour_cat_id = $this->db->quote($tour_cat_id,INTEGER);
				
			//$sql = $this->db->query("select * from tour_price where tour_id = $tour_id and tour_cat_id = $tour_cat_id");
			//$data = $sql->fetchAll();	
			$select = $this->db->select()
			->from(array("p"=>$this->_table_name))
			->where("tour_id = ?",$tour_id)
			->where("tour_cat_id = ?",$tour_cat_id)
			->join(array("p2"=>$this->_table_tour_intro),
					"p.tour_id = p2.id",
					array($this->_table_tour_intro."_name"=>"name",
							$this->_table_tour_intro."_name_en"=>"name_en"))
							->join(array("p3"=>$this->_table_tour_category),
									"p.tour_cat_id = p3.id",
									array($this->_table_tour_category."_name"=>"tour_cat_name",
											$this->_table_tour_category."_name_en"=>"tour_cat_name_en"));
			$data = $this->db->fetchAll($select);
			return count($data);
		}
		return -1;
	}
	
	public function TourPrice_insert($tour_id,$tour_cat_id,$price =0,$surcharge = 0,$foreign_charge =0){
		if($tour_id&&$tour_cat_id){
			//$tour_id = $this->db->quote($tour_id,INTEGER);
			//$tour_cat_id = $this->db->quote($tour_cat_id,INTEGER);
			//$price = $this->db->quote($price,FLOAT);
			//$surcharge = $this->db->quote($surcharge,FLOAT);
			//$foreign_charge = $this->db->quote($foreign_charge,FLOAT);
			
			if($this->TourPrice_checkExist($tour_id,$tour_cat_id) == 0){
				$data = array(
						'tour_id' =>$tour_id,
						'tour_cat_id' => $tour_cat_id,
						'price' => $price,
						'surcharge' => $surcharge,
						'foreign_charge' => $foreign_charge);
				return $this->db->insert($this->_table_name,$data);
			}
		}
		return 0;
	}
	public function TourPrice_delete($tour_id,$tour_cat_id){
		if($tour_id && $tour_cat_id){
			$where = "tour_id = $tour_id and tour_cat_id = $tour_cat_id";
			return $this->db->delete($this->_table_name,$where);
		}
		return 0;
	}
}

?>