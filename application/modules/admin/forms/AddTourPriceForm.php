<?php

class Admin_Form_AddTourPriceForm extends Zend_Form {

    public function init() {

        $this->setAction('/admin/tour-price/add');
        $this->setMethod('post');

        $tour_intro = new Admin_Model_TourIntro();
        $data = $tour_intro->TourIntro_listall();

        $tour = $this->createElement("select", "tour_id");
        $tour->setAttrib("class", "text-input small-input");
        foreach ($data as $item) {
            $tour->addMultiOption($item['id'], $item['name_vi']);
        }
        $tour->setLabel("Tour");
        $this->addElement($tour);

        $tour_category = new Admin_Model_TourCategory();
        $data = $tour_category->TourCategory_listall();

        $tour_category = $this->createElement("select", "tour_cat_id");
        $tour_category->setAttrib("class", "text-input small-input");
        foreach ($data as $item) {
            $tour_category->addMultiOption($item['id'], $item['tour_cat_name_vi']);
        }
        $tour_category->setLabel("Hạng Tour");
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
        $submit->setLabel("Thêm giá Tour");
        $submit->setAttrib("class", "button");
        $this->addElement($submit);
    }

}

?>