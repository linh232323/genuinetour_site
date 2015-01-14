<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddAccountForm
 *
 * @author Zelic
 */
class Admin_Form_AddAccountForm extends Zend_Form{
    public function init(){
        
        $this->setAction('/admin/account/add');
        $this->setMethod('post');
        
        $username=$this->createElement("text", "username");
        $username->setAttrib("class", "text-input small-input");
        $username->setLabel("Tên tài khoản");
        $this->addElement($username);
        
        $password=$this->createElement("password", "password");
        $password->setAttrib("class", "text-input small-input");
        $password->setLabel("Mật khẩu");
        $this->addElement($password);
        
        $repassword=$this->createElement("password", "repassword");
        $repassword->setAttrib("class", "text-input small-input");
        $repassword->setLabel("Nhập lại mật khẩu");
        $this->addElement($repassword);
        
        $email=$this->createElement("text", "email");
        $email->setAttrib("class", "text-input small-input");
        $email->setLabel("Email");
        $this->addElement($email);
        
        $submit=$this->createElement("submit", "save");
        $submit->setLabel("Thêm tài khoản");
        $submit->setAttrib("class","button");
        $this->addElement($submit);
    }
    
}

?>
