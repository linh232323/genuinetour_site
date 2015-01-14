<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DefaultAuthController
 *
 * @author Zelic
 */
class Benly_DefaultAuthController extends Benly_DefaultParentController{
    public function preDispatch(){    	    	
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()){
            if ($this->_request->getActionName()!="login"){
                $this->_redirect("/default/auth/login");
            }
        }
    }    
    public function init(){
         parent::init();
        
        $user = Zend_Auth::getInstance()->getIdentity();
        if ($user != null) {
        	$this->view->username = $user->username;
        }
    }
}

?>
