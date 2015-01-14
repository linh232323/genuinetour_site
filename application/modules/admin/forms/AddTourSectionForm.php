<?php
class Admin_Form_AddTourSectionForm extends Zend_Form{
	public function  init(){
		$this->setAction('/admin/tour-section/add');
		$this->setMethod('post');
		
		$name_vi = $this->createElement("text","name");
		$name_vi->setAttrib("class", "text-input small-input");
		$name_vi->setLabel("Tên loại tour(Vietnam)");
		$this->addElement($name_vi);
		 
		$name_en = $this->createElement("text","name_en");
		$name_en->setAttrib("class", "text-input small-input");
		$name_en->setLabel("Tên loại tour(English)");
		$this->addElement($name_en);
		 
		$submit=$this->createElement("submit", "save");
		$submit->setLabel("Thêm loại tour");
		$submit->setAttrib("class","button");
		$this->addElement($submit);
	}
}

?>