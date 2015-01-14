<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UploadFile
 *
 * @author Zelic
 */
class Admin_Form_File_UploadFile {
    public $upload;
    public function __construct(){
        $this->upload = new Zend_File_Transfer;
        $this->upload->setDestination($_SERVER['DOCUMENT_ROOT'].'/upload/');
    }
}

?>
