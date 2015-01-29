<?php

class Default_Model_Order extends Default_Model_Abstract {

    protected $_table_name = "order";
    protected $_table_transport = "transport";
    protected $_table_tour_cat = "tour_category";
    protected $_table_customer = "customer_account";
    protected $_table_tour_intro = "tour_intro";
    protected $_id;
    protected $_customer_id;
    protected $_num_0_5_children;
    protected $_num_6_12_children;
    protected $_num_2_12_children;
    protected $_num_adults;
    protected $_num_foreigners;
    protected $_outward_transport;
    protected $_return_transport;
    protected $_tour_cat_id;
    protected $_order_date;
    protected $_status;
    protected $_surcharges;
    protected $_total;
    protected $_payment_id;
    protected $_tour_id;
    protected $_description;

    public function listAll() {
        $language = $this->_language;

        $select = $this->db->select()
                ->from(array("p" => $this->_table_name))
                ->join(array("p1" => $this->_table_tour_cat), "p.tour_cat_id = p1.id", array($this->_table_tour_cat . "_name_{$language}" => "tour_cat_name_{$language}"))
                ->join(array("p2" => $this->_table_transport), "p.outward_transport = p2.id", array($this->_table_transport . "_outward_{$language}" => "name_{$language}"))
                ->join(array("p3" => $this->_table_transport), "p.return_transport = p3.id", array($this->_table_transport . "_return_{$language}" => "name_{$language}"))
                ->join(array("p4" => $this->_table_customer), "p.customer_id = p4.id", array($this->_table_customer . "_username" => "username"))
                ->join(array("p5" => $this->_table_tour_intro), "p.tour_id = p5.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"
                ))
        ;
        $data = $this->db->fetchAll($select);
        return $data;
    }

    public function load($id) {

        if ($id) {
            $select = $this->db->select()
                    ->from(array("p" => $this->_table_name))
                    ->where("p.id = ?", $id)
                    ->join(array("p1" => $this->_table_tour_cat), "p.tour_cat_id = p1.id", array($this->_table_tour_cat . "_name_{$language}" => "tour_cat_name_{$language}"))
                    ->join(array("p4" => $this->_table_customer), "p.customer_id = p4.id", array($this->_table_customer . "_username" => "username"))
                    ->join(array("p5" => $this->_table_tour_intro), "p.tour_id = p5.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"
                    ))
            ;

            $this->_data = $this->db->fetchRow($select);


            return $this->_data;
        }
        return -1;
    }

    public function Order_getByStatus($status) {
        if ($status) {

            $language = $this->_language;

            $select = $this->db->select()
                    ->from(array("p" => $this->_table_name))
                    ->where("p.status = ?", $status)
                    ->join(array("p1" => $this->_table_tour_cat), "p.tour_cat_id = p1.id", array($this->_table_tour_cat . "_name_{$language}" => "tour_cat_name_{$language}"))
                    ->join(array("p2" => $this->_table_transport), "p.outward_transport = p2.id", array($this->_table_transport . "_outward_{$language}" => "name_{$language}"))
                    ->join(array("p3" => $this->_table_transport), "p.return_transport = p3.id", array($this->_table_transport . "_return_{$language}" => "name_{$language}"))
                    ->join(array("p4" => $this->_table_customer), "p.customer_id = p4.id", array($this->_table_customer . "_username" => "username"))
                    ->join(array("p5" => $this->_table_tour_intro), "p.tour_id = p5.id", array($this->_table_tour_intro . "_name_{$language}" => "name_{$language}"
                    ))
            ;

            $data = $this->db->fetchAll($select);
            return $data;
        }
        return -1;
    }

    public function Order_getByCustomerId($customer_id, $query = true) {
        if ($customer_id) {

            $select = $this->db->select()
                    ->from(array("p" => $this->_table_name))
                    ->where("p.customer_id = ?", $customer_id)
                    ->join(array("p1" => $this->_table_tour_cat), "p.tour_cat_id = p1.id", array($this->_table_tour_cat . "_name_{$language}" => "tour_cat_name_{$language}"))
                    ->join(array("p4" => $this->_table_customer), "p.customer_id = p4.id", array($this->_table_customer . "_username" => "username"))
                    ->join(array("p5" => $this->_table_tour_intro), "p.tour_id = p5.id", array($this->_table_tour_intro . "_name" => "name"
            ));
            if ($query)
                return $select;
            else
                return $this->db->fetchAll($select);
        }
        return -1;
    }

    public function Order_insert($customer_id, $num_0_5_children = 0, $num_6_12_children = 0, $num_2_12_children = 0, $num_foreigners = 0, $num_adults = 0, $tour_cat_id, $order_date, $status = "None", $surcharges = 0, $total = 0, $outward_transport = 0, $return_transport = 0, $tour_id) {

        if ($customer_id && $tour_cat_id && $order_date) {


            $data = array(
                'customer_id' => $customer_id,
                'num_0_5_children' => $num_0_5_children,
                'num_6_12_children' => $num_6_12_children,
                'num_2_12_children' => $num_2_12_children,
                'num_foreigners' => $num_foreigners,
                'num_adults' => $num_adults,
                'tour_cat_id' => $tour_cat_id,
                'order_date' => $order_date,
                'status' => $status,
                'surcharges' => $surcharges,
                'total' => $total,
                'outward_transport' => $outward_transport,
                'return_transport' => $return_transport,
                'tour_id' => $tour_id);

            $result = $this->db->insert('order', $data);
            if ($result > 0) {
                return $this->db->lastInsertId();
            } else {
                return $result;
            }
        }
        return 0;
    }
}

?>
