<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TourController
 *
 * @author Zelic
 */
class Admin_TourController extends Benly_AdminController {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $model = new Admin_Model_TourIntro();
        $paginator = Zend_Paginator::factory( $model->TourIntro_listall());
        $paginator->setItemCountPerPage(10);
        $paginator->setPageRange(3);
        $currentPage = $this->_request->getParam('page',1);
        $paginator->setCurrentPageNumber($currentPage);
        
        $this->view->tours = $paginator;
        $this->view->title = "Quản lý Tour";
        $this->view->intro = "Danh sách các Tour";
    }

    public function addAction() {
        $form = new Admin_Form_AddTourIntroForm();
        $model = new Admin_Model_TourIntro();

        if ($this->_request->isPost()) {
            if ($form->isValid($_POST)) {
            	print_r($form->getValue("name"));

               // $upload = new Admin_Form_File_UploadFile();
               // $files = $upload->upload->getFileInfo();
               // $fileName = "";

               // foreach ($files as $file => $info) {
               //     if (!$upload->upload->isUploaded($file)) {
               //         $fileName = 'http://'.$_SERVER['HTTP_HOST'] . '/upload/' . $info['name'];
               //     }
              //  }

             //   $upload->upload->receive();

                $result = $model->TourIntro_insert(
                        $form->getValue("outward_transport"),
                		$form->getValue("return_transport"),
                		$form->getValue("post_intro"),
                		$form->getValue("post_intro_en"),
                		$form->getValue("program"),
                		$form->getValue("program_en"),
                		$form->getValue("name"),
                		$form->getValue("name_en"), 
                		$form->getValue("during"), 
                		$form->getValue("during_en"), 
                		$form->getValue("appendix"), 
                		$form->getValue("appendix_en"), 
                		$form->getValue("tour_section_id"), 
                		$form->getValue("thumbnail_url"),
                		$form->getValue("price"),
                		$form->getValue("code"));
		
                if ($result>0) {
                    $this->_redirect("/admin/tour/detail/id/".$model->lastId);
                }
            }
        } else {
           
            $this->view->title = "Quản lý Tour";
            $this->view->intro = "Thêm Tour mới";
        }
        $this->view->form = $form;
    }

    public function editAction() {
        $id = $this->_request->getParam("id");
        $model = new Admin_Model_TourIntro();
        $form = new Admin_Form_EditTourIntroForm();
        
        if ($this->_request->isPost()) {
            if ($form->isValid($_POST)){
              //  $upload = new Admin_Form_File_UploadFile();
              //  $files = $upload->upload->getFileInfo();
              //  $fileName = "";

             //   foreach ($files as $file => $info) {
             //       if ($upload->upload->isUploaded($file)) {
             //           $fileName = 'http://'.$_SERVER['HTTP_HOST'] . '/upload/' . $info['name'];
            //        }
            //    }

            //    $upload->upload->receive();

                $model->setId($form->getValue('id'));
                $model->setName($form->getValue('name'));
                $model->setName_En($form->getValue('name_en'));
                $model->setProgram($form->getValue('program'));
                $model->setProgram_En($form->getValue('program_en'));
                $model->setPost_Intro($form->getValue('post_intro'));
                $model->setPost_Intro_En($form->getValue('post_intro_en'));
                $model->setOutward_Transport($form->getValue('outward_transport'));
                $model->setReturn_Transport($form->getValue('return_transport'));
                $model->setDuring($form->getValue('during'));
                $model->setDuring_En($form->getValue('during_en'));
                $model->setAppendix($form->getValue('appendix'));
                $model->setAppendix_En($form->getValue('appendix_en'));
                $model->setTour_Section_Id($form->getValue('tour_section_id'));
                $model->setPrice($form->getValue('price'));
                $model->setCode($form->getValue('code'));
                $model->setThumnail_Url($form->getValue('thumbnail_url'));
//                print_r($model);
                
              //  if ($fileName!=''){
            //       $model->setThumnail_Url($fileName);
            //    }
                
                $result = $model->TourIntro_update();

                if ($result>0) {
                    $this->_redirect("/admin/tour/detail/id/".$form->getValue('id'));
                }
            }
        } else {
            $data = $model->TourIntro_getById($id);
            $form->setAction("/admin/tour/edit");
            $form->setMethod("POST");
            $form->populate($data);
            
            $this->view->title = "Quản lý Tour";
            $this->view->intro = "Sửa thông tin";
        }
        $this->view->form = $form;
    }
    public function detailAction(){
    	$id=$this->_request->getParam("id");
    	$model = new Admin_Model_TourIntro();
    	$data = $model->TourIntro_getById($id);
    	if(isset($data)){
    		$this->view->intro = "";//;
    		$this->view->title =$data['name'];
    		$this->view->tour_id = $data['id'];
    		
    		$model = new Admin_Model_TourPrice();
    		$this->view->tour_price = $model->TourPrice_getByTour($data['id']);
    		
    		$model = new Admin_Model_TourSchedule();
    		$this->view->tour_schedule = $model->TourSchedule_getByTourID_And_Time($data['id'],date ( "Y-m-d H:i:s" ));
    		
    		$model = new Admin_Model_TransportDetail();
    		$this->view->trans = $model->TransportDetail_getByTourId($data['id']);
    	}
    }
    public function delAction(){
        $id=$this->_request->getParam("id");
        $model = new Admin_Model_TourIntro();
        $result = $model->TourIntro_delete($id);
        if ($result){
            $this->_redirect('/admin/tour/index');
        } else {
            $this->view->error = "Không thể xóa tour!";
        }
    }

}

?>
