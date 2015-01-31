<?php

class Admin_Form_EditTourPriceForm extends Zend_Form {

    public function init() {
        $this->setAction('/admin/tour-price/edit');
        $this->setMethod('post');

        $tour_id = $this->createElement("hidden", "id");
        $this->addElement($tour_id);

        $tour_cat_id = $this->createElement("hidden", "tour_cat_id");
        $this->addElement($tour_cat_id);


        $tour_intro = new Admin_Model_TourIntro();
        $data = $tour_intro->TourIntro_listall();
        //$temp = array();
        //foreach($data as $item){
        //	$temp[$item['id']] = $item['name'];
        //}

        $tour = $this->createElement("select", "tour_id");
        $tour->setAttrib("class", "text-input small-input");
        foreach ($data as $item) {
            $tour->addMultiOption($item['id'], $item['name_vi']);
        }
        $tour->setLabel("Tour");
        $tour->setValue($tour_id->getValue());
        $this->addElement($tour);

        $tour_category = new Admin_Model_TourCategory();
        $data = $tour_category->TourCategory_listall();
        //$temp = array();
        //foreach($data as $item){
        //	$temp[$item['id']] = $item['tour_cat_name'];
        //}
        $tour_category = $this->createElement("select", "tour_cat_id");
        $tour_category->setAttrib("class", "text-input small-input");
        foreach ($data as $item) {
            $tour_category->addMultiOption($item['id'], $item['tour_cat_name']);
        }
        $tour_category->setLabel("Hạng Tour");
        $tour_category->setValue($tour_cat_id->getValue());
        $this->addElement($tour_category);

        $tour_category = $this->createElement("text", "price");
        $tour_category->setAttrib("class", "text-input small-input");
        $tour_category->setLabel("Giá Tour");
        $this->addElement($tour_category);

        $surcharge = $this->createElement("text", "surcharge");
        $surcharge->setAttrib("class", "text-input small-input");
        $surcharge->setLabel("Giá phụ thu Tour");
        $this->addElement($surcharge);

        $foreigner_charge = $this->createElement("text", "foreign_charge");
        $foreigner_charge->setAttrib("class", "text-input small-input");
        $foreigner_charge->setLabel("Phụ thu nước ngoài");
        $this->addElement($foreigner_charge);

        $submit = $this->createElement("submit", "save");
        $submit->setLabel("Lưu");
        $submit->setAttrib("class", "button");
        $this->addElement($submit);
    }

}

?>