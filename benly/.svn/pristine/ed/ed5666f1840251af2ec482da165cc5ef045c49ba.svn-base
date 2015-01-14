<?php
class Default_Form_EditCustomerForm extends Zend_Form{
	public function init(){
		$this->setAction('');
		$this->setMethod('post');
		
		$id = $this->createElement("hidden","id");
		$this->addElement($id);
		
		$username=$this->createElement("text", "name");
		$username->setAttrib("class", "text-input small-input");
		$username->setLabel("Họ tên");
		$this->addElement($username);
		
		$password=$this->createElement("password", "password");
		$password->setAttrib("class", "text-input small-input");
		$password->setLabel("Mật khẩu");
		$this->addElement($password);
		
		$repassword=$this->createElement("password", "repassword");
		$repassword->setAttrib("class", "text-input small-input");
		$repassword->setLabel("Nhập lại mật khẩu");
		$this->addElement($repassword);
		
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
		$submit->setLabel("Lưu");
		$submit->setAttrib("class","button");
		$this->addElement($submit);
	}
}

?>