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
class Admin_AccountController extends Benly_AdminController{
    public function init(){
        parent::init();
    }
    
    public function indexAction(){
        $model = new Admin_Model_SystemAccount();
       // print_r($model->SystemAccount_getByUsername("linh"));
        $this->view->accounts = $model->SystemAccount_listall();
        $this->view->title="Quản lý tài khoản";
        $this->view->intro="Danh sách tài khoản";
    }
    
    
    public function addAction(){
        $form = new Admin_Form_AddAccountForm();
        //print_r($form->);
        if ($this->getRequest()->isPost()){
            if ($form->isValid($_POST)){
                $model = new Admin_Model_SystemAccount();
                $result = $model->SystemAccount_insert($form->getValue("username"), 
                        $form->getValue("password"), 
                        $form->getValue("email"));
                if ($result>0){
                    $this->_redirect("/admin/account/index");
                }
            }
        }
        
        $this->view->form = $form;
        $this->view->title="Quản lý tài khoản";
        $this->view->intro="Thêm tài khoản mới";
    }
    
    public function editAction(){
    	$form = new Admin_Form_EditAccountForm();
    	$model = new Admin_Model_SystemAccount();
		if ($this->getRequest()->isPost()){
			if ($form->isValid($_POST)){
					$model->SystemAccount_getById($form->getValue("id"));
					$model->setUser_Name($form->getValue("username"));
					$password = $form->getValue('password');
					$repassword = $form->getValue("repassword");
					if($password == $repassword ){
						if($password != "")
						{
							$model->setPassword($password);
							$model->setEmail($form->getValue('email'));
							$result = $model->SystemAccount_update();
							if($result)
								$this->_redirect("/admin/account/index");
							else{
								
							}
						}
						else{
							
						}
						//$model = new Admin_Model_TourCategory();
						//$result = $model->TourCategory_insert($form->getValue("name"),
						//		$form->getValue("name_en"));
						//if ($result){
						//	$this->_redirect("/admin/tourcategory/index");
						//}
				}
				else{
					//$validator = $form->addElement("text","validator");
					//$validator->setAttrib("readonly","readonly" );
					//$validator->setAttrib("value","Kiểm tra mật khẩu nhập lại chưa đúng");
					//$form->addElement($validator);
				}
			}
		}
		else{
			$id = $this->getRequest()->getParam('id',null);
			
			
			$model->SystemAccount_getById($id);
		
			$a = array(
					'id'=> $model->getId(),
					'username'=>$model->getUser_Name(),
					'email'=>$model->getEmail()
			
			);
				
			$form->populate($a);
		}
	
		$this->view->form = $form;
		$this->view->title="Quản lý tài khoản";
		$this->view->intro="Chỉnh sửa tài khoản";
    }
    
    public function delAction(){
		 $id = $this->getRequest()->getParam('id',null);
		 $model = new Admin_Model_SystemAccount();
		 $result = $model->SystemAccount_delete($id);
		 if($result > 0)
		 	$this->_redirect("/admin/account/index");
		 else 
		 	 $this->view->error = "Không thể xóa !!!";
    }

    
}

?>
