<?php

class Default_Model_TourIntro extends Default_Model_Abstract {

    protected $_table_name = "tour_intro";
    protected $_table_transport = "transport";
    protected $_table_tour_section = "tour_section";
    protected $_id;
    protected $_code;
    protected $_outward_transport;
    protected $_return_transport;
    protected $_post_intro;
    protected $_post_intro_en;
    protected $_program;
    protected $_program_en;
    protected $_name;
    protected $_name_en;
    protected $_during;
    protected $_during_en;
    protected $_appendix;
    protected $_appendix_en;
    protected $_tour_section_id;
    protected $_thumbnail_url;
    protected $_price;

//	protected $_post;// Thông tin Post
//	protected $_post_en; // Thông tin Post tiếng Anh
//	public function getPost(){
//		return $this->_post;
//	}
//	public function getPostEn(){
//		return $this->_post_en;
//	}

  


    public function TourIntro_search($tour_name, $outward_transport, $return_transport, $during) {

        if ($outward_transport == 0) {
            $query_outward = "1 = 1";
        } else {
            $query_outward = "p.outward_transport = ?";
        }
        if ($return_transport == 0) {
            $query_return = "1 = 1";
        } else {
            $query_return = "p.return_transport = ?";
        }
        if ($during == 0) {
            $query_during = "1 = 1";
        } else {
            $query_during = "p.during = ?";
        }

        $select = $this->db->select()
                ->from(array("p" => $this->_table_name))
                ->where("p.name LIKE ?", "%" . $tour_name . "%")
                ->where($query_outward, $outward_transport)
                ->where($query_return, $return_transport)
                ->where($query_during, $during)
                ->join(array("p2" => $this->_table_tour_section), "p.tour_section_id = p2.id", array($this->_table_tour_section . "_name" => "name"))
                ->join(array("p3" => $this->_table_transport), "p.outward_transport = p3.id", array($this->_table_transport . "_outward_name" => "name",
                    $this->_table_transport . "_outward_name_en" => "name_en"))
                ->join(array("p4" => $this->_table_transport), "p.return_transport = p4.id", array($this->_table_transport . "_return_name" => "name",
            $this->_table_transport . "_return_name_en" => "name_en"));
        $data = $this->db->fetchAll($select);
        return $data;
    }

    public function TourIntro_update() {

        $where = "id = $this->_id";
        $data = array(
            'outward_transport' => $this->_outward_transport,
            'return_transport' => $this->_return_transport,
            'post_intro' => $this->_post_intro,
            'post_intro_en' => $this->_post_intro_en,
            'program' => $this->_program,
            'program_en' => $this->_program_en,
            'name' => $this->_name,
            'name_en' => $this->_name_en,
            'during' => $this->_during,
            'during_en' => $this->_during_en,
            'appendix' => $this->_appendix,
            'appendix_en' => $this->_appendix_en,
            'tour_section_id' => $this->_tour_section_id,
            'thumbnail_url' => $this->_thumbnail_url,
            'price' => $this->_price
        );


        return $this->db->update("tour_intro", $data, $where);
    }

    public function TourIntro_listall() {
        $select = $this->db->select()
                ->from(array("p" => $this->_table_name))
                ->order('p.id DESC')
                ->join(array("p2" => $this->_table_tour_section), "p.tour_section_id = p2.id", array($this->_table_tour_section . "_name" => "name"))
                ->join(array("p3" => $this->_table_transport), "p.outward_transport = p3.id", array($this->_table_transport . "_outward_name" => "name",
                    $this->_table_transport . "_outward_name_en" => "name_en"))
                ->join(array("p4" => $this->_table_transport), "p.return_transport = p4.id", array($this->_table_transport . "_return_name" => "name",
            $this->_table_transport . "_return_name_en" => "name_en"));
        $data = $this->db->fetchAll($select);
        return $data;
    }

    public function load($id) {
        if ($id) {
            $language = $this->_language;
            $select = $this->db->select()
                    ->from(array("p" => $this->_table_name))
                    ->where("p.id = ?", $id)
                    ->order('p.id DESC')
                    ->join(array("p2" => $this->_table_tour_section), "p.tour_section_id = p2.id", array($this->_table_tour_section . "_name_{$language}" => "name_{$language}"))
                    ->join(array("p3" => $this->_table_transport), "p.outward_transport = p3.id", array($this->_table_transport . "_outward_name_{$language}" => "name_{$language}"))
                    ->join(array("p4" => $this->_table_transport), "p.return_transport = p4.id", array($this->_table_transport . "_return_name_{$language}" => "name_{$language}"));
            $this->_data = $this->db->fetchRow($select);
            
            return $this->_data;
        }
        return -1;
    }

    function getTours_Section($data, $parent = 0, &$d) {

        foreach ($data as $k => $item) {
            if ($item['parent_id'] == $parent) {
                $d[] = $item['id'];
                unset($data[$k]);
                $this->getTours_Section($data, $item['id'], $d);
            }
        }

        return $d;
    }

    public function TourIntro_getByTourSection($tour_section_id, $query = true, $limit = 0) { {
            $language = $this->_language;
            
            if ($tour_section_id != 0) {
                $tour_section = new Default_Model_TourSection();
                $temp = $tour_section->TourSection_listall();

                $items = array($tour_section_id);
                $this->getTours_Section($temp, $tour_section_id, $items);
            }
            $select = $this->db->select()
                    ->from(array("p" => $this->_table_name))
                    ->limit($limit, 0);
            if ($tour_section_id != 0)
                $select->where("p.tour_section_id in (?)", $items);

            $select->order('p.id DESC')
                    ->join(array("p2" => $this->_table_tour_section), "p.tour_section_id = p2.id", array($this->_table_tour_section . "_name_{$language}" => "name_{$language}" ))
                    ->join(array("p3" => $this->_table_transport), "p.outward_transport = p3.id", array($this->_table_transport . "_outward_name_{$language}" => "name_{$language}",
                        $this->_table_transport . "_outward_name_{$language}" => "name_{$language}"))
                    ->join(array("p4" => $this->_table_transport), "p.return_transport = p4.id", array($this->_table_transport . "_return_name" => "name_{$language}",
                        $this->_table_transport . "_return_name_{$language}" => "name_{$language}"));
            if (!$query) {
                $data = $this->db->fetchAll($select);
            } else {
                $data = $select;
            }
            return $data;
        }
    }

    public function TourIntro_insert($outward_transport = 0, $return_transport = 0, $Post_Intro, $Post_Intro_en = "", $program, $program_en = "", $name, $name_en = "", $during = "", $during_en = "", $appendix = "", $appendix_en = "", $tour_section_id = 1, $thumbnail_url = "", $price = 0, $code) { {
            $data = array(
                'outward_transport' => $outward_transport,
                'return_transport' => $return_transport,
                'post_intro' => $Post_Intro,
                'post_intro_en' => $Post_Intro_en,
                'program' => $program,
                'program_en' => $program_en,
                'name' => $name,
                'name_en' => $name_en,
                'during' => $during,
                'during_en' => $during_en,
                'appendix' => $appendix,
                'appendix_en' => $appendix_en,
                'tour_section_id' => $tour_section_id,
                'thumbnail_url' => $thumbnail_url,
                'price' => $price,
                'code' => $code);
            return $this->db->insert($this->_table_name, $data);
        }
    }

    public function TourIntro_delete($id) {
        if ($id) {
            $where = "id = $id";
            return $this->db->delete($this->_table_name, $where);
        }
        return 0;
    }

}

?>
