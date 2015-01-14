<?php

class Admin_Form_EditTourIntroForm extends Zend_Form {

    protected $_outward_transport;
    protected $_return_transport;
    protected $_post_id_intro;
    protected $_post_id_intro_en;
    protected $_program;
    protected $_program_en;
    protected $_name;
    protected $_name_en;
    protected $_during;
    protected $_during_en;

    public function init() {

        $this->setAction('/admin/tour/add');
        $this->setMethod('post');
        $this->setAttrib('enctype', 'multipart/form-data');
        
        $_id = $this->createElement("hidden", "id");
        $this->addElement($_id);

        $_code = $this->createElement("text","code")
	        ->setAttrib("class", "text-input small-input")
	        ->setLabel("Mã Tour")
	        ->setRequired(true)
	        ->addValidator('NotEmpty', true)
	        ->addErrorMessage('Cần nhập mã Tour.');
	        $this->addElement($_code);
        
        $_name = $this->createElement("text", "name");
        $_name->setAttrib("class", "text-input small-input");
        $_name->setLabel("Tên Tour(tiếng Việt)");
        $this->addElement($_name);

        $_name_en = $this->createElement("text", "name_en");
        $_name_en->setAttrib("class", "text-input small-input");
        $_name_en->setLabel("Tên Tour(English)");
        $this->addElement($_name_en);

        $_thumbnail_url = $this->createElement("text", "thumbnail_url");
        $_thumbnail_url->setAttrib("class", "text-input small-input browse");
        $_thumbnail_url->setLabel("Hình đại diện");
        $this->addElement($_thumbnail_url);

        $tour_section_list = new Admin_Model_TourSection();
        $data = $tour_section_list->TourSection_listall();
        $temp = array();
        foreach ($data as $item) {
            $temp[$item['id']] = $item['name'];
        }
        $_tour_section_id = $this->createElement("select", "tour_section_id", array("multiOptions" => $temp));
        $_tour_section_id->setAttrib("class", "text-input small-input");
        $_tour_section_id->setLabel("Phân loại Tour");
        $this->addElement($_tour_section_id);

        $_during = $this->createElement("select", "during");
        $_during->setAttrib("class", "text-input small-input");
        $_during->setLabel("Thời gian Tour(tiếng Việt)");
        for($i = 1;$i<=30;$i+= 0.5){
        	$name ="";
       		if($i == floor($i)){
				$name =  "$i Ngày";
			}else{
				$night = floor($i);
				$day = $night + 1;
				$name = "$day Ngày $night Đêm";
			}
        	$_during->addMultiOption($i,$name);
        }
        $this->addElement($_during);

        $_during_en = $this->createElement("select", "during_en");
        $_during_en->setAttrib("class", "text-input small-input");
        $_during_en->setLabel("Thời gian Tour(English)");
        for($i = 1;$i<=30;$i+= 0.5){
        	$name ="";
        	if($i == floor($i)){
				$name =  "$i Day(s)";
			}else{
				$night = floor($i);
				$day = $night + 1;
				$name = "$day Day(s) $night Night(s)";
			}
        	$_during_en->addMultiOption($i,$name);
        }
        $this->addElement($_during_en);

        $_post_id_intro = $this->createElement("textarea", "post_intro");
        $_post_id_intro->setAttrib("class", "ckeditor");
        $_post_id_intro->setLabel("Thông tin Tour(Viet Nam)");
        $this->addElement($_post_id_intro);

        $_post_id_intro_en = $this->createElement("textarea", "post_intro_en");
        $_post_id_intro_en->setAttrib("class", "ckeditor");
        $_post_id_intro_en->setLabel("Thông tin Tour(English)");
        $this->addElement($_post_id_intro_en);

        $_appendix = $this->createElement("textarea", "appendix");
        $_appendix->setAttrib("class", "ckeditor");
        $_appendix->setLabel("Phụ lục(Viet Nam)");
        $this->addElement($_appendix);

        $_appendix_en = $this->createElement("textarea", "appendix_en");
        $_appendix_en->setAttrib("class", "ckeditor");
        $_appendix_en->setLabel("Phụ lục(English)");
        $this->addElement($_appendix_en);

        $_program = $this->createElement("textarea", "program");
        $_program->setAttrib("class", "ckeditor");
        $_program->setLabel("Lịch trình Tour(Viet Nam)");
        $this->addElement($_program);

        $_program_en = $this->createElement("textarea", "program_en");
        $_program_en->setAttrib("class", "ckeditor");
        $_program_en->setLabel("Lịch trình Tour(English)");
        $this->addElement($_program_en);

        $outward_transport_list = new Admin_Model_Transport();
        $data = $outward_transport_list->Transport_listall();
        $temp = array();
        foreach ($data as $item) {
            $temp[$item['id']] = $item['name'];
        }
        $_outward_transport = $this->createElement("select", "outward_transport", array('multiOptions' => $temp));
        $_outward_transport->setAttrib("class", "text-input small-input");
        $_outward_transport->setLabel("Phương tiện đi");
        $this->addElement($_outward_transport);

       // $_price_outward_transport = $this->createElement("text", "price_outward_transport");
       // $_price_outward_transport->setAttrib("class", "text-input small-input");
       // $_price_outward_transport->setLabel("Đơn giá");
        //$this->addElement($_price_outward_transport);

        $_return_transport = $this->createElement("select", "return_transport", array('multiOptions' => $temp));
        $_return_transport->setAttrib("class", "text-input small-input");
        $_return_transport->setLabel("Phương tiện về");
        $this->addElement($_return_transport);

        //$_price_return_transport = $this->createElement("text", "price_return_transport");
        //$_price_return_transport->setAttrib("class", "text-input small-input");
        //$_price_return_transport->setLabel("Đơn giá");
       // $this->addElement($_price_return_transport);
        $price = $this->createElement("text","price");
        $price->setAttrib("class","text-input small-input");
        $price->setLabel("Đơn giá");
        $this->addElement($price);
        
        $submit = $this->createElement("submit", "save");
        $submit->setLabel("Lưu");
        $submit->setAttrib("class", "button");
        $this->addElement($submit);
    }

}

?>