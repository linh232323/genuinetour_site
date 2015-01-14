<?php
class Admin_Form_AddTourCategoryForm extends Zend_Form  {
	public function init(){
		$this->setAction('/admin/tour-category/add');
		$this->setMethod('post');
		
		$name_vi = $this->createElement("text","tour_cat_name");
		$name_vi->setAttrib("class", "text-input small-input");
		$name_vi->setLabel("Tiêu chuẩn Tour(Vietnam)");
		$this->addElement($name_vi);
	
		$name_en = $this->createElement("text","tour_cat_name_en");
		$name_en->setAttrib("class", "text-input small-input");
		$name_en->setLabel("Tiêu chuẩn Tour(English)");
		$this->addElement($name_en);
	
		$submit=$this->createElement("submit", "save");
		$submit->setLabel("Thêm tiêu chuẩn Tour");
		$submit->setAttrib("class","button");
		$this->addElement($submit);
	}
}

?>