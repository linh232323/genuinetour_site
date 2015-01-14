<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TourSectionController
 *
 * @author Zelic
 */
class Admin_TourSectionController extends Benly_AdminController {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $model = new Admin_Model_TourSection();
        $this->view->sections = $model->TourSection_listall();
        $this->view->title = "Phân loại tour";
        $this->view->intro = "Danh sách phân loại tour";
    }

    public function addAction() {
        $form = new Admin_Form_AddTourSectionForm();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $model = new Admin_Model_TourSection();
                $result = $model->TourSection_insert($form->getValue("name"), $form->getValue("name_en"));
                if ($result > 0) {
                    $this->_redirect("/admin/tour-section/index");
                }
                
            }
        }

        $this->view->form = $form;
        $this->view->title = "Phân loại tour";
        $this->view->intro = "Thêm phân loại tour";
    }

    public function editAction() {
        $id = $this->_request->getParam("id");
        $form = new Admin_Form_EditTourSectionForm();
        $model = new Admin_Model_TourSection();
        if ($this->_request->isPost()) {
            if ($form->isValid($_POST)) {
                $model->setId($form->getValue("id"));
                $model->setName($form->getValue("name"));
                $model->setName_En($form->getValue("name_en"));
                
                $result = $model->TourSection_update();
                if ($result > 0) {
                    $this->_redirect("/admin/tour-section/index");
                } else {
                }
            }
        } else {
            $data = $model->TourSection_getById($id);
            $form->populate($data);
            $this->view->form = $form;
            $this->view->title = "Phân loại tour";
            $this->view->intro = "Sửa phân loại tour";
        }
    }
    
    public function delAction(){
        $id = $this->_request->getParam("id");
        $model = new Admin_Model_TourSection();
        $result = $model->TourSection_delete($id);
        if ($result>0){
            $this->_redirect("/admin/tour-section/index");
        } else {
            $this->view->error = "Cannot delete this tour section";
        }
    }

}

?>
