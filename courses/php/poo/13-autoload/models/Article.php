<?php


class Article
{
    public $title;
    public $date;

    public function __construct()
    {
        $this->title = "God of War";
        $this->date = "09-12-2005";
    }

    public function __toString()
    {
        return $this->title . " : " . $this->date;
    }

}