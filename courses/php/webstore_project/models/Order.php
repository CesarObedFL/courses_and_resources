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
    private $status;

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
        $this->status = 'pending';
    }

    public function setId($id)
    {
        $this->id = $this->db->real_escape_string($id);
    }

    public function getId()
    {
        return $this->id;
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
        $is_saved = $this->db->query("INSERT INTO orders VALUES(NULL, {$this->getUser_id()}, '{$this->getCountry()}', '{$this->getState()}', '{$this->getAddress()}', '{$this->getDate()}', {$this->getAmount()}, {$this->getTotal()}, '{$this->getStatus()}') ");
        if ( $is_saved ) {
            $order_id = $this->db->query("SELECT LAST_INSERT_ID() AS 'order_id'");
            $this->setId($order_id->fetch_object()->order_id);

            return true;
        }
        return false;
    }

    public function update()
    {
        $is_updated = $this->db->query("UPDATE orders SET country = '{$this->getCountry()}', state = '{$this->getState()}', address = '{$this->getAddress()}', status = '{$this->getStatus()}' WHERE id = {$this->getId()}");
        if ( $is_updated ) {
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
        $orders = $db->query("SELECT o.*, u.name AS client FROM orders AS o INNER JOIN users AS u ON o.user_id = u.id ORDER BY id ASC");
        return $orders;
    }

    public static function my_orders()
    {
        $db = Database::connect();
        $my_orders = $db->query("SELECT * FROM orders WHERE user_id = " .$_SESSION['user']->id." ORDER BY id ASC");
        return $my_orders;
    }

    public static function get_products_by_order_id($order_id)
    {
        $db = Database::connect();
        $products = $db->query("SELECT i.*, p.* FROM items AS i INNER JOIN products AS p ON i.product_id = p.id WHERE order_id = {$order_id}");
        return $products;
    }

}