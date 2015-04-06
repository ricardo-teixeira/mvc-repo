<?php

class User extends Controller {

    function __construct()
    {
        parent::__construct();
        Auth::handleLogin();
        
    }

    public function index()
    {
        $this->view->title = 'Users';
        $this->view->userList = $this->model->userList();
        
        $this->view->render('header');
        $this->view->render('user/index');
        $this->view->render('footer');
    }

    public function create()
    {
        $data               = array();
        $data['login']      = strip_tags(trim($_POST['login']));
        $data['password']   = strip_tags(trim($_POST['password']));
        $data['role']       = strip_tags(trim($_POST['role']));

        // TODO: Error checking...

        $this->model->create($data);
        header('Location: ' . URL . 'user');

    }

    public function edit($user_id)
    {
        $this->view->title = 'Edit User';
        $this->view->user = $this->model->userSingle($user_id);
        
        $this->view->render('header');
        $this->view->render('user/edit');
        $this->view->render('footer');
    }

    public function save($user_id)
    {
        $data               = array();
        $data['user_id']    = strip_tags(trim($user_id));
        $data['login']      = strip_tags(trim($_POST['login']));
        $data['password']   = strip_tags(trim($_POST['password']));
        $data['role']       = strip_tags(trim($_POST['role']));

        // TODO: Error checking...

        $this->model->save($data);
        header('Location: ' . URL . 'user');
    }

    public function delete($user_id)
    {

        $this->model->delete($user_id);
        header('location: ' . URL . 'user');
    }

}
