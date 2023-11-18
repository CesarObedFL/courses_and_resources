<?php

class User {
    private $id;
    private $name;
    private $email;
    private $password;
    private $role;
    private $image;

    private $db;

    public function __construct($name, $email, $password, $role, $image)
    {
        $this->db = Database::connect();
        $this->name = $this->db->real_escape_string($name);
        $this->email = $this->db->real_escape_string($email);
        $this->password = password_hash($this->db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
        $this->role = $this->db->real_escape_string($role);
        $this->image = $this->db->real_escape_string($image);
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
        $is_saved = $this->db->query("INSERT INTO users VALUES(NULL, '{$this->getName()}', '{$this->getEmail()}', '{$this->getPassword()}', '{$this->getRole()}', '{$this->getImage()}') ");
        if ( $is_saved ) {
            return true;
        }
        return false;
    }
}