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
class Admin_Form_EditAccountForm extends Zend_Form{
    public function init(){
        
        $this->setAction('/admin/account/edit');
        $this->setMethod('post');
        
        $id = $this->createElement("hidden","id");
        $this->addElement($id);
        
        $username=$this->createElement("text", "username");
        $username->setAttrib("class", "text-input small-input");
        $username->setLabel("Tên tài khoản");
        $username->setRequired(true);
        $this->addElement($username);
        
        $password=$this->createElement("password", "password");
        $password->setAttrib("class", "text-input small-input");
        $password->setLabel("Mật khẩu");
        $password->setRequired(true);
        $this->addElement($password);
        
        $repassword=$this->createElement("password", "repassword");
        $repassword->setAttrib("class", "text-input small-input");
        $repassword->setLabel("Nhập lại mật khẩu");
        $repassword->setRequired(true);
        $this->addElement($repassword);
        
        $email=$this->createElement("text", "email");
        $email->setAttrib("class", "text-input small-input");
        $email->setLabel("Email");
        $email->setRequired(true);
        $this->addElement($email);
        
        $submit=$this->createElement("submit", "save");
        $submit->setLabel("Lưu");
        $submit->setAttrib("class","button");
       
        $this->addElement($submit);
    }
    
}

?>
