<?php
class Admin_NationController extends Benly_AdminController{
	public function init(){
		parent::init();
	}
	public function indexAction(){
		$model = new Admin_Model_Nation();
		$this->view->accounts = $model->Nation_listall();
		$this->view->intro="Quốc tịch";
	}
	public function addAction(){
		$form = new Admin_Form_AddNationForm();
		if ($this->getRequest()->isPost()){
			if ($form->isValid($_POST)){
				$model = new Admin_Model_Nation();
				
				$result = $model->Nation_insert($form->getValue("name"));
				
				if ($result>0){
					$this->_redirect("/admin/nation/index");
				}
				
			}
		}
			
		$this->view->form = $form;
		$this->view->title="Quốc tịch";
		$this->view->intro="Thêm Quốc tịch";
	}
	public function editAction(){
		
		$model = new Admin_Model_Nation();
		$form = new Admin_Form_EditNationForm();
		
		if ($this->getRequest()->isPost()){
			if ($form->isValid($_POST)){
				$model->Nation_getById($form->getValue('id'));
				$model->setName($form->getValue("name"));
				
				$model->Nation_update();
				$this->_redirect("/admin/nation/index");
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
			
			
			$model->Nation_getById($id);
			
			$a = array(
					'id'=> $model->getId(),
					'name'=>$model->getName(),
			
			);
			$form->populate($a);
		}
			
	
		$this->view->form = $form;
		$this->view->title="Quốc tịch";
		$this->view->intro="Chỉnh sửa Quốc tịch";
	}
	public function delAction(){
		$id = $this->getRequest()->getParam('id',null);
		$model = new Admin_Model_Nation();
		$result = $model->Nation_delete($id);
		if($result>0)
			$this->_redirect("/admin/nation/index");
		else
			$this->view->error = "Không thể xóa !!!";
	}
}

?>