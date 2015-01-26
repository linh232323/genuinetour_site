<?php

class Default_IndexController extends Benly_DefaultController {

    public function init() {
        parent::init();
    }

    public function domesticAction() {
        
    }

    public function langAction() {
        if ($this->_request->isGet()) {
            $lang = $this->_request->getQuery("lang");
            $sslang = new Zend_Session_Namespace("service");
            $sslang->lang = $lang;
        }
        $this->_helper->layout()->disableLayout();
    }

    public function abroadAction() {
        
    }

    public function specialAction() {
        
    }

    public function underAction() {
        
    }

    public function indexAction() {
        $model = new Default_Model_TourIntro;
        $tours1 = $model->TourIntro_getByTourSection(10, false, 8);
        $this->view->tours1 = $tours1;

        $tours2 = $model->TourIntro_getByTourSection(11, false, 8);
        $this->view->tours2 = $tours2;
    }

    public function detailAction() {
        $id = $this->_request->getParam("id");
        $model = new Default_Model_TourIntro;
        $tour = $model->load($id);
        $this->view->tour = $tour;
    }

    public function listAction() {
        
    }

    public function searchAction() {

        $tour = $this->getRequest()->getParam("tour_name", null);
        $return_transport = $this->getRequest()->getParam("return_transport", null);
        $outward_transport = $this->getRequest()->getParam("outward_transport", null);
        $during = $this->getRequest()->getParam("during", null);

        $model = new Default_Model_TourIntro;

        $tours = $model->TourIntro_search($tour, $outward_transport, $return_transport, $during);

        $this->view->tours = $tours;
    }

}
