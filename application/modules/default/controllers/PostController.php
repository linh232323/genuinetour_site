<?php
class Default_PostController extends Benly_DefaultController{
	public function init() {
		parent::init();
	}
	public function listAction(){
		$post_cat = $this->_request->getParam("post-cat");
		
		$model = new Default_Model_Post();
		
		$data = $model->Post_getByPostCat($post_cat);	
		$adapter = new Zend_Paginator_Adapter_DbSelect($data);
		$paginator = new Zend_Paginator($adapter);
		$paginator->setItemCountPerPage(3);
		$paginator->setPageRange(3);
		$currentPage = $this->_request->getParam('page',1);
		$paginator->setCurrentPageNumber($currentPage);
		$this->view->posts = $paginator;
	}
	public function detailAction(){
		$id = $this->_request->getParam("id");
		$model = new Default_Model_Post();
		$data = $model->Post_getById($id);
		$this->view->post = $data;
	}
}

?>