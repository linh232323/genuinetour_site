<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OrderController
 *
 * @author Zelic
 */
class Admin_OrderController extends Benly_AdminController{
	public function init(){
		parent::init();
	}
	public function indexAction(){
		$model = new Admin_Model_Order();
		
		$this->view->orders = $model->Order_listall();
		$this->view->title="Quản lý hóa đơn";
		$this->view->intro="Danh sách hóa đơn";
	}
	
	public function deleteAction(){
		
	}
}

?>
