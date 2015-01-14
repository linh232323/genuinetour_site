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
class Admin_Form_EditTransportDetailForm extends Zend_Form{
    public function init(){
        
        $this->setAction('/admin/trans-detail/edit');
        $this->setMethod('post');
        
        $id = $this->createElement("hidden","id");
        $this->addElement($id);
        
        $model = new Admin_Model_TourIntro();
        $data = $model->TourIntro_listall();
        $tour_intro =$this->createElement("select", "tour_id");
        $tour_intro->setAttrib("class", "text-input small-input");
        foreach($data as $item){
        	$tour_intro->addMultiOption($item['id'],$item['name']);
        }
        $tour_intro->setLabel("Tên Tour");
        $this->addElement($tour_intro);
        
        $model = new Admin_Model_Transport();
        $data = $model->Transport_listall();
        $transport_id =$this->createElement("select", "transport_id");
        foreach($data as $item){
        	$transport_id->addMultiOption($item['id'],$item['name']);
        }
        $transport_id->setAttrib("class", "text-input small-input");
        $transport_id->setLabel("Phương tiện");
        $this->addElement($transport_id);
        
        
        
        $price=$this->createElement("text", "price");
        $price->setAttrib("class", "text-input small-input");
        $price->setLabel("Giá phương tiện");
        $this->addElement($price);
        
        $price_description =$this->createElement("text", "price_description");
        $price_description->setAttrib("class", "text-input small-input");
        $price_description->setLabel("Mô tả");
        $this->addElement($price_description);
        
        $submit=$this->createElement("submit", "save");
        $submit->setLabel("Lưu");
        $submit->setAttrib("class","button");
        $this->addElement($submit);
    }
    
}

?>
