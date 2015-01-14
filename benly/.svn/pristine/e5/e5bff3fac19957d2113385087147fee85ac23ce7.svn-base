<?php



class Form_Search extends Zend_Form {
	function init()
	{
		$this->setAction('')->setMethod('post');
		$tourname = $this->createElement('text', 'tourname');
		$place = $this->createElement('select','place',array(
				'label'=>'Địa điểm',
				'multioptions'=>array(
						'1'=>'Việt Nam',
						'2'=>'Campuchia'
						)));
		$submit = $this->createElement('submit','submit',array('label'=>'Search'));
		$this->addElement($tourname)
				->addElement($place)
				->addElement($submit);
	}
}

?>