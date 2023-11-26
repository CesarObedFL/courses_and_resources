<?php


class Category
{
    private $id;
    private $name;

    private $db;

    public function __construct($name = null)
    {
        $this->db = Database::connect();
        $this->name = (isset($name)) ? $this->db->real_escape_string($name) : '';
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
        $is_saved = $this->db->query("INSERT INTO categories VALUES(NULL, '{$this->getName()}') ");
        if ( $is_saved ) {
            return true;
        }
        return false;
    }

    public function get_all()
    {
        $categories = $this->db->query("SELECT * FROM categories");
        return $categories;
    }


}