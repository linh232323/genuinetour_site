<?php
class Admin_Model_TourCategory extends Zend_Db{
	protected $_table_name = "tour_category";
	protected $_id;
	protected $_tour_cat_name;
	protected $_tour_cat_name_en;
	
	public function getId(){
		return $this->_id;
	}
	public function getTour_Cat_Name(){
		return $this->_tour_cat_name;
	}
	public function getTour_Cat_Name_En(){
		return $this->_tour_cat_name_en;
	}
	
	public function setId($id){
		$this->_id = $id;
	}
	public function setTour_Cat_Name($tour_cat_name){
		$this->_tour_cat_name = $tour_cat_name;
	}
	public function setTour_Cat_Name_En($tour_cat_name_en){
		$this->_tour_cat_name_en = $tour_cat_name_en;
	}	

	public function __construct(){
		$this->db=Zend_Registry::get('db');
	}
	public function  TourCategory_update(){
		$where = "id = $this->_id";
		$data = array(
				'tour_cat_name'=> $this->_tour_cat_name,
				'tour_cat_name_en' => $this->_tour_cat_name_en);
                print_r($data);
		return $this->db->update($this->_table_name,$data,$where);
	}
	public function TourCategory_listall(){
		//$sql = $this->db->query("select * from tour_category");
		$select = $this->db->select()
				->from($this->_table_name);
				
			
		$data = $this->db->fetchAll($select);
		return $data;
	}
	
	public function TourCategory_checkExist($tour_cat_name,$tour_cat_name_en){
		if($tour_cat_name && $tour_cat_name_en)
		{
			$select = $this->db->select()
				->from($this->_table_name)
				->where("tour_cat_name = ?",$tour_cat_name)
				->orwhere("tour_cat_name_en = ?",$tour_cat_name_en);
			$data = $this->db->fetchAll($select);
			return count($data);
		}
		return -1;
	}
	
	public function TourCategory_insert($tour_cat_name,$tour_cat_name_en){
		if($tour_cat_name &&$tour_cat_name_en){
			//$tour_cat_name =  $this->db->quote($tour_cat_name,STRING);
			//$tour_cat_name_en = $this->db->quote($tour_cat_name_en,STRING);
			if($this->TourCategory_checkExist($tour_cat_name,$tour_cat_name_en) == 0){
				$data = array(
						'tour_cat_name'=> $tour_cat_name,
						'tour_cat_name_en' => $tour_cat_name_en);
	
				return $this->db->insert($this->_table_name,$data);
				
			}
		}
		return 0;
	
	
	}
	public function TourCategory_getById($id){
		if($id){
			//$id = $this->db->quote($id,'INTEGER');
			//$this->db->setFetchMode(Zend_Db::FETCH_ASSOC);
			//$data = $this->db->fetchRow("select * from tour_category where id=$id");
			$select = $this->db->select()
					->from($this->_table_name)
					->where("id = ?",$id);
			
			$data = $this->db->fetchRow($select);
			if($data){
				$this->_id = $data['id'];
				$this->_tour_cat_name = $data['tour_cat_name_vi'];
				$this->_tour_cat_name_en = $data['tour_cat_name_en'];
			}
			return $data;
		}
		return -1;
	
	}
	public function TourCategory_delete($id){
		if($id){
			$where = "id = $id";
			return $this->db->delete($this->_table_name,$where);
		}
		return 0;
	}	
}

?>