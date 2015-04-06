<?php

class Note extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    public function index()
    {
        $this->view->title = 'Notes';
        $this->view->noteList = $this->model->noteList();
        $this->view->render('header');
        $this->view->render('note/index');
        $this->view->render('footer');
    }

    public function create()
    {
        $data           = array(
            'title'     => strip_tags(trim($_POST['title'])),
            'content'   => htmlspecialchars(trim($_POST['content']))
        );

        // TODO: Error checking...

        $this->model->create($data);
        header('Location: ' . URL . 'note');
    }

    public function edit($id)
    {
        $this->view->note = $this->model->noteSingle($id);
        
        if (empty($this->view->note)) {
            die('This is an invalid note!');
        }
        
        $this->view->title = 'Edit Note';
        $this->view->render('header');
        $this->view->render('note/edit');
        $this->view->render('footer');
    }

    public function save($note_id)
    {
        $data          = array(
            'note_id'  => strip_tags(trim($note_id)),
            'title'    => strip_tags(trim($_POST['title'])),
            'content'  => htmlspecialchars(trim($_POST['content']))
        );

        // TODO: Error checking...

        $this->model->save($data);
        header('Location: ' . URL . 'note');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . URL . 'note');
    }

}
