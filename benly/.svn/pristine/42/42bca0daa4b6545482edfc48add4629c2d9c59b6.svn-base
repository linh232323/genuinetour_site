<?php
class Block_Contact extends Zend_View_Helper_Abstract {
	public function Contact()
	{
		$file_path = APPLICATION_PATH."/configs/Contact.json";
		$file_content = file_get_contents($file_path);
		$json_array = json_decode($file_content,true);
		
		$contact = "<div class='contacts'>";
	
		foreach($json_array["contacts"] as $v)
		{
				$contact.="<div><h2>".$v["namepart"]."</h2>";
				foreach($v["part"] as $item)
				{
					$contact.="<div>".$item["nickImg"]."</div>";
					
				}
				$contact.="</div>";
		}
		$contact .= "</div>";
		return $contact;
	}
	
}
?>