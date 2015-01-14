<?php
class Admin_Model_TourIntro extends Zend_Db{
protected $_table_name ="tour_intro";
	protected $_table_transport ="transport";
	protected $_table_tour_section = "tour_section";
	protected $_id;
	protected $_code;
	public $lastId;
	
	protected $_outward_transport;
	protected $_return_transport;
	protected $_post_intro;
	protected $_post_intro_en;
	protected $_program;
	protected $_program_en;
	protected $_name;
	protected $_name_en;
	protected $_during;
	protected $_during_en;
	protected $_appendix;
	protected $_appendix_en;
	protected $_tour_section_id;
	protected $_thumbnail_url;
	protected $_price;
//	protected $_post;// Thông tin Post
//	protected $_post_en; // Thông tin Post tiếng Anh
	
//	public function getPost(){
//		return $this->_post;
//	}
//	public function getPostEn(){
//		return $this->_post_en;
//	}
	
	public function getId(){
		return $this->_id;
	}
	public function getReturn_Transport(){
		return $this->_return_transport;
	}
	public function getOutward_Transport(){
		return $this->_outward_transport;
	}
	public function getPost_Intro(){
		return		$this->_Post_Intro;
	}
	public function getPost_Intro_En(){
		return		$this->_Post_Intro_en;
	}
	public function getDuring(){
		return		$this->_during;
	}
	public function getDuring_En(){
		return		$this->_during_en;
	}
	public function getProgram(){
		return		$this->_program;
	}
	public function getProgram_En(){
		return		$this->_program_en;
	}
	public function getName(){
		return		$this->_name;
	}
	public function getName_En(){
		return		$this->_name_en;
	}
	public function get_Appendix(){
		return		$this->_appendix;
	}
	public function get_Appendix_En(){
		return		$this->_appendix_en;
	}
	public function get_Tour_Section_Id(){
		return 		$this->_tour_section_id;
	}
	public function get_Thumbnail_Url(){
		return $this->_thumbnail_url;
	}
	public function getPrice(){
		return $this->_price;
	}
	public function getCode(){
		return $this->_code;
	}
	public function setId($id){
	//	$id = $this->db->quote($id,INTEGER);
		 $this->_id = $id;
	}
	public function setReturn_Transport($return_transport){
	//	$return_transport = $this->db->quote($return_transport,INTEGER);
		 $this->_return_transport = $return_transport;
	}
	public function setOutward_Transport($outward_transport){
	//	$outward_transport = $this->db->quote($outward_transport,INTEGER);
		 $this->_outward_transport = $outward_transport;
	}
	public function setPost_Intro($Post_Intro){
	//	$Post_Intro = $this->db->quote($Post_Intro,INTEGER);
		$this->_post_intro = $Post_Intro;
	}
	public function setPost_Intro_En($Post_Intro_en){
	//	$Post_Intro_en = $this->db->quote($Post_Intro_en,INTEGER);
		$this->_post_intro_en = $Post_Intro_en;
	}
	public function setDuring($during){
	//	$during = $this->db->quote($during,STRING);
		$this->_during = $during;
	}
	public function setDuring_En($during_en){
	//	$during_en = $this->db->quote($during_en,STRING);
		$this->_during_en = $during_en;
	}
	public function setProgram($program){
	//	$program = $this->db->quote($program,STRING);
		$this->_program =$program ;
	}
	public function setProgram_En($program_en){
	//	$program_en = $this->db->quote($program_en,STRING);
		$this->_program_en = $program_en;
	}
	public function setName($name){
	//	$name = $this->db->quote($name,STRING);
		$this->_name = $name;
	}
	public function setName_En($name_en){
	//	$name_en = $this->db->quote($name_en,STRING);
		$this->_name_en = $name_en;
	}
	public function setAppendix($appendix){
		$this->_appendix = $appendix;
	}
	public function setAppendix_En($appendix_en){
		$this->_appendix_en = $appendix_en;
	}
	public function setTour_Section_Id($tour_section_id){
		$this->_tour_section_id = $tour_section_id;
	}
	public function setThumnail_Url($thumnail_url){
		$this->_thumbnail_url = $thumnail_url;
	}
	public function setPrice($price){
		$this->_price = $price;
	}
	public function setCode($code){
		$this->_code = $code;
	}
	public function __construct(){
		$this->db=Zend_Registry::get('db');
	}
	public function TourIntro_getLastId(){
		$this->db->lastInsertId($this->_table_name,"id");
	}
	public function TourIntro_search($tour_name,$outward_transport,$return_transport,$during){
		
		if($outward_transport == 0){
			$query_outward = "1 = 1";
		}else{
			$query_outward ="p.outward_transport = ?";
		}
		if($return_transport == 0){
			$query_return = "1 = 1";
		}else{
			$query_return = "p.return_transport = ?"; 
		}
		if($during == 0){
			$query_during = "1 = 1";
		}else{
			$query_during = "p.during = ?";
		}
		
		$select = $this->db->select()
			->from(array("p"=>$this->_table_name))
			->where("p.name LIKE ?","%".$tour_name."%")
			->where($query_outward,$outward_transport)
			->where($query_return,$return_transport)
			->where($query_during,$during)
			->join(array("p2"=>$this->_table_tour_section),
					"p.tour_section_id = p2.id",
					array($this->_table_tour_section."_name"=>"name"))
					->join(array("p3"=>$this->_table_transport),
							"p.outward_transport = p3.id",
							array($this->_table_transport."_outward_name"=>"name",
									$this->_table_transport."_outward_name_en"=>"name_en"))
							->join(array("p4"=>$this->_table_transport),
									"p.return_transport = p4.id",
									array($this->_table_transport."_return_name"=>"name",
											$this->_table_transport."_return_name_en"=>"name_en"));
							$data = $this->db->fetchAll($select);
		return $data;
	}
	
