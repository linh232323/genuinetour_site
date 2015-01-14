<?php
class Form_SignUp extends Zend_Form{
	function init()
	{
		$this->setAction('')->setMethod('post');
		$username = $this->createElement('text', 'username',array('label'=>'User name:'));
		$password = $this->createElement('password', 'password',array('label'=>'Password:'));
		$email = $this->createElement('text', 'email',array('label'=>'Email:'));
		$this->addElement($username)
			->addElement($password)
			->addElement($email);
		
	}
}
?>