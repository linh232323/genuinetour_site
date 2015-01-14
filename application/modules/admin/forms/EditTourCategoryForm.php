<?php
class Admin_Form_EditTourCategoryForm extends Zend_Form  {
	public function init(){
		$this->setAction('/admin/tour-category/edit');
		$this->setMethod('post');
		
		$id = $this->createElement("hidden","id");
		$this->addElement($id);
		
		$name_vi = $this->createElement("text","tour_cat_name");
		$name_vi->setAttrib("class", "text-input small-input");
		$name_vi->setLabel("Tiêu chuẩn Tour(Vietnam)");
		$this->addElement($name_vi);
	
		$name_en = $this->createElement("text","tour_cat_name_en");
		$name_en->setAttrib("class", "text-input small-input");
		$name_en->setLabel("Tiêu chuẩn Tour(English)");
		$this->addElement($name_en);
	
		$submit=$this->createElement("submit", "save");
		$submit->setLabel("Lưu");
		$submit->setAttrib("class","button");
		$this->addElement($submit);
	}
}

?>