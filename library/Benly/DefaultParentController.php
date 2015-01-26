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
class Benly_DefaultParentController extends Zend_Controller_Action {

    public function preDispatch() {
   
    }

    public function init() {
        $module = $this->_request->getModuleName();
        if(!isset($_SESSION['lang'])){    
            $langConfig =  Benly_Support :: getLanguages("vi");
            
            $_SESSION['lang'] = $langConfig["code"];
        }
        
        $_SESSION['lang'] = "vi";
        $this->view->module = $module;
        $baseUrl = Zend_Controller_Front::getInstance()->getBaseUrl();
        $this->view->baseUrl = $baseUrl;
        $option = array("layout" => "index", "layoutPath" => APPLICATION_PATH . "/modules/default/layouts/scripts", "module" => "default");
        Zend_Layout::startMvc($option);
        $menu_data = new Default_Model_Menu();
        
        $this->view->lang =$_SESSION['lang'];
        $this->view->menu = Benly_Support :: renderMenu($menu_data->listAll(),"",0);
        $this->view->multilang = Benly_Support :: getLocalize($this->view->lang);
    }

}

?>
