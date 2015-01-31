<?php

class Admin_Model_Menu extends Admin_Model_Abstract {

    protected $_table_name = "menu";
    protected $_id;
    protected $_name;
    protected $_name_en;
    protected $_parent_id;
    protected $_link;
    protected $_link_en;

    public function Menu_listall() {
        $select = $this->db->select()
                ->from($this->_table_name);
        $data = $this->db->fetchAll($select);


        return $data;
    }

    public function getId() {
        return $this->_id;
    }

    public function getName() {
        return $this->_name;
    }

    public function getName_En() {
        return $this->_name_en;
    }

    public function getParent_Id() {
        return $this->_parent_id;
    }

    public function getLink() {
        return $this->_link;
    }

    public function getLink_En() {
        return $this->_link_en;
    }

    public function setId($id) {
        //$id = $this->db->quote($id,INTEGER);
        $this->_id = $id;
    }

    public function setName($name) {
        //$name = $this->db->quote($name,STRING);
        $this->_name = $name;
    }

    public function setName_En($name_en) {
        //$name_en = $this->db->quote($name_en,STRING);
        $this->_name_en = $name_en;
    }

    public function setParent_Id($parent_id) {
        $this->_parent_id = $parent_id;
    }

    public function setLink($link_vi) {
        $this->_link = $link_vi;
    }

    public function setLink_En($link_en) {
        $this->_link_en = $link_en;
    }

    public function Menu_hasChild($data, $id) {

        function is_parent($data, $id) {
            foreach ($data as $val) {
                if ($val['parent_id'] == $id) {
                    return 1;
                    break;
                }
            }
            return 0;
        }

    }

    public function listAll() {

        $select = $this->db->select(array ("p.id"=> "id",
                                           "p.name_vi"=>"name_vi",
            "p.name_en"=>"name_en",
            "p.link_en"=>"link_en",
            "p.link_vi"=>"link_vi",
            "p2.name_vi"=>"parent_id"))
                ->from(array("p" => $this->_table_name))
                ->joinLeft(array("p2" => $this->_table_name), "p.parent_id = p2.id", array("parent_name" => "p2.name_vi"));
        $data = $this->db->fetchAll($select);




        return $data;
    }

    public function Menu_delete($id) {
        if ($id) {
            $data = $this->listAll();
            if (!$this->Menu_hasChild($data, $id)) {
                $where = "id = $id";
                return $this->db->delete($this->_table_name, $where);
            } else {
                return -1;
            }
        }
        return -1;
    }

    public function Menu_getById($id) {
        if ($id) {
            $select = $this->db->select()
                    ->from($this->_table_name)
                    ->where("id =?", $id);
            $data = $this->db->fetchRow($select);
            //$id = $this->db->quote($id,INTEGER);
            //$sql = $this->db->query("select * from menu where id = $id");
            //$data = $sql->fetchOne();

            if ($data) {
                $this->_id = $data['id'];
                $this->_name = $data['name_vi'];
                $this->_name_en = $data['name_en'];
                $this->_link = $data['link_vi'];
                $this->_link_en = $data['link_en'];
                $this->_parent_id = $data['parent_id'];
            }
            return $data;
        }
        return -1;
    }

    public function Menu_update() {
        $where = "id = $this->_id";
        $data = array(
            'name_vi' => $this->_name,
            'name_en' => $this->_name_en,
            'link_vi' => $this->_link,
            'link_en' => $this->_link_en,
            'parent_id' => $this->_parent_id);
        return $this->db->update($this->_table_name, $data, $where);
    }

    public function Menu_checkExist($name) {
        if ($name) {
            $select = $this->db->select()
                    ->from($this->_table_name)
                    ->where("name =?", $name);
            $data = $this->db->fetchAll($select);
            return count($data);
        }
        return -1;
    }

    public function Menu_insert($name, $name_en = "") { {
            //$name =  $this->db->quote($name,STRING);
            //$name_en = $this->db->quote($name_en,STRING);
            {
                $data = array(
                    'name_vi' => $name,
                    'name_en' => $name_en);

                return $this->db->insert($this->_table_name, $data);
            }
        }
    }

}

?>