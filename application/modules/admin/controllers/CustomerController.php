<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomerController
 *
 * @author Zelic
 */
class Admin_CustomerController extends Benly_AdminController{
    //put your code here
	public function init(){
		parent::init();
	}
	public function indexAction(){
		$model = new Admin_Model_CustomerAccount();
		$paginator = Zend_Paginator::factory( $model->CustomerAccount_listall());
		$paginator->setItemCountPerPage(7);
		$paginator->setPageRange(3);
		$currentPage = $this->_request->getParam('page',1);
		$paginator->setCurrentPageNumber($currentPage);
		$this->view->accounts = $paginator;
		$this->view->title="Quản lý tài khoản người dùng";
		$this->view->intro="Danh sách tài khoản";
	}
	public function editAction(){
		$model = new Admin_Model_CustomerAccount();
		$form = new Admin_Form_EditCustomerForm();
		if ($this->getRequest()->isPost()){
			if ($form->isValid($_POST)){
				$model->CustomerAccount_getById($form->getValue("id"));
				$model->setUser_Name($form->getValue("username"));
				$password = $form->getValue('password');
				$repassword = $form->getValue("repassword");
				if($password == $repassword ){
					if($password != "")
					{
						$model->setPassword($password);
						$model->setEmail($form->getValue('email'));
						$model->setNation_Id($form->getValue('nation_id'));
						$model->setPhone($form->getValue('phone'));
						$model->setName($form->getValue('name'));
						$model->setCID_Passport($form->getValue('cid_passport'));
						$model->setNation_Id($form->getValue('nation_id'));
						$result = $model->CustomerAccount_update();
						
						if($result)
							$this->_redirect("/admin/customer/index");
						else{
		
						}
					}
					else{
							
					}
				}
				else{
					
				}
			}
		}
		else{
			$id = $this->getRequest()->getParam('id',null);
			
		
			$model->CustomerAccount_getById($id);
			$a = array(
					'id'=> $model->getId(),
					'username'=>$model->getUser_Name(),
						
					'phone'=>$model->getPhone(),
					'name'=>$model->getName(),
					'nation_id'=>$model->getNation_Id(),
					'email'=>$model->getEmail(),
					'cid_passport'=>$model->getCID_Passport()
			
			);
				
			$form->populate($a);
		}
		
		$this->view->form = $form;
		$this->view->title="Quản lý tài khoản";
		$this->view->intro="Chỉnh sửa tài khoản";
	}
	public function addAction(){
		$form = new Admin_Form_AddCustomerForm();
		//print_r($form->);
		if ($this->getRequest()->isPost()){
			if ($form->isValid($_POST)){
				$model = new Admin_Model_CustomerAccount();
				$result = $model->CustomerAccount_insert($form->getValue("username"),
						$form->getValue("password"),
						$form->getValue("email"),
						$form->getValue("cid_passport"),
						$form->getValue("nation_id"),
						$form->getValue("phone"),
						$form->getValue("name"));
				if ($result>0){
					$this->_redirect("/admin/customer/index");
				}
			}
		}
		
		$this->view->form = $form;
		$this->view->title="Quản lý tài khoản người dùng";
		$this->view->intro="Thêm tài khoản mới";
	}
	public function delAction(){
		$id = $this->getRequest()->getParam('id',null);
		$model = new Admin_Model_CustomerAccount();
		$result = $model->CustomerAccount_delete($id);
		if($result>0)
			$this->_redirect("/admin/customer/index");
	}
}

?>
