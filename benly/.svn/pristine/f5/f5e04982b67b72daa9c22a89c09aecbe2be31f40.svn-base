<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostController
 *
 * @author Zelic
 */
class Admin_PostController extends Benly_AdminController {

    public function init() {
        parent::init();
    }

    public function indexAction() {
        $model = new Admin_Model_Post();
        $paginator = Zend_Paginator::factory($model->Post_listall());
        $paginator->setItemCountPerPage(20);
        $paginator->setPageRange(3);
        $currentPage = $this->_request->getParam('page',1);
        $paginator->setCurrentPageNumber($currentPage);
        $this->view->posts = $paginator;
        $this->view->title = "Quản lý nội dung";
        $this->view->intro = "Danh sách bài viết";
    }

    public function addAction() {
        $form = new Admin_Form_AddPostForm();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $dateFormat = "Y-m-d H:i:s";
                //$upload = new Admin_Form_File_UploadFile;
               // $files = $upload->upload->getFileInfo();
                //$fileName = "";
                $user = Zend_Auth::getInstance()->getStorage()->read();
                //print_r($user);
                //foreach ($files as $file => $info) {
                  //  if (!$upload->upload->isUploaded($file)) {
                    //    echo "Chưa chọn file";
                    //} else {
                      //  $fileName = 'http://'.$_SERVER['HTTP_HOST'] . '/upload/' . $info['name'];
                    //}
                //}
                //$upload->upload->receive();


                $model = new Admin_Model_Post();
                $result = $model->Post_insert(
                		$form->getValue("title"),
                		 $form->getValue("content"), 
                		$form->getValue("thumbnail_url"), 
                		date($dateFormat),
                		 date($dateFormat), 
                		$user->id,
                		$form->getValue("post_cat_id"),
						$form->getValue("description"));
                if ($result) {
                    $this->_redirect("/admin/post/index");
                }
            }
        } else {

            $this->view->form = $form;
            $this->view->title = "Quản lý nội dung";
            $this->view->intro = "Thêm bài viết mới";
        }
    }

    public function editAction() {
        $id = $this->_request->getParam('id');
        $form = new Admin_Form_EditPostForm();
        $model = new Admin_Model_Post();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $dateFormat = "Y-m-d H:i:s";
               // $upload = new Admin_Form_File_UploadFile;
               // $files = $upload->upload->getFileInfo();
                //$fileName = "";
                $user = Zend_Auth::getInstance()->getStorage()->read();

                //foreach ($files as $file => $info) {
               //     if (!$upload->upload->isUploaded($file)) {
                //        echo "Chưa chọn file";
                //    } else {
                //        $fileName = 'http://'.$_SERVER['HTTP_HOST'] . '/upload/' . $info['name'];
                //    }
                //}
               // $upload->upload->receive();
                
                $model->setId($form->getValue("id"));
                $model->setTitle($form->getValue("title"));
                $model->setUser_Id($user->id);
                //if ($fileName!=""){
                //    $model->setThumbnail_Url($fileName);
                //}
                $model->setThumbnail_Url($form->getValue("thumbnail_url"));
                $model->setContent($form->getValue("content"));
				$model->setPost_Cat_Id($form->getValue("post_cat_id"));
				$model->setDescription($form->getValue("description"));
                $result=$model->Post_update();
                if ($result) {
                    $this->_redirect("/admin/post/index");
                }
            }
        } else {
            $post = $model->Post_getById($id);
            if ($post != null) {
                $form->populate($post);
            }
            $this->view->form = $form;
            $this->view->title = "Quản lý nội dung";
            $this->view->intro = "Cập nhật bài viết";
        }
    }
    public function delAction(){
    	$id=$this->_request->getParam("id");
    	$model = new Admin_Model_Post();
    	$result = $model->Post_delete($id);
    	if ($result){
    		$this->_redirect('/admin/post/index');
    	} else {
    		$this->view->error = "Không thể xóa bài viết!";
    	}
    }

}

?>
