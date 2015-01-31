<?php

class Admin_Form_EditMenuForm extends Zend_Form {

    public function init() {

        $model = new Admin_Model_Menu();
        $menulist = $model -> listAll();
        $id = $this->createElement("hidden", "id");
        $this->addElement($id);
        $arraykey = array_keys ($menulist);
        
        $this->setAction('/admin/menu/edit');
        $this->setMethod('post');

        $name_vi = $this->createElement("text", "name_vi");
        $name_vi->setAttrib("class", "text-input small-input");
        $name_vi->setLabel("Menu (Vietnam)");
        $this->addElement($name_vi);

        $name_en = $this->createElement("text", "name_en");
        $name_en->setAttrib("class", "text-input small-input");
        $name_en->setLabel("Menu (English)");
        $this->addElement($name_en);

        $link_vi = $this->createElement("text", "link_vi");
        $link_vi->setAttrib("class", "text-input small-input");
        $link_vi->setLabel("Link (Vietnam)");
        $this->addElement($link_vi);

        $link_en = $this->createElement("text", "link_en");
        $link_en->setAttrib("class", "text-input small-input");
        $link_en->setLabel("Link (English)");
        $this->addElement($link_en);
        
        $arrayParent = array ();
        foreach ($arraykey as $key=> $value)
        { 
          $parentModel = new Admin_Model_Menu();
          $parentModel-> load($value);
          $arrayParent[$value] =  $parentModel->getData('name_vi');
            };
          
        $parent_id = $this->createElement('select', 'parent_id', array(
            'multiOptions' => $arrayParent,
            )
        );
        $parent_id->setAttrib("class", "select-input small-input");
        $parent_id->setLabel("Parent ID");
        $this->addElement($parent_id);

        $submit = $this->createElement("submit", "save");
        $submit->setLabel("Lưu");
        $submit->setAttrib("class", "button");
        $this->addElement($submit);
    }

}

?>