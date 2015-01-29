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
class Admin_MenuController extends Benly_AdminController{
    public function init(){
        parent::init();
    }
    public function indexAction(){
        $this->view->title = "Menu";
        $this->view->intro = "Giới thiệu";
        $menu = new Admin_Model_Menu ();
	$this->view->menulist = $menuItems = $menu -> listAll();
    }
    public function editAction(){
		
		$model = new Admin_Model_Menu();
		$form = new Admin_Form_EditMenuForm();
		if ($this->getRequest()->isPost()){
			if ($form->isValid($_POST)){
				
				$model->Menu_getById($form->getValue("id"));
				$model->setName($form->getValue("name_vi"));
				$model->setName_En($form->getValue("name_en"));
		
				$result = $model->Menu_update();
				if($result>0)
					$this->_redirect("/admin/menu/index");
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
			$model->Menu_getById($id);
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
		$model = new Admin_Model_Menu();
		$result = $model->Menu_delete($id);
		if($result>0)
			$this->_redirect("/admin/menu/index");
		else
			$this->view->error = "Không thể xóa !!!";
	}
    }

?>
