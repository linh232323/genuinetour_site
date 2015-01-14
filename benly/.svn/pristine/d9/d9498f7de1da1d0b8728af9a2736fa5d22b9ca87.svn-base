<?php
class Admin_Form_EditNationForm extends Zend_Form{
	public function init(){
		$this->setAction('/admin/nation/edit');
		$this->setMethod('post');
		
		$id = $this->createElement("hidden","id");
		$this->addElement($id);
		
		$username=$this->createElement("text", "name");
		$username->setAttrib("class", "text-input small-input");
		$username->setLabel("Quốc tịch");
		$this->addElement($username);
		
		$submit=$this->createElement("submit", "save");
		$submit->setLabel("Lưu");
		$submit->setAttrib("class","button");
		$this->addElement($submit);
	}
}

?>