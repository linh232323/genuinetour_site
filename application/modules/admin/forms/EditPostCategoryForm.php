<?php
class Admin_Form_EditPostCategoryForm extends Zend_Form{
	public function init(){
		$this->setAction('/admin/post-cat/edit');
		$this->setMethod('post');
		
		$id = $this->createElement("hidden","id");
		$this->addElement($id);
		
		$name_vi = $this->createElement("text","name_vi");
		$name_vi->setAttrib("class", "text-input small-input");
	    $name_vi->setLabel("Tên mục(Vietnam)");
	    $this->addElement($name_vi);
	    
	    $name_en = $this->createElement("text","name_en");
	    $name_en->setAttrib("class", "text-input small-input");
	    $name_en->setLabel("Tên mục(English)");
	    $this->addElement($name_en);
	    
	    $submit=$this->createElement("submit", "save");
	    $submit->setLabel("Lưu");
	    $submit->setAttrib("class","button");
	    $this->addElement($submit);
	}
}

?>