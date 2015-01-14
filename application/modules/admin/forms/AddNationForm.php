<?php
class Admin_Form_AddNationForm extends Zend_Form{
	public function init(){
		$this->setAction('/admin/nation/add');
		$this->setMethod('post');
		
		$username=$this->createElement("text", "name");
		$username->setAttrib("class", "text-input small-input");
		$username->setLabel("Quốc tịch");
		$this->addElement($username);
		
		$submit=$this->createElement("submit", "save");
		$submit->setLabel("Thêm quốc tịch");
		$submit->setAttrib("class","button");
		$this->addElement($submit);
	}
}

?>