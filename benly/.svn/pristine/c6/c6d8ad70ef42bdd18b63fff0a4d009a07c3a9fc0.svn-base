<?php
class Admin_Form_AddTourScheduleForm extends Zend_Form{
	public function init(){
		$this->setAction('/admin/tour-schedule/add');
		$this->setMethod('post');
		
		$tour_intro = new Admin_Model_TourIntro();
		$data = $tour_intro->TourIntro_listall();
		$temp = array();
		foreach($data as $item){
			$temp[$item['id']] = $item['name'];
		}
		
		$tour = $this->createElement("select", "tour_id",array('multiOptions'=>$temp));
		$tour->setAttrib("class", "text-input small-input");
		$tour->setLabel("Tour");
		$this->addElement($tour);
		
		$start_date = $this->createElement("text", "start_date");
		$start_date->setAttrib("class", "text-input small-input datepicker");
                $start_date->setAttrib("readonly", "readonly");
		$start_date->setLabel("Thời gian khởi hành");
		$this->addElement($start_date);
		
		$submit = $this->createElement("submit","save");
		$submit->setLabel("Thêm chuyến đi");
		$submit->setAttrib("class", "button");
		$this->addElement($submit);
		
	}
}

?>