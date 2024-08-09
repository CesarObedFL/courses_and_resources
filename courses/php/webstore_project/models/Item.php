<?php


class Item
{
    private $id;
    private $order_id;
    private $product_id;
    private $units;

    private $db;

    public function __construct($order_id = null, $product_id = null, $units = null)
    {
        $this->db = Database::connect();
        $this->order_id = (isset($order_id)) ? $this->db->real_escape_string($order_id) : '';
        $this->product_id = (isset($product_id)) ? $this->db->real_escape_string($product_id) : '';
        $this->units = (isset($units)) ? $this->db->real_escape_string($units) : '';
    }

    public function setId($id)
    {
        $this->id = $this->db->real_escape_string($id);
    }

    public function __call($name, $arguments)
    {
        $prefix_method = substr($name, 0, 3);
        
        if ( $prefix_method == 'get' ) {
            $method_name = substr(strtolower($name), 3);

            if ( isset($this->$method_name) ) {
                return $this->$method_name;
            } else {
                return "Inexistent Method!...";
            }
        } else if ( $prefix_method = 'set' ) {
            $method_name = substr(strtolower($name), 3);
            
            if ( isset($this->$method_name) ) {
                $this->$method_name = $arguments[0];
            } else {
                return "Inexistent Method!...";
            }
            
        } else {
            return "Inexistent Method!...";
        }
    }

    public function save()
    {
        $is_saved = $this->db->query("INSERT INTO items VALUES(NULL, {$this->getOrder_id()}, '{$this->getProduct_id()}', '{$this->getUnits()}') ");
        if ( $is_saved ) {
            return true;
        }
        return false;
    }

    public static function retrieve($id)
    {
        $db = Database::connect($id);
        $order = $db->query("SELECT * FROM items WHERE id = {$id}");
        return $order->fetch_object();
    }

    public static function get_all_by_order_id()
    {
        $db = Database::connect();
        $orders = $db->query("SELECT * FROM items ORDER BY id ASC");
        return $orders;
    }

}