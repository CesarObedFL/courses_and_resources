<?php


class Product
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $category_id;
    private $offer;
    private $date;
    private $image;

    private $db;

    public function __construct($name = null, $description = null, $price = null, $stock = null, $category_id = null, $offer = null, $date = null, $image = null)
    {
        $this->db = Database::connect();
        $this->name = (isset($name)) ? $this->db->real_escape_string($name) : '';
        $this->description = (isset($description)) ? $this->db->real_escape_string($description) : '';
        $this->price = (isset($price)) ? $this->db->real_escape_string($price) : '';
        $this->stock = (isset($stock)) ? $this->db->real_escape_string($stock) : '';
        $this->category_id = (isset($category_id)) ? $this->db->real_escape_string($category_id) : '';
        $this->offer = (isset($offer)) ? $this->db->real_escape_string($offer) : '';
        $this->date = (isset($date)) ? $this->db->real_escape_string($date) : '';
        $this->image = (isset($image)) ? $this->db->real_escape_string($image) : '';
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
                //var_dump($arguments);
            } else {
                return "Inexistent Method!...";
            }
            
        } else {
            return "Inexistent Method!...";
        }
    }

    public function save()
    {
        $is_saved = $this->db->query("INSERT INTO products VALUES(NULL, '{$this->getName()}', '{$this->getDescription()}', '{$this->getPrice()}', '{$this->getStock()}', '{$this->getCategory_id()}', '{$this->getOffer()}', '{$this->getDate()}', '{$this->getImage()}') ");
        if ( $is_saved ) {
            return true;
        }
        return false;
    }

    public static function get_all()
    {
        $db = Database::connect();
        $products = $db->query("SELECT * FROM products ORDER BY id DESC");
        return $products;
    }


}