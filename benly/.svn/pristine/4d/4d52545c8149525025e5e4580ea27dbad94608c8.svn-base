<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddAccountForm
 *
 * @author Zelic
 */
class Admin_Form_EditTravellerForm extends Zend_Form{
    public function init(){
        
        $this->setAction('/admin/traveller/edit');
        $this->setMethod('post');
        
        $id = $this->createElement("hidden","id");
        $this->addElement($id);
        $order_id = $this->createElement("hidden","order_id");
        $this->addElement($order_id);
        
        $name=$this->createElement("text", "name");
        $name->setAttrib("class", "text-input small-input");
        $name->setLabel("Họ tên");
        $name->setRequired(true);
        $this->addElement($name);
        
        $model = new Admin_Model_Nation();
        $data = $model->Nation_listall();
        $nation_id=$this->createElement("select", "nation_id");
        foreach($data as $item){
        	$nation_id->addMultiOption($item['id'],$item['name']);
        }
        
        $nation_id->setAttrib("class", "text-input small-input");
        $nation_id->setLabel("Quốc tịch");
        $this->addElement($nation_id);
        
        $passport=$this->createElement("text", "passport");
        $passport->setAttrib("class", "text-input small-input");
        $passport->setLabel("Passport/CMND");
        $passport->setRequired(true);
        $this->addElement($passport);
        
        $phone=$this->createElement("text", "phone");
        $phone->setAttrib("class", "text-input small-input");
        $phone->setLabel("Điện thoại liên lạc");
        $this->addElement($phone);
        
        $address=$this->createElement("text", "address");
        $address->setAttrib("class", "text-input small-input");
        $address->setLabel("Địa chỉ");
        $this->addElement($address);
        
        $old_year=$this->createElement("text", "old_year");
        $old_year->setAttrib("class", "text-input small-input");
        $old_year->setLabel("Tuổi");
        $this->addElement($old_year);
        
        $submit=$this->createElement("submit", "save");
        $submit->setLabel("Lưu");
        $submit->setAttrib("class","button");
        $this->addElement($submit);
    }
    
}

?>
