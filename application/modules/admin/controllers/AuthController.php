<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author Zelic
 */
class Admin_AuthController extends Benly_AdminController {

    public function init() {
        parent::init();
        $option = array('layout' => 'login', 'layoutPath' => APPLICATION_PATH . "/modules/admin/layouts/scripts/");
        Zend_Layout::startMvc($option);
    }

    public function loginAction() {
        if ($this->_request->isPost()) {
            $db = Zend_Registry::get("db");
            
            $auth = Zend_Auth::getInstance();

            $authAdapter = new Zend_Auth_Adapter_DbTable($db, "system_account", "username", "password");
            
            $username = $this->_request->getParam('username');
            $password = $this->_request->getParam('password');
            $authAdapter->setIdentity($username);
            $authAdapter->setCredential(sha1(md5($password.'system')));
            
            $result = $auth->authenticate($authAdapter);
            if ($result->isValid()){
                $data = $authAdapter->getResultRowObject(null, array('password'));
                $auth->getStorage()->write($data);
                $_SESSION['type'] = 'system';
                $this->_redirect('/admin/index/index');
              
            }
        }
    }
    
    public function logoutAction(){
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect("/admin/index/index");
        $_SESSION['type'] = '';
        
    }

}

?>
