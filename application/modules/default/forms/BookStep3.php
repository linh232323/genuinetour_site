<?php
class Default_Form_BookStep3 extends Zend_Form{
	public function init(){
                $this->setAttrib("class", "left-form");
                
		$room_1 = $this->createElement("select", "num_1_0",array("multiOptions"=>array(1,2,3,4)));
		$room_1->setLabel("01 giường đôi(02 người)");
		$this->addElement($room_1);

		$room_2 = $this->createElement("select", "room_0_2",array("multiOptions"=>array(1,2,3,4)));
		$room_2->setLabel("02 giường đơn(02 người)");
		$this->addElement($room_2);
		
		$room_3 = $this->createElement("select", "room_1_1",array("multiOptions"=>array(1,2,3,4)));
		$room_3->setLabel("01 giường đôi + 1 giường đơn(03 người)");
		$this->addElement($room_3);
		
		$room_4 = $this->createElement("select", "room_2_0",array("multiOptions"=>array(1,2,3,4)));
		$room_4->setLabel("02 giường đôi(04 người)");
		$this->addElement($room_4);
		
		$tour_cat = $this->createElement("select", "tour_cat",array("multiOptions"=>array("3 Sao","2 Sao","Đạt chuẩn")));
		$tour_cat->setLabel("Hạng vé");
		
		$this->addElement($tour_cat);
		
		$price  = $this->createElement("text","price");
		$price->setLabel("Đơn giá tour");
		$price->setAttrib("readonly","readonly");
		$this->addElement($price);
		
		$room  = $this->createElement("text","room");
		$room->setLabel("Số phòng sử dụng");
		$room->setAttrib("readonly","readonly");
		$this->addElement($room);
		
		$room_surcharge  = $this->createElement("text","room_surcharge");
		$room_surcharge->setLabel("Số phòng phụ thu");
		$room_surcharge->setAttrib("readonly","readonly");
		$this->addElement($room_surcharge);
		
		$total_price  = $this->createElement("text","total_price");
		$total_price->setLabel("Tổng tiền vé");
		$total_price->setAttrib("readonly","readonly");
		$this->addElement($total_price);
		
		$surcharge  = $this->createElement("text","surcharge");
		$surcharge->setLabel("Phụ thu phòng đơn");
		$surcharge->setAttrib("readonly","readonly");
		$this->addElement($surcharge);
		
		$foreigner_charge  = $this->createElement("text","foreigner_charge");
		$foreigner_charge->setLabel("Phụ thu ngoại quốc");
		$foreigner_charge->setAttrib("readonly","readonly");
		$this->addElement($foreigner_charge);
		
		$description  = $this->createElement("textarea","description");
		$description->setLabel("Ghi chú");
		$this->addElement($description);
		
		$submit = $this->createElement("submit", "save");
		$this->addElement($submit);
	}
}

?>