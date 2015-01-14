<?php
class Default_TourController extends Benly_DefaultController{
	public function init() {
		parent::init();
	}
	public function listAction(){
		$tour_section = $this->_request->getParam("tour-section");
		$model = new Default_Model_TourIntro();
		$data = $model->TourIntro_getByTourSection($tour_section,true);
		$model_toursection= new Default_Model_TourSection();
		$data2  = $model_toursection->TourSection_getById($tour_section);
		
		
		$adapter = new Zend_Paginator_Adapter_DbSelect($data);
		$paginator = new Zend_Paginator($adapter);
		$paginator->setItemCountPerPage(20);
		$paginator->setPageRange(3);
		$currentPage = $this->_request->getParam('page',1);
		$paginator->setCurrentPageNumber($currentPage);
		
		$this->view->title = $data2;
		$this->view->tours= $paginator;
	}
	public function priceAction(){
		$tour_section = $this->_request->getParam("tour-sec");
		$model = new Default_Model_TourIntro();
		$data = $model->TourIntro_getByTourSection($tour_section);
		$model_toursection= new Default_Model_TourSection();
		$data2  = $model_toursection->TourSection_getById($tour_section);
		
		$adapter = new Zend_Paginator_Adapter_DbSelect($data);
		$paginator = new Zend_Paginator($adapter);
		$paginator->setItemCountPerPage(20);
		$paginator->setPageRange(3);
		$currentPage = $this->_request->getParam('page',1);
		$paginator->setCurrentPageNumber($currentPage);
		
		$this->view->title = $data2;
		$this->view->tours= $paginator;
	}
	public function scheduleAction(){
		$tour_section = $this->_request->getParam("tour-sec");
		$model = new Default_Model_TourIntro();
		$data = $model->TourIntro_getByTourSection($tour_section);
		$model_toursection= new Default_Model_TourSection();
		$data2  = $model_toursection->TourSection_getById($tour_section);
		
		$adapter = new Zend_Paginator_Adapter_DbSelect($data);
		$paginator = new Zend_Paginator($adapter);
		$paginator->setItemCountPerPage(10);
		$paginator->setPageRange(3);
		$currentPage = $this->_request->getParam('page',1);
		$paginator->setCurrentPageNumber($currentPage);
		
		$this->view->title = $data2;
		$this->view->tours= $paginator;
	}
	
}

?>