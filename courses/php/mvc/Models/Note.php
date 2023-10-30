<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/mvc/Models/BaseModel.php';

class Note extends BaseModel {
    public $title;
    public $date;
    public $content;
    public $user_id;

    public function __construct($title = null, $date = null, $content = null, $user_id = null)
    {
        $this->title = (isset($title)) ? $title : 'note 1';
        $this->date = (isset($date)) ? $date : date("Y-m-d h:i:sa");
        $this->content = (isset($content)) ? $content : 'test content';
        $this->user_id = (isset($user_id)) ? $user_id : 1;

        parent::__construct();
    }

    // getters and setters
    public function set_title($title)
    {
        $this->title = $title;
    }

    public function get_title()
    {
        return $this->title;
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
        $sql = "INSERT INTO Notes(title, date, content, user_id) VALUES('{$this->title}', CURDATE(), '{$this->content}', {$this->user_id});";

        $save = $this->db->query($sql);

        return $save;
    }

}