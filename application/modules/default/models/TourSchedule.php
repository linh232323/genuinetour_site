<?php

class Default_Model_TourSchedule extends Default_Model_Abstract {

    protected $_table_name = "tour_schedule";
    protected $_table_tour_intro = "tour_intro";
    protected $_id;
    protected $_tour_id;
    protected $_start_date;

   

    public function listAll() {
        $language = $this->_language;
        $select = $this->db->select()
                ->from(array("p" => $this->_table_name))
                ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"));

        $data = $this->db->fetchAll($select);
        return $data;
    }

    public function load($id) {
        if ($id) {

            $language = $this->_language;

            $select = $this->db->select()
                    ->from(array("p" => $this->_table_name))
                    ->order('p.start_date ASC')
                    ->where("p.id = ?", $id)
                    ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"));

            $this->_data = $this->db->fetchRow($select);
            return $this->_data;
        }
        return -1;
    }

    public function loadByIdAndTime($tour_id, $begin = 0, $end = 0) {
        if ($tour_id) {

            $language = $this->_language;

            if ($begin != 0 && $end != 0) {
                $select = $this->db->select()
                        ->from(array("p" => $this->_table_name))
                        ->where("p.tour_id = ?", $tour_id)
                        ->where("p.start_date <= ?", $end)
                        ->where("p.start_date >= ?", $begin)
                        ->order('p.start_date ASC')
                        ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"));
            } elseif ($begin != 0 && $end == 0) {
                $select = $this->db->select()
                        ->from(array("p" => $this->_table_name))
                        ->where("p.tour_id = ?", $tour_id)
                        ->where("p.start_date >= ?", $begin)
                        ->order('p.start_date ASC')
                        ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"));
            } else {
                $select = $this->db->select()
                        ->from(array("p" => $this->_table_name))
                        ->where("p.tour_id = ?", $tour_id)
                        ->where("p.start_date <= ?", $end)
                        ->order('p.start_date ASC')
                        ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"));
            }

            $data = $this->db->fetchAll($select);
            return $data;
        }
        return -1;
    }

    public function checkExist($tour_id, $start_date) {
        if ($tour_id && $start_date) {

            $language = $this->_language;

            $select = $this->db->select()
                    ->from(array("p" => $this->_table_name))
                    ->where("p.tour_id = ?", $tour_id)
                    ->where("p.start_date = ?", $start_date)
                    ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"));
            $data = $this->db->fetchAll($select);
            return count($data);
        }
        return -1;
    }

    public function insert($tour_id, $start_date) {
        if ($tour_id && $start_date) {
            //$tour_id  = $this->db->quote($tour_id,INTEGER);
            //$start_date = $this->db->quote($start_date,INTEGER);
            if ($this->checkExist($tour_id, $start_date) == 0) {
                $data = array(
                    'tour_id' => $tour_id,
                    'start_date' => $start_date);

                return $this->db->insert($this->_table_name, $data);
            }
        }
        return 0;
    }

}

?>