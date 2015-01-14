<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login_Form
 *
 * @author Zin
 */
class Form_Login extends Zend_Form {
    //put your code here
     public function init()
    {
       $this->setAction ( '' )
          ->setMethod ( 'post' );
      
      // Create and configure username element:
      $username = $this->createElement ( 'text', 'username',array('label'=>'Username:') );
      $username->addValidator ( 'alnum' )
            ->addValidator ( 'regex', false, array ('/^[a-z]+/' ) )
            ->addValidator ( 'stringLength', false, array (6, 20 ) )
            ->setRequired ( true )
            ->addFilter ( 'StringToLower' );
      
      // Create and configure password element:
      $password = $this->createElement ( 'password','password',array('label'=>'Password:') );
      $password->addValidator ( 'StringLength', false, array (6 ) )
             ->setRequired ( true );
      
      $submit = $this->createElement('submit','login',array ('label' => 'Login' ));
      // Add elements to form:
      $this->addElement ( $username )
           ->addElement ( $password )           
           ->addElement($submit);
    }
}

?>
