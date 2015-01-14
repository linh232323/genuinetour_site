<?php

class Admin_TourPriceController extends Benly_AdminController {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $model = new Admin_Model_TourPrice();
        $this->view->accounts = $model->TourPrice_listall();
        $this->view->title = "Quản lý giá Tour";
        $this->view->intro = "Giá Tour";
    }

    public function addAction() {
        $form = new Admin_Form_AddTourPriceForm();
        $tour_id = $this->getRequest()->getParam('id',null);
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $model = new Admin_Model_TourPrice();
                $result = $model->TourPrice_insert($form->getValue("tour_id"), $form->getValue("tour_cat_id"), $form->getValue("price"), $form->getValue("surcharge"), $form->getValue("foreign_charge"));
                if ($result) {
                    //$this->_redirect("/admin/tour-price/index");
                    $this->_redirect("/admin/tour/detail/id/".$form->getValue("tour_id"));
                }
            }
        } else {
        	if(isset($tour_id)){
        		$data = array('tour_id'=>$tour_id);
        		$form->populate($data);        		
        	}
            $this->view->form = $form;
            
            $this->view->title = "Thêm giá Tour";
            $this->view->intro = "Giá Tour";
        }
    }

    public function editAction() {
        $tour_id = $this->getRequest()->getParam('id');
        $tour_cat_id = $this->getRequest()->getParam('cat');
        $model = new Admin_Model_TourPrice();
        $form = new Admin_Form_EditTourPriceForm();

        
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $model->setTour_Id($form->getValue('tour_id'));
                $model->setTour_Cat_Id($form->getValue('tour_cat_id'));
                $model->setPrice($form->getValue("price"));
                $model->setForeign_Charge($form->getValue("foreign_charge"));
                $model->setSurcharge($form->getValue("surcharge"));
                $result = $model->TourPrice_update();
                if ($result>0){
                    $this->_redirect("/admin/tour/detail/id/".$form->getValue('tour_id'));
                }
            }
        } else {
            $data = $model->TourPrice_getByTour_Id_And_Tour_Cat_ID($tour_id, $tour_cat_id);
            $form->populate($data);
            $this->view->form = $form;
            $this->view->title = "Giá Tour";
            $this->view->intro = "Chỉnh sửa giá Tour";
        }
    }

    public function delAction() {
        $tour_id = $this->_request->getParam("id");
        $tour_cat_id = $this->_request->getParam("cat");
        $model = new Admin_Model_TourPrice();
        $result = $model->TourPrice_delete($tour_id, $tour_cat_id);
        if ($result>0){
            $this->_redirect("/admin/tour-price/index");
        } else {
            $this->view->error = "Không thể xóa giá tour này được.";
        }
    }

}

?>