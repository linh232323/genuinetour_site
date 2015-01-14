<?php



class Default_Form_SearchForm extends Zend_Form {
	function init()
	{
		$this->setAction('');
		$this->setMethod('post');
		
		$tourname = $this->createElement('text', 'tourname');
		$tourname->addLabel('Tên tour');
		$tourname->setRequire(true);
		$this->addElement($tourname);
		
		
		//$place = $this->createElement('select','place',array(
		//		'label'=>'Địa điểm',
		//		'multioptions'=>array(
		//				'1'=>'Việt Nam',
		//				'2'=>'Campuchia'
		//				)));
		
		$outward_transport_list = new Default_Model_Transport();
		$data = $outward_transport_list->Transport_listall();


		$_outward_transport = $this->createElement("select", "outward_transport");
		foreach($data as $item){
			$_outward_transport->addMultiOption($item['id'],$item['name']);
		}
		$_outward_transport->setAttrib("class", "text-input small-input");
		$_outward_transport->setLabel("Phương tiện đi");
		//$this->addElement($_outward_transport);
		
		$_return_transport = $this->createElement("select", "return_transport");
		foreach($data as $item){
			$_return_transport->addMultiOption($item['id'],$item['name']);
		}
		$_return_transport->setAttrib("class", "text-input small-input");
		$_return_transport->setLabel("Phương tiện về");
		//$this->addElement($_return_transport);
		
		$submit = $this->createElement('submit','save',array('label'=>'Tìm'));
		$this->addElement($submit);
	}
}

?>