<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CoreController
 *
 * @author Zelic
 */
class Benly_AdminController extends Zend_Controller_Action {

    public function preDispatch() {
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity() && isset($_SESSION['type']) && $_SESSION['type'] == "system") {
            if ($this->_request->getActionName() != 'login') {
                $this->_redirect('/admin/auth/login');
            }
        }
    }

    public function init() {
        $module = $this->_request->getModuleName();
        $this->view->module = $module;
        $baseUrl = Zend_Controller_Front::getInstance()->getBaseUrl();
        $this->view->baseUrl = $baseUrl;
        $option = array("layout" => "index", "layoutPath" => APPLICATION_PATH . "/modules/admin/layouts/scripts", "module" => "default");
        Zend_Layout::startMvc($option);
        $user = Zend_Auth::getInstance()->getIdentity();
        if ($user != null   ){
            $this->view->username = $user->username;
        }
    }

}

?>
