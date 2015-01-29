<?php
class Admin_TransportController extends Benly_AdminController{
	public function init(){
		parent::init();
	}
	public function indexAction(){
		$model = new Admin_Model_Transport();
		
		$this->view->accounts = $model->Transport_listall();
		$this->view->title="Quản lý phương tiện";
		$this->view->intro="Danh sách phương tiện";
	}
	public function addAction(){
		$form = new Admin_Form_AddTransportForm();
		if ($this->getRequest()->isPost()){
			if ($form->isValid($_POST)){
				$model = new Admin_Model_Transport();
				$result = $model->Transport_insert($form->getValue("name"),
						$form->getValue("name_en"));
				if ($result>0){
					$this->_redirect("/admin/transport/index");
				}
			}
		}
			
		$this->view->form = $form;
		$this->view->title="Thêm phương tiện";
		$this->view->intro="Phương tiện";
	}
	public function editAction(){
		
		$model = new Admin_Model_Transport();
		$form = new Admin_Form_EditTransportForm();
		if ($this->getRequest()->isPost()){
			if ($form->isValid($_POST)){
				
				$model->Transport_getById($form->getValue("id"));
				$model->setName($form->getValue("name_vi"));
				$model->setName_En($form->getValue("name_en"));
		
				$result = $model->Transport_update();
				if($result>0)
					$this->_redirect("/admin/transport/index");
				//$model = new Admin_Model_TourCategory();
				//$result = $model->TourCategory_insert($form->getValue("name"),
				//		$form->getValue("name_en"));
				//if ($result){
				//	$this->_redirect("/admin/tourcategory/index");
				//}
			}
		}
		else{
			$id = $this->getRequest()->getParam('id',null);
			$model->Transport_getById($id);
			$a = array(
					'id' =>$model->getId(),
					'name_en'=>$model->getName_En(),
					'name'=>$model->getName()
			);
				
			$form->populate($a);
		}
		
		$this->view->form = $form;
		$this->view->title="Chỉnh sửa phương tiện";
		$this->view->intro="Phương tiện";
	}
	public function delAction(){
		$id = $this->getRequest()->getParam('id',null);
		$model = new Admin_Model_Transport();
		$result = $model->Transport_delete($id);
		if($result>0)
			$this->_redirect("/admin/transport/index");
		else
			$this->view->error = "Không thể xóa !!!";
	}
}

?>