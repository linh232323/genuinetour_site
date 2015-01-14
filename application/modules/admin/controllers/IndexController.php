<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 *
 * @author Zelic
 */
class Admin_IndexController extends Benly_AdminController{
    public function init() {
        parent::init();
    }
    
    public function indexAction(){
        $this->view->generalCurrent = "current";
        $this->view->title = "Benly - Khu vực quản trị";
        $this->view->intro = "Giới thiệu";
                
    }
}

?>
