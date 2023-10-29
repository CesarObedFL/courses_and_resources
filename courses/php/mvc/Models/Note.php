<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/mvc/Models/BaseModel.php';

class Note extends BaseModel {
    public $name;
    public $date;
    public $content;
    public $user_id;

    public function __construct($name = null, $date = null, $content = null, $user_id = null)
    {
        $this->name = (isset($name)) ? $name : 'note 1';
        $this->date = (isset($date)) ? $date : today();
        $this->content = (isset($content)) ? $content : 'test content';
        $this->user_id = (isset($user_id)) ? $user_id : 1;

        parent::__construct();
    }

    // getters and setters
    public function set_name($name)
    {
        $this->name = $name;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_date()
    {
        return $this->date;
    }

    public function get_user_id()
    {
        return $this->user_id;
    }

    public function set_content($content)
    {
        $this->content = $content;
    }

    public function get_content()
    {
        return $this->content;
    }

    public function save()
    {
        $sql = "INSERT INTO notes(name, date, content, user_id) VALUES('{$this->name}', CURDATE(), '{$this->content}', {$this->user_id});";

        $save = $this->db->query($sql);

        return $save;
    }

}