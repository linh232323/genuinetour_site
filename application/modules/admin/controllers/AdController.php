<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccountController
 *
 * @author Zelic
 */
class Admin_AdController extends Benly_AdminController{
    public function init(){
        parent::init();
    }
	public function manageAction(){
        $this->view->title="Quản lý tài khoản";
        $this->view->intro="Danh sách tài khoản";
		$csvfile = APPLICATION_PATH . "/configs/lang_vi.csv"; 
		$f = fopen($csvfile, "r"); 
		while ($r = fgetcsv($f)) { 
		$arraycsv[] = $r; 
		} 
		$this->view->arraycsv=$arraycsv;
		fclose($f); 
	}
	public function saveAction(){
		$csvfile = APPLICATION_PATH . "/configs/lang_vi.csv"; 		
		$csvfile2 = APPLICATION_PATH . "/configs/lang_vi.csv"; 		
		$f = fopen($csvfile, "r"); 
		while ($r = fgetcsv($f)) { 
		$arraycsv[] = $r; 
		}
		$this->view->arraycsv=$arraycsv;			
		for ($row = 0; $row < count ($arraycsv); $row++)
		{
			$rowArray = $_POST[$row]; 
			if(!empty($rowArray)){
			$arraycsv[$row][1] = "$rowArray";
			}
		}
		$f2 = fopen($csvfile2, "w+"); 
		foreach ($arraycsv as $v) { 
		fputcsv($f2,$v); 
		} 
		fclose($f); 
		fclose($f2);    
        $this->redirect('/admin/ad/manage/');
	}
	
}

?>
