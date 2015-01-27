<?php

class Default_Model_TransportDetail extends Default_Model_Abstract {

    protected $_table_name = "transport_detail";
    protected $_table_tour_intro = "tour_intro";
    protected $_table_transport = "transport";
    protected $_id;
    protected $_transport_id;
    protected $_price;
    protected $_price_description;
    protected $_tour_id;

    public function TransportDetail_update() {
        $where = "id = $this->_id";
        $data = array(
            'transport_id' => $this->_transport_id,
            'price' => $this->_price,
            'price_description' => $this->_price_description,
            'tour_id' => $this->_tour_id
        );
        return $this->db->update($this->_table_name, $data, $where);
    }

    public function TransportDetail_listall() {
        $language = $this->_language;

        $select = $this->db->select()
                ->from(array("p" => $this->_table_name))
                ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"))
                ->join(array("p3" => $this->_table_transport), "p.transport_id = p3.id", array($this->_table_transport . "_name_{$language}" => "name_{$language}"));
        $data = $this->db->fetchAll($select);
        return $data;
    }

    public function TransportDetail_getById($id) {
        if ($id) {
            $language = $this->_language;
            $select = $this->db->select()
                    ->from(array("p" => $this->_table_name))
                    ->where("p.id = ?", $id)
                    ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"))
                    ->join(array("p3" => $this->_table_transport), "p.transport_id = p3.id", array($this->_table_transport . "_name_{$language}" => "name_{$language}"));
            $this->_data = $this->db->fetchRow($select);
            if ($data) {
                $this->_id = $data['id'];
                $this->_tour_id = $data['tour_id'];
                $this->_transport_id = $data['transport_id'];
                $this->_price = $data['price'];
                $this->_price_description = $data['price_description'];
            }
            return $this->_data;
        }
        return -1;
    }

    public function TransportDetail_getByTourId_And_TransportId($tour_id, $transport_id) {
        if ($tour_id && $transport_id) {
            $language = $this->_language;
            $select = $this->db->select()
                    ->from(array("p" => $this->_table_name))
                    ->where("p.transport_id = ?", $transport_id)
                    ->wher("p.tour_id = ?", $tour_id)
                    ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"))
                    ->join(array("p3" => $this->_table_transport), "p.transport_id = p3.id", array($this->_table_transport . "_name_{$language}" => "name_{$language}"));
            $data = $this->db->fetchAll($select);
            if ($data) {
                $this->_id = $data['id'];
                $this->_tour_id = $data['tour_id'];
                $this->_transport_id = $data['transport_id'];
                $this->_price = $data['price'];
                $this->_price_description = $data['price_description'];
            }
            return $data;
        }
        return -1;
    }

    public function TransportDetail_getByTourId($tour_id) {
        if ($tour_id) {
            $language = $this->_language;
            $select = $this->db->select()
                    ->from(array("p" => $this->_table_name))
                    ->where("p.tour_id = ?", $tour_id)
                    ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"))
                    ->join(array("p3" => $this->_table_transport), "p.transport_id = p3.id", array($this->_table_transport . "_name_{$language}" => "name_{$language}"));
            $data = $this->db->fetchAll($select);
            return $data;
        }
        return -1;
    }

    public function load($transport_id) {
        if ($transport_id) {
            $language = $this->_language;

            $select = $this->db->select()
                    ->from(array("p" => $this->_table_name))
                    ->where("p.transport_id = ?", $transport_id)
                    ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"))
                    ->join(array("p3" => $this->_table_transport), "p.transport_id = p3.id", array($this->_table_transport . "_name_{$language}" => "name_{$language}"));
            $data = $this->db->fetchAll($select);
            return $data;
        }
        return -1;
    }

 

}

?>