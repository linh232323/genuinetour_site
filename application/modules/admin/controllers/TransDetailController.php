<?php
class Admin_TransDetailController extends Benly_AdminController{
	public function init(){
		parent::init();
	}
	public function indexAction(){
		$model = new Admin_Model_TransportDetail();
		// print_r($model->SystemAccount_getByUsername("linh"));
		$this->view->detail = $model->TransportDetail_listall();
		
		$this->view->title="Quản lý giá phương tiện";
		$this->view->intro="Danh sách giá";
	}
	public function addAction(){
		$form = new Admin_Form_AddTransportDetailForm();
		$tour_id = $this->getRequest()->getParam('id',null);
		if ($this->getRequest()->isPost()){
			if ($form->isValid($_POST)){
				$model = new Admin_Model_TransportDetail();
				$result = $model->TransportDetail_insert(
						$form->getValue("transport_id"),
						$form->getValue("price"),
						$form->getValue("price_description"),
						$form->getValue("tour_id"));
				if ($result>0){
					$this->_redirect("/admin/tour/detail/id/".$form->getValue('tour_id'));
				}
			}
		}
		if(isset($tour_id)){
			$data = array('tour_id'=>$tour_id);
			$form->populate($data);
		}
		$this->view->form = $form;
		$this->view->title="Quản lý giá phương tiện";
		$this->view->intro="Thêm tài giá mới";
	}
	public function editAction(){
		$form = new Admin_Form_EditTransportDetailForm();
		$model = new Admin_Model_TransportDetail();
		if ($this->getRequest()->isPost()){
			if ($form->isValid($_POST)){
				
				$model->TransportDetail_getById($form->getValue("id"));
				$model->setPrice_Description($form->getValue("price_description"));
				$model->setPrice($form->getValue("price"));
				$model->setTour_Id($form->getValue("tour_id"));

				$result = $model->TransportDetail_update();
				if($result)
							$this->_redirect("/admin/tour/detail/id/".$form->getValue('tour_id'));	
			}
				
			
		}
		else{
			$id = $this->getRequest()->getParam('id',null);
				
				
			$model->TransportDetail_getById($id);
		
			$a = array(
					'id'=> $model->getId(),
					'price_description'=>$model->getPrice_Description(),
					'price'=>$model->getPrice(),
					'tour_id'=>$model->getTour_Id(),
					'transport_id'=>$model->getTransport_Id()		
			);
		
			$form->populate($a);
		}
		$this->view->form = $form;
		$this->view->title="Quản lý giá phương tiện";
		$this->view->intro="Chỉnh sửa giá";
	}
	public function delAction(){
		$id = $this->getRequest()->getParam('id',null);
		$model = new Admin_Model_TransportDetail();
		$result = $model->TransportDetail_delete($id);
		if($result > 0)
			$this->_redirect("/admin/trans-detail/index");
		else
			$this->view->error = "Không thể xóa !!!";
	}
	
}

?>