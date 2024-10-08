<?php


class User extends BaseModel {
    public $id;
    public $name;
    public $email;
    public $password;

    public function __construct($name = null, $email = null, $password = null)
    {
        $this->name = (isset($name)) ? $name : 'César Obed Figueroa Luna';
        $this->email = (isset($email)) ? $email : 'cesarobedfl@gmail.com';
        $this->password = (isset($password)) ? $password : 'secret';

        parent::__construct();
    }

    // getters and setters
    public function get_id()
    {
        return $this->id;
    }

    public function set_name($name)
    {
        $this->name = $name;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function set_email($email)
    {
        $this->email = $email;
    }

    public function get_email()
    {
        return $this->email;
    }

    public function set_password($password)
    {
        $this->password = $password;
    }

    public function save()
    {
        $sql = "INSERT INTO Users(name, email, password) VALUES('{$this->name}', '{$this->email}', '{$this->password}');";

        $save = $this->db->query($sql);

        return $save;
    }

}