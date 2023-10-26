<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/mvc/Models/BaseModel.php';

class Note extends BaseModel {
    public $name;
    public $content;

    public function __construct($name = null, $content = null)
    {
        $this->name = (isset($name)) ? $name : 'note 1';
        $this->content = (isset($content)) ? $content : 'test content';
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

    public function set_content($content)
    {
        $this->content = $content;
    }

    public function get_content()
    {
        return $this->content;
    }

}