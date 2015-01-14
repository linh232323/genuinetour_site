<?php
class Admin_Form_AddTransportForm extends Zend_Form{
	public function init(){
		$this->setAction('/admin/transport/add');
		$this->setMethod('post');
		
		$name_vi = $this->createElement("text","name");
		$name_vi->setAttrib("class", "text-input small-input");
	    $name_vi->setLabel("Tên phương tiện(Vietnam)");
	    $this->addElement($name_vi);
	    
	    $name_en = $this->createElement("text","name_en");
	    $name_en->setAttrib("class", "text-input small-input");
	    $name_en->setLabel("Tên phương tiện(English)");
	    $this->addElement($name_en);
	    
	    $submit=$this->createElement("submit", "save");
	    $submit->setLabel("Thêm phương tiện");
	    $submit->setAttrib("class","button");
	    $this->addElement($submit);
	}
}

?>