	public function TourIntro_update(){
	
		$where = "id = $this->_id";
		$data = array(
				'outward_transport' =>$this->_outward_transport,
				'return_transport' => $this->_return_transport,
				'post_intro' => $this->_post_intro,
				'post_intro_en' => $this->_post_intro_en,
				'program' => $this->_program,
				'program_en' => $this->_program_en,
				'name' => $this->_name,
				'name_en' => $this->_name_en,
				'during' => $this->_during,
				'during_en' => $this->_during_en,
				'appendix' => $this->_appendix,
				'appendix_en' => $this->_appendix_en,
				'tour_section_id' => $this->_tour_section_id,
				'thumbnail_url'=>$this->_thumbnail_url,
				'price'=>$this->_price
				);
		
	
		return $this->db->update("tour_intro",$data,$where);
	}
	public function TourIntro_listall(){
		$select = $this->db->select()
						->from(array("p"=>$this->_table_name))
						->order('p.id DESC')
						->join(array("p2"=>$this->_table_tour_section),
							"p.tour_section_id = p2.id",
							array($this->_table_tour_section."_name"=>"name"))
						->join(array("p3"=>$this->_table_transport),
								"p.outward_transport = p3.id",
								array($this->_table_transport."_outward_name"=>"name",
										$this->_table_transport."_outward_name_en"=>"name_en"))
						->join(array("p4"=>$this->_table_transport),
								"p.return_transport = p4.id",
								array($this->_table_transport."_return_name"=>"name",
										$this->_table_transport."_return_name_en"=>"name_en"));
		$data = $this->db->fetchAll($select);
		return $data;
	}
	
