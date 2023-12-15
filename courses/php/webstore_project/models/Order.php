<?php


class Order
{
    private $id;
    private $user_id;
    private $country;
    private $state;
    private $address;
    private $date;
    private $amount;
    private $total;

    private $db;

    public function __construct($country = null, $state = null, $address = null, $amount = null, $total = null)
    {
        $this->db = Database::connect();
        $this->user_id = $_SESSION['user']->id;
        $this->country = (isset($country)) ? $this->db->real_escape_string($country) : '';
        $this->state = (isset($state)) ? $this->db->real_escape_string($state) : '';
        $this->address = (isset($address)) ? $this->db->real_escape_string($address) : '';
        $this->date = (new DateTime())->format('Y-m-d H:i:s');
        $this->amount = (isset($amount)) ? $this->db->real_escape_string($amount) : '';
        $this->total = (isset($total)) ? $this->db->real_escape_string($total) : '';
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
        $is_saved = $this->db->query("INSERT INTO orders VALUES(NULL, {$this->getUser_id()}, '{$this->getCountry()}', '{$this->getState()}', '{$this->getAddress()}', '{$this->getDate()}', {$this->getAmount()}, {$this->getTotal()}) ");
        if ( $is_saved ) {
            return true;
        }
        return false;
    }

    public static function retrieve($id)
    {
        $db = Database::connect($id);
        $order = $db->query("SELECT * FROM orders WHERE id = {$id}");
        return $order->fetch_object();
    }

    public static function get_all()
    {
        $db = Database::connect();
        $orders = $db->query("SELECT * FROM orders ORDER BY id ASC");
        return $orders;
    }

}