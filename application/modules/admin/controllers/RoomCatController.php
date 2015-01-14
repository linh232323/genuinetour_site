<?php
class Admin_RoomCatController extends Benly_AdminController {
public function init(){
		parent::init();
	}
	public function indexAction(){
		$model = new Admin_Model_RoomCategory();
		
		$this->view->accounts = $model->RoomCategory_listall();
		$this->view->title="Hạng phòng";
		$this->view->intro="Danh sách hạng phòng";
	}
	public function addAction(){
		$form = new Admin_Form_AddRoomCategoryForm();
		if ($this->getRequest()->isPost()){
			if ($form->isValid($_POST)){
				$model = new Admin_Model_RoomCategory();
				$result = $model->RoomCategory_insert($form->getValue("name"),
						$form->getValue("name_en"));
				if ($result>0){
					$this->_redirect("/admin/room-cat/index");
				}
			}
		}
			
		$this->view->form = $form;
		$this->view->title="Hạng phòng";
		$this->view->intro="Thêm hạng phòng";
	}
	public function editAction(){
		
		$model = new Admin_Model_RoomCategory();
		$form = new Admin_Form_EditRoomCategoryForm();
		if ($this->getRequest()->isPost()){
			if ($form->isValid($_POST)){
				
				$model->RoomCategory_getById($form->getValue("id"));
				$model->setRoom_Cat_Name($form->getValue("name"));
				$model->setRoom_Cat_Name_En($form->getValue("name_en"));
		
				$result = $model->RoomCategory_update();
				if($result>0)
					$this->_redirect("/admin/room-cat/index");
				
			}
		}
		else{
			$id = $this->getRequest()->getParam('id',null);
			$model->RoomCategory_getById($id);
			$a = array(
					'id' =>$model->getId(),
					'name_en'=>$model->getRoom_Cat_Name_En(),
					'name'=>$model->getRoom_Cat_Name()
			);
				
			$form->populate($a);
		}
		
		$this->view->form = $form;
		$this->view->title="Hạng phòng";
		$this->view->intro="Chỉnh sửa hạng phòng";
	}
	public function delAction(){
		$id = $this->getRequest()->getParam('id',null);
		$model = new Admin_Model_RoomCategory();
		$result = $model->RoomCategory_delete($id);
		if($result>0)
			$this->_redirect("/admin/room-cat/index");
		else
			$this->view->error = "Không thể xóa !!!";
	}
}

?>