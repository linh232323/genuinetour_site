<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TourSchedule
 *
 * @author Zelic
 */
class Admin_TourScheduleController extends Benly_AdminController {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $model = new Admin_Model_TourSchedule();
        $schedule = $model->TourSchedule_listall();
        $this->view->schedule = $schedule;
        $this->view->title = "Quản lý lịch trình tour";
        $this->view->intro = "Danh sách lịch trình";
    }

    public function addAction() {
        $form = new Admin_Form_AddTourScheduleForm();
        $model = new Admin_Model_TourSchedule();
        $tour_id = $this->getRequest()->getParam('id',null);
        if ($this->_request->isPost()) {
            if ($form->isValid($_POST)) {
            	$schedules =explode(",",$form->getValue("start_date"));
            	foreach($schedules as $day)
                	$result = $model->TourSchedule_insert($form->getValue("tour_id"), date("Y-m-d H:i:s", strtotime($day)));
                if ($result > 0) {
                    $this->_redirect("/admin/tour/detail/id/".$form->getValue('tour_id'));
                } else {
                    $this->view->error = "Cannot add tour schedule";
                }
            }
        }
         if(isset($tour_id)){
        		$data = array('tour_id'=>$tour_id);
        		$form->populate($data);
        	}
            $this->view->form = $form;
            $this->view->title = "Quản lý lịch trình tour";
            $this->view->intro = "Thêm lịch trình";
    }

    public function editAction() {
        $id = $this->_request->getParam("id");
        $form = new Admin_Form_EditTourScheduleForm();
        $model = new Admin_Model_TourSchedule();
        if ($this->_request->isPost()) {
            if ($form->isValid($_POST)) {
                $model->setId($form->getValue("id"));
                $model->setTour_Id($form->getValue("tour_id"));
                $model->setStart_Date(date("Y-m-d H:i:s", strtotime($form->getValue("start_date"))));
                $result = $model->TourSchedule_update();
                if ($result > 0) {
                    $this->_redirect("/admin/tour/detail/id/".$form->getValue('tour_id'));
                } else {
                    $this->view->error = "Cannot edit tour schedule";
                }
            }
        } else {
            $data = $model->TourSchedule_getById($id);
            $data['start_date']=date("d-m-Y", strtotime($data['start_date']));
            $form->populate($data);
            $this->view->form = $form;
            $this->view->title = "Quản lý lịch trình tour";
            $this->view->intro = "Sửa lịch trình";
        }
    }

    public function delAction() {
        $id = $this->_request->getParam("id");
        $model = new Admin_Model_TourSchedule();
        $result = $model->TourSchedule_delete($id);
        if ($result > 0) {
            $this->_redirect("/admin/tour-schedule/index");
        } else {
            $this->view->error = "Cannot delete tour schedule";
        }
    }

}

?>
