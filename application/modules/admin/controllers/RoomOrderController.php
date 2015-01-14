<?php
class Admin_RoomOrderController extends Benly_AdminController {
	public function init(){
		parent::init();
	}
	public function indexAction(){
		$model = new Admin_Model_RoomOrder();
		// print_r($model->SystemAccount_getByUsername("linh"));
		$this->view->accounts = $model->RoomOrder_listall();
		$this->view->title="Quản lý đặt phòng";
		$this->view->intro="Danh sách đặt phòng";
	}
	public function addAction(){
		$form = new Admin_Form_AddRoomOrderForm();
		//print_r($form->);
		if ($this->getRequest()->isPost()){
			if ($form->isValid($_POST)){
				$model = new Admin_Model_RoomOrder();
				$result = $model->RoomOrder_insert(
						$form->getValue("order_id"),
						$form->getValue("room_cat_id"),
						$form->getValue("num_1_0"),
						$form->getValue("num_1_1"),
						$form->getValue("num_2_0"),
						$form->getValue("num_0_2")
								);
				if ($result>0){
					$this->_redirect("/admin/room-order/index");
				}
			}
		}
		
		
		$this->view->form = $form;
		$this->view->title="Quản lý đặt phòng";
		$this->view->intro="Đặt phòng";
	}
	public function editAction(){
		$form = new Admin_Form_EditRoomOrderForm();
		$model = new Admin_Model_RoomOrder();
		if ($this->getRequest()->isPost()){
			if ($form->isValid($_POST)){
				$model->RoomOrder_getByOrder_And_Room_Cat(
						$form->getValue("order_id"),
						$form->getValue("room_cat_id"));
				$model->setNum_0_2($form->getValue("num_0_2"));
				$model->setNum_2_0($form->getValue("num_2_0"));
				$model->setNum_1_1($form->getValue("num_1_1"));
				$model->setNum_1_0($form->getValue("num_1_0"));
				$result = $model->RoomOrder_update();
				if($result>0)
							$this->_redirect("/admin/room-order/index");
					
					
				
				
			}
		}
		else{
			$room_cat_id = $this->getRequest()->getParam('ircat',null);
			$order_id  = $this->getRequest()->getParam('orderid',null);
			
			$model->RoomOrder_getByOrder_And_Room_Cat($order_id  ,$room_cat_id);
		
		
			$a = array(
					'order_id'=> $model->getOrder_Id(),
					'room_cat_id'=>$model->getRoom_Cat_Id(),
					'num_0_2'=>$model->getNum_0_2(),
					'num_1_1'=>$model->getNum_1_1(),
					'num_2_0'=>$model->getNum_2_0(),
					'num_1_0'=>$model->getNum_1_0(),
						
			);
		
			$form->populate($a);
		}
		
		$this->view->form = $form;
		$this->view->title="Quản lý đặt phòng";
		$this->view->intro="Chỉnh sửa phòng";
	}
	public function delAction(){
		$room_cat_id = $this->getRequest()->getParam('ircat',null);
		$order_id  = $this->getRequest()->getParam('orderid',null);
		$model = new Admin_Model_RoomOrder();
		$result = $model->RoomOrder_delete($order_id, $room_cat_id);
		if($result > 0)
			$this->_redirect("/admin/room-order/index");
		else
			$this->view->error = "Không thể xóa !!!";
	}
	
}

?>