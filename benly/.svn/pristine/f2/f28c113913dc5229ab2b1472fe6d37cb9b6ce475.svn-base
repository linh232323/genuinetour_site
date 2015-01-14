<?php
class Default_Form_AddCustomerForm extends Zend_Form{
	public function init(){
		$this->setAction('/account/add');
		$this->setMethod('post');
		
				
		$username=$this->createElement("text", "username");
		$username->setAttrib("class", "text-input small-input");
		$username->setLabel("Tên đăng nhập");
		$this->addElement($username);
		
		$name=$this->createElement("text", "name");
		$name->setAttrib("class", "text-input small-input");
		$name->setLabel("Họ tên");
		$this->addElement($name);
		
		$password=$this->createElement("password", "password");
		$password->setAttrib("class", "text-input small-input");
		$password->setLabel("Mật khẩu");
		$this->addElement($password);
		
		$email=$this->createElement("text", "email");
		$email->setAttrib("class", "text-input small-input");
		$email->setLabel("Email");
		$this->addElement($email);
		
		$cid_passport=$this->createElement("text", "cid_passport");
		$cid_passport->setAttrib("class", "text-input small-input");
		$cid_passport->setLabel("Passport/CMND");
		$this->addElement($cid_passport);
		
		$phone=$this->createElement("text", "phone");
		$phone->setAttrib("class", "text-input small-input");
		$phone->setLabel("Điện thoại liên lạc");
		$this->addElement($phone);
		
		$submit=$this->createElement("submit", "save");
		$submit->setLabel("Đăng kí");
		$submit->setAttrib("class","button");
		$this->addElement($submit);
	}
}

?>