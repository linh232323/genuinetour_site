<?php
class Admin_Form_EditCustomerForm extends Zend_Form{
	public function init(){
		$this->setAction('/admin/customer/edit');
		$this->setMethod('post');
		
		$id = $this->createElement("hidden", "id");
		$this->addElement($id);
		
		$username=$this->createElement("text", "username");
		$username->setAttrib("class", "text-input small-input");
		$username->setLabel("Tên đăng nhập");
		$username->setRequired(true);
		$this->addElement($username);
		
		$name=$this->createElement("text", "name");
		$name->setAttrib("class", "text-input small-input");
		$name->setLabel("Họ tên");
		$this->addElement($name);
		
		$password=$this->createElement("password", "password");
		$password->setAttrib("class", "text-input small-input");
		$password->setLabel("Mật khẩu");
		$password->setRequired(true);
		$this->addElement($password);
		
		$repassword=$this->createElement("password", "repassword");
		$repassword->setAttrib("class", "text-input small-input");
		$repassword->setLabel("Nhập lại mật khẩu");
		$repassword->setRequired(true);
		$this->addElement($repassword);
		
		$email=$this->createElement("text", "email");
		$email->setAttrib("class", "text-input small-input");
		$email->setLabel("Email");
		$email->setRequired(true);
		$this->addElement($email);
		
		$cid_passport=$this->createElement("text", "cid_passport");
		$cid_passport->setAttrib("class", "text-input small-input");
		$cid_passport->setLabel("Passport/CMND");
		$this->addElement($cid_passport);
		
		$phone=$this->createElement("text", "phone");
		$phone->setAttrib("class", "text-input small-input");
		$phone->setLabel("Điện thoại liên lạc");
		$this->addElement($phone);
		
		$model = new Admin_Model_Nation();
		$data = $model->Nation_listall();
		$nation_id=$this->createElement("select", "nation_id");
		foreach($data as $item){
			$nation_id->addMultiOption($item['id'],$item['name']);
		}
		
		$nation_id->setAttrib("class", "text-input small-input");
		$nation_id->setLabel("Quốc tịch");
		$this->addElement($nation_id);
		
		$submit=$this->createElement("submit", "save");
		$submit->setLabel("Lưu");
		$submit->setAttrib("class","button");
		$this->addElement($submit);
	}
}

?>