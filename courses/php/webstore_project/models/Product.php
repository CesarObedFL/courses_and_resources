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

    public function __construct($name = null, $description = null, $price = null, $stock = null, $category_id = null, $offer = null, $image = null)
    {
        $this->db = Database::connect();
        $this->name = (isset($name)) ? $this->db->real_escape_string($name) : '';
        $this->description = (isset($description)) ? $this->db->real_escape_string($description) : '';
        $this->price = (isset($price)) ? $this->db->real_escape_string($price) : '';
        $this->stock = (isset($stock)) ? $this->db->real_escape_string($stock) : '';
        $this->category_id = (isset($category_id)) ? $this->db->real_escape_string($category_id) : '';
        $this->offer = (isset($offer)) ? $this->db->real_escape_string($offer) : '';
        $this->date = (new DateTime())->format('Y-m-d H:i:s');
        $this->image = (isset($image)) ? $this->db->real_escape_string($image) : '';
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
        $is_saved = $this->db->query("INSERT INTO products VALUES(NULL, '{$this->getName()}', '{$this->getDescription()}', '{$this->getPrice()}', '{$this->getStock()}', '{$this->getCategory_id()}', '{$this->getOffer()}', '{$this->getDate()}', '{$this->getImage()}') ");
        if ( $is_saved ) {
            return true;
        }
        return false;
    }

    public static function retrieve($id)
    {
        $db = Database::connect($id);
        $product = $db->query("SELECT * FROM products WHERE id = {$id}");
        return $product->fetch_object();
    }

    public function update()
    {
        $is_updated = $this->db->query("UPDATE products SET name = '{$this->getName()}', description = '{$this->getDescription()}', price = {$this->getPrice()}, stock = {$this->getStock()}, category_id = {$this->getCategory_id()}, offer = {$this->getOffer()}, image = '{$this->getImage()}' WHERE id = {$this->getId()}");
        if ( $is_updated ) {
            return true;
        }
        return false;
    }

    public static function delete($id)
    {
        $db = Database::connect($id);
        $is_delete = $db->query("DELETE FROM products WHERE id = {$id}");
        return $is_delete;
    }

    public static function get_all()
    {
        $db = Database::connect();
        $products = $db->query("SELECT * FROM products ORDER BY id ASC");
        return $products;
    }

    public static function get_random_products($limit)
    {
        $db = Database::connect();
        $products = $db->query("SELECT * FROM products ORDER BY RAND() LIMIT $limit");
        return $products;
    }

    public static function get_by_category($category_id)
    {
        $db = Database::connect();
        $products = $db->query("SELECT * FROM products WHERE category_id = {$category_id} ORDER BY RAND()");
        return $products;
    }


}