	public function TourIntro_getById($id){
		if($id){
			$select = $this->db->select()
						
						->from(array("p"=>$this->_table_name))
						->where("p.id = ?",$id)
						->order('p.id DESC')
						->join(array("p2"=>$this->_table_tour_section),
							"p.tour_section_id = p2.id",
							array($this->_table_tour_section."_name"=>"name"))
						->join(array("p3"=>$this->_table_transport),
								"p.outward_transport = p3.id",
								array($this->_table_transport."_outward_name"=>"name",
										$this->_table_transport."_outward_name_en"=>"name_en"))
						->join(array("p4"=>$this->_table_transport),
								"p.return_transport = p4.id",
								array($this->_table_transport."_return_name"=>"name",
										$this->_table_transport."_return_name_en"=>"name_en"));
			$data = $this->db->fetchRow($select);
			if($data){
				$this->_id = $data['id'];
				$this->_outward_transport = $data['outward_transport'];
				$this->_return_transport = $data['return_transport'];
				$this->_post_intro = $data['post_intro'];
				$this->_post_intro_en = $data['post_intro_en'];
				$this->_program = $data['program'];
				$this->_program_en = $data['program_en'];
				$this->_name = $data['name'];
				$this->_name_en = $data['name_en'];
				$this->_during = $data['during'];
				$this->_during_en = $data['during_en'];
				$this->_appendix = $data['appendix'];
				$this->_appendix_en = $data['appendix'];
				$this->_tour_section_id = $data['tour_section_id'];
				$this->_thumbnail_url = $data['thumbnail_url'];
				$this->_price	 = $data['price'];
				$this->_code = $data['code'];
				
			//	$post = new Admin_Model_Post();
				
			//	$this->_post = $post->Post_getById($_post_intro);
			//	$this->_post_en = $post->Post_getById($_post_intro_en);
			}
			return $data;
			
		}
		return -1;
		
	}
	function getTours_Section($data,$parent=0,&$d){
		
		foreach($data as $k => $item)
		{
			if($item['parent_id'] == $parent){
				$d[] = $item['id'];
				unset($data[$k]);
				$this->getTours_Section($data,$item['id'], $d);
			}
		}
		
		return $d;
	}
	public function TourIntro_getByTourSection($tour_section_id,$query=true,$limit = 0){
	{
			if($tour_section_id != 0){
				$tour_section = new Default_Model_TourSection();
				$temp = $tour_section->TourSection_listall(); 
				
				$items = array($tour_section_id);
				$this->getTours_Section($temp,$tour_section_id,$items);		
			
			}
			$select = $this->db->select()			
					->from(array("p"=>$this->_table_name))
					->limit($limit,0);
			if($tour_section_id != 0)
				$select->where("p.tour_section_id in (?)",$items);
			$select->order('p.id DESC')
			->join(array("p2"=>$this->_table_tour_section),
					"p.tour_section_id = p2.id",
					array($this->_table_tour_section."_name"=>"name"))
					->join(array("p3"=>$this->_table_transport),
							"p.outward_transport = p3.id",
							array($this->_table_transport."_outward_name"=>"name",
									$this->_table_transport."_outward_name_en"=>"name_en"))
							->join(array("p4"=>$this->_table_transport),
									"p.return_transport = p4.id",
									array($this->_table_transport."_return_name"=>"name",
											$this->_table_transport."_return_name_en"=>"name_en"));
			if(!$query){									
				$data = $this->db->fetchAll($select);
			}
			else{
				$data = $select;
			}								
			return $data;		
		}
	}
	
	public function TourIntro_insert($outward_transport = 0,
			$return_transport = 0,
			$Post_Intro ,
			$Post_Intro_en="",
			$program,$program_en ="",
			$name,$name_en ="",
			$during ="",
			$during_en ="",
			$appendix ="",
			$appendix_en ="",
			$tour_section_id = 1,
			$thumbnail_url = "",$price=0,$code){
			{
		
			
			$data = array(
					'outward_transport' =>$outward_transport,
					'return_transport' => $return_transport,
					'post_intro' => $Post_Intro,
					'post_intro_en' => $Post_Intro_en,
					'program' => $program,
					'program_en' => $program_en,
					'name' => $name,
					'name_en' => $name_en,
					'during' => $during,
					'during_en' => $during_en,
					'appendix' =>$appendix,
					'appendix_en' =>$appendix_en,
					'tour_section_id' =>$tour_section_id,
					'thumbnail_url'=>$thumbnail_url,
					'price'=>$price,
					'code'=>$code);
			 $result =  $this->db->insert($this->_table_name,$data);
			 $this->lastId = $this->db->lastInsertId();
			 return $result;
		}
	
		
	}
	public function TourIntro_delete($id){
		if($id){
			$where = "id = $id";
			return $this->db->delete($this->_table_name,$where);
		}
		return 0;
	}
}

?>
