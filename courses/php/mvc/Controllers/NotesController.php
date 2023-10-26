<?php


class NotesController {

    public function create()
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/mvc/Views/Notes/create.php';
    }

    public function show()
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/mvc/Models/Note.php';
        
        $note = new Note();

        $notes = $note->get_all();

        require_once $_SERVER['DOCUMENT_ROOT'].'/courses_and_resources/courses/php/mvc/Views/Notes/show.php';
    }

    public function delete()
    {

    }
}