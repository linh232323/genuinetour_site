<?php
class Admin_Form_AddRoomOrderForm extends Zend_Form{
	public function init(){
		$this->setAction('/admin/room-order/add');
		$this->setMethod('post');
	
		$model = new Admin_Model_Order();
		$data = $model->Order_listall();
		
		$order_id=$this->createElement("select", "order_id");
		$order_id->setAttrib("class", "text-input small-input");
		foreach ($data as $a){
			$order_id->addMultiOption($a['id'],$a['id']);
		}
	
		$order_id->setLabel("Mã đơn hàng");
		$this->addElement($order_id);
	
		$model = new Admin_Model_RoomCategory();
		
		$data = $model->RoomCategory_listall();
		//print_r($data);
		$room_cat_id=$this->createElement("select", "room_cat_id");
		$room_cat_id->setAttrib("class", "text-input small-input");
		foreach ($data as $a){
			$room_cat_id->addMultiOption($a['id'],$a['room_cat_name']);
		}
	
		$room_cat_id->setLabel("Hạng phòng");
		$this->addElement($room_cat_id);
	
		$num_1_0 =$this->createElement("text", "num_1_0");
		$num_1_0->setAttrib("class", "text-input small-input");
		$num_1_0->setLabel("01 giường đôi");
		$this->addElement($num_1_0);
	
		$num_1_1=$this->createElement("text", "num_1_1");
		$num_1_1->setAttrib("class", "text-input small-input");
		$num_1_1->setLabel("01 giường đôi + 01 giường đơn");
		$this->addElement($num_1_1);
	
		$num_2_0 = $this->createElement("text", "num_2_0");
		$num_2_0->setAttrib("class", "text-input small-input");
		$num_2_0->setLabel("02 giường đôi");
		$this->addElement($num_2_0);
	
		$num_0_2=$this->createElement("text", "num_0_2");
		$num_0_2->setAttrib("class", "text-input small-input");
		$num_0_2->setLabel("02 giường đơn");
		$this->addElement($num_0_2);
	
		$submit=$this->createElement("submit", "save");
		$submit->setLabel("Thêm đặt phòng");
		$submit->setAttrib("class","button");
		$this->addElement($submit);
	}
}

?>