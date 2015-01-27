<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccountController
 *
 * @author Zelic
 */
class Default_AccountController extends Benly_DefaultAuthController {

    public function init() {
        parent::init();
    }
    public function detailAction(){
    	$id = $this->_request->getParam("id",null);
    	if(isset($id)){
	    	$model = new Default_Model_Order();
	    	$order = $model->load($id);
	    	$this->view->order = $order;
    	}
    }
    public function listAction(){
    	$username = $this->view->username ;
    	$model = new Default_Model_CustomerAccount();
    	$customer = $model->CustomerAccount_getByUsername($username);
    	$model = new Default_Model_Order();
    	if(isset($customer)){
	    	$data = $model->Order_getByCustomerId($customer['id']);	
	    	if(count($data) > 0){
	    		//print_r($data);
	    		
		    	$adapter = new Zend_Paginator_Adapter_DbSelect($data);
				$paginator = new Zend_Paginator($adapter);
				$paginator->setItemCountPerPage(20);
				$paginator->setPageRange(3);
				$currentPage = $this->_request->getParam('page',1);
				$paginator->setCurrentPageNumber($currentPage);
		    	    	
		    	$this->view->orders = $paginator;
	    	}
    	}
    }

    public function registerAction() {
        $form = new Admin_Form_AddCustomerForm();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $model = new Admin_Model_CustomerAccount();
                $result = $model->CustomerAccount_insert(
                        $form->getValue("username"), 
                        $form->getValue("password"), 
                        $form->getValue("email"),
                        $form->getValue("cid_passport"),
                        $form->getValue("nation_id"),
                        $form->getValue("phone"),
                        $form->getValue("name"));
                if ($result > 0) {
                    $this->_redirect("/auth/login");
                }
                else {
                    $this->view->error = "Không thể tạo tài khoản";
                }
            }
        }
    }

}

?>
