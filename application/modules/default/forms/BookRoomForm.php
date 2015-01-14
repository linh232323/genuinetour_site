<?php
class Default_Form_BookRoomForm extends Zend_Form{
	public function init(){
		$bed1 = $this->createElement('select','num_0_2');
		$bed1->setMultiOptions(array(1,2,3,4,5,6,7,8,9,10));
		$bed1->addLabel("02 giường đơn");
		$this->addElement($bed1);
		
		$bed2 = $this->createElement('select','num_1_0');
		$bed2->setMultiOptions(array(1,2,3,4,5,6,7,8,9,10));
		$bed2->setLabel("01 giường đôi");
		$this->addElement($bed2);
		
		$bed3 = $this->createElement('select','num_1_1');
		$bed3->setLabel("01 giường đơn + 1 giường đôi");
		$bed3->setMultiOptions(array(1,2,3,4,5,6,7,8,9,10));
		$this->addElement($bed3);
		
		$bed4 = $this->createElement('select','num_2_0');
		$bed4->setLabel("02 giường đôi");
		$bed4->setMultiOptions(array(1,2,3,4,5,6,7,8,9,10));
		$this->addElement($bed4);
		
		$tour_id = 0;
		$outward_transport_list = new Default_Model_TourPrice();
		$temp2 = new Default_Model_TourCategory();
		$data = $outward_transport_list->TourPrice_getByTour($tour_id);
		$temp = array();
		foreach($data as $item){
			$temp2->TourCategory_getById($item['tour_cat_id']);
			$temp[$item['tour_cat_id']] = $temp2->getTour_Cat_Name();
		}
		$tour_category = $this->createElement('select','tour_category');
		$bed4->setMultiOptions($temp);
		$this->addElement($bed4);
		//$bed = $this->createElement();
		//$this->addElement($bed);
	}
	
	
	
}

?>