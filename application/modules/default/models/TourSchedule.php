<?php

class Default_Model_TourSchedule extends Default_Model_Abstract {

    protected $_table_name = "tour_schedule";
    protected $_table_tour_intro = "tour_intro";
    protected $_id;
    protected $_tour_id;
    protected $_start_date;

    public function getId() {
        return $this->_id;
    }

    public function getTour_Id() {
        return $this->_tour_id;
    }

    public function getStart_Date() {
        return $this->_start_date;
    }

    public function setId($id) {
        //$id = $this->db->quote($id,INTEGER );
        $this->_id = $id;
    }

    public function setTour_Id($tour_id) {
        //$tour_id = $this->db->quote($tour_id,INTEGER );
        $this->_tour_id = $tour_id;
    }

    public function setStart_Date($start_date) {

        $this->_start_date = $start_date;
    }

   
    public function TourSchedule_listall() {
        $select = $this->db->select()
                ->from(array("p" => $this->_table_name))
                ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", 
                  array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"));

        $data = $this->db->fetchAll($select);
        return $data;
    }

    public function TourSchedule_getById($id) {
        if ($id) {
            //$id = $this->db->quote($id,INTEGER);
            //$sql = $this->db->query("select * from tour_schedule where id = $id");
            //$data = $sql->fetchOne();
            $select = $this->db->select()
                    ->from(array("p" => $this->_table_name))
                    ->order('p.start_date ASC')
                    ->where("p.id = ?", $id)
                    ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name" => "name",
                $this->_table_tour_intro . "_name_en" => "name_en"));


            $data = $this->db->fetchRow($select);
            if ($data) {
                $this->_id = $data['id'];
                $this->_tour_id = $data['tour_id'];
                $this->_start_date = $data['start_date'];
            }
            return $data;
        }
        return -1;
    }

    public function TourSchedule_getByTourID_And_Time($tour_id, $begin = 0, $end = 0) {
        if ($tour_id) {
            
            $language = $this->_language;
            
            if ($begin != 0 && $end != 0) {
                $select = $this->db->select()
                        ->from(array("p" => $this->_table_name))
                        ->where("p.tour_id = ?", $tour_id)
                        ->where("p.start_date <= ?", $end)
                        ->where("p.start_date >= ?", $begin)
                        ->order('p.start_date ASC')
                        ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name" => "name",
                    $this->_table_tour_intro . "_name_{$language}" => "name_{$language}"));
            } elseif ($begin != 0 && $end == 0) {
                $select = $this->db->select()
                        ->from(array("p" => $this->_table_name))
                        ->where("p.tour_id = ?", $tour_id)
                        ->where("p.start_date >= ?", $begin)
                        ->order('p.start_date ASC')
                        ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}",
                    $this->_table_tour_intro . "_name_{$language}" => "name_{$language}"));
            } else {
                $select = $this->db->select()
                        ->from(array("p" => $this->_table_name))
                        ->where("p.tour_id = ?", $tour_id)
                        ->where("p.start_date <= ?", $end)
                        ->order('p.start_date ASC')
                        ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name" => "name",
                    $this->_table_tour_intro . "_name_{$language}" => "name_{$language}"));
            }

            $data = $this->db->fetchAll($select);
            return $data;
        }
        return -1;
    }

    public function TourSchedule_checkExist($tour_id, $start_date) {
        if ($tour_id && $start_date) {
            //$tour_id = $this->db->quote($tour_id,INTEGER);
            //$start_date = $this->db->quote($start_date,INTEGER);
            //$sql = $this->db->query("select * from tour_schedule where tour_id = $tour_id and start_date = start_date");
            //$data = $sql->fetchAll();

            $select = $this->db->select()
                    ->from(array("p" => $this->_table_name))
                    ->where("p.tour_id = ?", $tour_id)
                    ->where("p.start_date = ?", $start_date)
                    ->join(array("p2" => $this->_table_tour_intro), "p.tour_id = p2.id", array($this->_table_tour_intro . "_name" => "name",
                $this->_table_tour_intro . "_name_en" => "name_en"));
            $data = $this->db->fetchAll($select);
            return count($data);
        }
        return -1;
    }

    public function TourSchedule_insert($tour_id, $start_date) {
        if ($tour_id && $start_date) {
            //$tour_id  = $this->db->quote($tour_id,INTEGER);
            //$start_date = $this->db->quote($start_date,INTEGER);
            if ($this->TourSchedule_checkExist($tour_id, $start_date) == 0) {
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