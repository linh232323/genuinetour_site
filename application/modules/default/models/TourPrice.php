<?php

class Default_Model_TourPrice extends Default_Model_Abstract {

    protected $_table_name = "tour_price";
    protected $_table_tour_intro = "tour_intro";
    protected $_table_tour_category = "tour_category";
    protected $_tour_id;
    protected $_tour_cat_id;
    protected $_price;
    protected $_surcharge;
    protected $_foreign_charge;


    public function TourPrice_update() {
        $where = "tour_id = $this->_tour_id and tour_cat_id = $this->_tour_cat_id";
        $data = array(
            'price' => $this->_price,
            'surcharge' => $this->_surcharge,
            'foreign_charge' => $this->_foreign_charge);

        return $this->db->update($this->_table_name, $data, $where);
    }

    public function TourPrice_listall() {
        $language = $this->_language;
        $select = $this->db->select()
                ->from(array("p" => $this->_table_name))
                ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"))
                ->join(array("p3" => $this->_table_tour_category), "p.tour_cat_id = p3.id", array($this->_table_tour_category . "_tour_cat_name_{$language}" => "tour_cat_name_{$language}"));
        $data = $this->db->fetchAll($select);
        return $data;
    }

    public function TourPrice_getByTour_Id_And_Tour_Cat_ID($tour_id, $tour_cat_id) {
        if ($tour_id && $tour_cat_id) {
           $language = $this->_language;
            $select = $this->db->select()
                    ->from(array("p" => $this->_table_name))
                    ->where("tour_id = ?", $tour_id)
                    ->where("tour_cat_id = ?", $tour_cat_id)
                    ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"))
                    ->join(array("p3" => $this->_table_tour_category), "p.tour_cat_id = p3.id", array($this->_table_tour_category . "_tour_cat_name_{$language}" => "tour_cat_name_{$language}"));
            $data = $this->db->fetchRow($select);

            if ($data) {
                $this->_tour_cat_id = $data['tour_cat_id'];
                $this->_foreign_charge = $data['foreign_charge'];
                $this->_price = $data['price'];
                $this->_surcharge = $data['surcharge'];
                $this->_tour_id = $data['tour_id'];
            }
            return $data;
        }
        return -1;
    }

    public function TourPrice_getByTour($tour_id) {
        if ($tour_id) {
            $language = $this->_language;
            
            $select = $this->db->select()
                    ->from(array("p" => $this->_table_name))
                    ->where("tour_id = ?", $tour_id)
                    ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"))
                    ->join(array("p3" => $this->_table_tour_category), "p.tour_cat_id = p3.id", array($this->_table_tour_category . "_name_{$language}" => "tour_cat_name_{$language}"));
            $data = $this->db->fetchAll($select);
           
            return $data;
        }
        return -1;
    }

    public function TourPrice_getBy_Tour_Cat_ID($tour_cat_id) {
        if ($tour_cat_id) {
            $language = $this->_language;
            
            $select = $this->db->select()
                    ->from(array("p" => $this->_table_name))
                    ->where("tour_cat_id = ?", $tour_cat_id)
                    ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"))
                    ->join(array("p3" => $this->_table_tour_category), "p.tour_cat_id = p3.id", array($this->_table_tour_category . "_name_{$language}" => "tour_cat_name_{$language}"));
            $data = $this->db->fetchAll($select);
            return $data;
        }
        return -1;
    }

    public function TourPrice_checkExist($tour_id, $tour_cat_id) {
        if ($tour_id && $tour_cat_id) {
            $language = $this->_language;
            
            $select = $this->db->select()
                    ->from(array("p" => $this->_table_name))
                    ->where("tour_id = ?", $tour_id)
                    ->where("tour_cat_id = ?", $tour_cat_id)
                    ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"))
                    ->join(array("p3" => $this->_table_tour_category), "p.tour_cat_id = p3.id", array($this->_table_tour_category . "_name_{$language}" => "tour_cat_name_{$language}",));
            $data = $this->db->fetchAll($select);
            return count($data);
        }
        return -1;
    }

    public function TourPrice_insert($tour_id, $tour_cat_id, $price = 0, $surcharge = 0, $foreign_charge = 0) {
        if ($tour_id && $tour_cat_id) {
            
            if ($this->TourPrice_checkExist($tour_id, $tour_cat_id) == 0) {
                $data = array(
                    'tour_id' => $tour_id,
                    'tour_cat_id' => $tour_cat_id,
                    'price' => $price,
                    'surcharge' => $surcharge,
                    'foreign_charge' => $foreign_charge);
                return $this->db->insert($this->_table_name, $data);
            }
        }
        return 0;
    }

    public function TourPrice_delete($tour_id, $tour_cat_id) {
        if ($tour_id && $tour_cat_id) {
            $where = "tour_id = $tour_id and tour_cat_id = $tour_cat_id";
            return $this->db->delete($this->_table_name, $where);
        }
        return 0;
    }

}

?>