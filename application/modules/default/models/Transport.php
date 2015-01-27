<?php

class Default_Model_Transport extends Default_Model_Abstract {

    protected $_table_name = "transport";
  
    public function Transport_checkExist($name) {

        if ($name) {
            $language = $this->_language;
            $select = $this->db->select()
                    ->from($this->_table_name)
                    ->where("name_{$language} =?", $name);
            $data = $this->db->fetchAll($select);
            return count($data);
        }
        return -1;
    }
}

?>