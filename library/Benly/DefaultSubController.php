<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DefaultSubController
 *
 * @author Zelic
 */
class Benly_DefaultSubController extends Zend_Controller_Action {
    public function init(){
        $module = $this->_request->getModuleName();
        $this->view->module = $module;
        $baseUrl = Zend_Controller_Front::getInstance()->getBaseUrl();
        $this->view->baseUrl = $baseUrl;
        $option = array("layout"=>"sub", "layoutPath"=>APPLICATION_PATH."/modules/default/layouts/scripts", "module"=>"default");
        Zend_Layout::startMvc($option);
    }
}

?>
