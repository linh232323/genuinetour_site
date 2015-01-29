<?php
class Admin_Form_EditMenuForm extends Zend_Form{
	public function init(){
		
		$id = $this->createElement("hidden","id");
		$this->addElement($id);
		
		$this->setAction('/admin/menu/edit');
		$this->setMethod('post');
		
		$name_vi = $this->createElement("text","name");
		$name_vi->setAttrib("class", "text-input small-input");
	    $name_vi->setLabel("Menu (Vietnam)");
	    $this->addElement($name_vi);
	    
	    $name_en = $this->createElement("text","name_en");
	    $name_en->setAttrib("class", "text-input small-input");
	    $name_en->setLabel("Menu (English)");
	    $this->addElement($name_en);
	    
	    $submit=$this->createElement("submit", "save");
	    $submit->setLabel("Lưu");
	    $submit->setAttrib("class","button");
	    $this->addElement($submit);
	}
}

?>