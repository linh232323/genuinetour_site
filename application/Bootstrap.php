<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
    public function _initDatabase(){
        $db = $this->getPluginResource('db')->getDbAdapter();
        Zend_Registry::set('db', $db);
        Zend_Session::start();
    }
}

