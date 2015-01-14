<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthController
 *
 * @author Zelic
 */
class Default_AuthController extends Benly_DefaultAuthController {

    public function init() {
        parent::init();
    }

    public function loginAction() {
        if ($this->_request->isPost()) {
            $db = Zend_Registry::get("db");

            $auth = Zend_Auth::getInstance();

            $authAdapter = new Zend_Auth_Adapter_DbTable($db, "customer_account", "username", "password");

            $username = $this->_request->getParam('username');
            //$password = $this->_request->getParam('password');
            $password= "123";

            $authAdapter->setIdentity($username);
            $authAdapter->setCredential(sha1(md5($password.'user')));

            $result = $auth->authenticate($authAdapter);
            if ($result->isValid()) {
                $data = $authAdapter->getResultRowObject(null, array('password'));
                $auth->getStorage()->write($data);
                $this->_redirect('/account/list');
            } else {
                $this->view->error = "Mã đơn hàng không tồn tại!";
            }
        }
    }

    public function logoutAction() {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect("/");
    }

}

?>
