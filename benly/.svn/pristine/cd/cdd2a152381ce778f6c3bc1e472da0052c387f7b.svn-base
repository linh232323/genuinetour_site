<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TourCategoryController
 *
 * @author Zelic
 */
class Admin_TourCategoryController extends Benly_AdminController {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $model = new Admin_Model_TourCategory();
        $this->view->cates = $model->TourCategory_listall();
        $this->view->title = "Quản lý tiêu chuẩn Tour";
        $this->view->intro = "Danh sách tiêu chuẩn Tour";
    }

    public function addAction() {
        $form = new Admin_Form_AddTourCategoryForm();
        if ($this->_request->isPost()) {
            if ($form->isValid($_POST)) {
                $model = new Admin_Model_TourCategory();
                $result = $model->TourCategory_insert($form->getValue("tour_cat_name"), $form->getValue("tour_cat_name_en"));
                if ($result) {
                    $this->_redirect("/admin/tour-category/index");
                }
            }
        } else {
            $this->view->form = $form;
            $this->view->title = "Tiêu chuẩn Tour";
            $this->view->intro = "Thêm tiêu chuẩn Tour";
        }
    }

    public function editAction() {
        $id = $this->_request->getParam('id');

        $model = new Admin_Model_TourCategory();
        $form = new Admin_Form_EditTourCategoryForm();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $model->setId($form->getValue("id"));
                $model->setTour_Cat_Name($form->getValue("tour_cat_name"));
                $model->setTour_Cat_Name_En($form->getValue("tour_cat_name_en"));
                $result = $model->TourCategory_update();
                if ($result > 0) {
                    $this->_redirect("/admin/tour-category/index");
                } else {
                    $this->view->error = "Cannot update this tour category";
                }
            }
        } else {
            $data = $model->TourCategory_getById($id);
            $form->populate($data);
            $this->view->form = $form;
            $this->view->title = "Tieu chuẩn Tour";
            $this->view->intro = "Chỉnh sửa tiêu chuẩn Tour";
        }
    }

    public function deleteAction() {
        $id = $this->_request->getParam("id");
        $model = new Admin_Model_TourCategory();
        $result = $model->TourCategory_delete($id);
        if ($result > 0) {
            $this->redirect("/admin/tour-category/index");
        } else {
            $this->view->error = "Cannot delete this category";
        }
    }

}

?>
