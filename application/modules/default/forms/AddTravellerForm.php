<?php

class Default_Form_AddTravellerForm extends Zend_Form{
	public function int(){
		$name=$this->createElement("text", "name");
		$name->setAttrib("class", "text-input small-input");
		$name->setLabel("Họ tên");
		$this->addElement($name);
		
		$password=$this->createElement("text", "passport");
		$password->setAttrib("class", "text-input small-input");
		$password->setLabel("Passport/CMND");
		$this->addElement($password);
		
		$sex=$this->createElement("select", "sex");
		$sex->setAttrib("class", "text-input small-input");
		$sex->setLabel("Giới tính");
		$this->addElement($sex);
		
		$address=$this->createElement("text", "address");
		$address->setAttrib("class", "text-input small-input");
		$address->setLabel("Địa chỉ");
		$this->addElement($address);
		
		$phone=$this->createElement("text", "phone");
		$phone->setAttrib("class", "text-input small-input");
		$phone->setLabel("Điện thoại");
		$phone->addElement($phone);
		
		$old_year=$this->createElement("text", "old_year");
		$old_year->setAttrib("class", "text-input small-input");
		$old_year->setLabel("Năm sinh");
		$this->addElement($old_year);
	}
	
}

?>