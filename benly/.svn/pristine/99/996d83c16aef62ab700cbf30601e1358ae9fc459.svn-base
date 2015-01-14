<?php
class Admin_Form_AddRoomCategoryForm extends Zend_Form{
	public function init(){
		
		$this->setAction('/admin/room-cat/add');
		$this->setMethod('post');
		
		$name_vi = $this->createElement("text","name");
		$name_vi->setAttrib("class", "text-input small-input");
		$name_vi->setLabel("Loại phòng(Vietnam)");
		$this->addElement($name_vi);
		
		$name_en = $this->createElement("text","name_en");
		$name_en->setAttrib("class", "text-input small-input");
		$name_en->setLabel("Loại phòng(English)");
		$this->addElement($name_en);
		
		$submit=$this->createElement("submit", "save");
		$submit->setLabel("Thêm loại phòng");
		$submit->setAttrib("class","button");
		$this->addElement($submit);
	}
}

?>