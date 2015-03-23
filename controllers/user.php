<?php

class User extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        
        if($logged == false || $role != 'owner') {
            Session::destroy();
            header('Location: '. URL . 'login');
            exit;
        }
        
    }

    public function index() {
        $this->view->userList = $this->model->userList();
        $this->view->render('user/index');
    }

    public function create() {

        $data               = array();
        $data['login']      = strip_tags(trim($_POST['login']));
        $data['password']   = strip_tags(trim($_POST['password']));
        $data['role']       = strip_tags(trim($_POST['role']));

        // TODO: Error checking...

        $this->model->create($data);
        header('Location: ' . URL . 'user');

    }

    public function edit($id) {
        $this->view->user = $this->model->userSingle($id);
        $this->view->render('user/edit');
    }

    public function save($id) {

        $data               = array();
        $data['id']         = strip_tags(trim($id));
        $data['login']      = strip_tags(trim($_POST['login']));
        $data['password']   = strip_tags(trim($_POST['password']));
        $data['role']       = strip_tags(trim($_POST['role']));

        // TODO: Error checking...

        $this->model->save($data);
        header('Location: ' . URL . 'user');
    }

    public function delete($id) {

        $this->model->delete($id);
        header('location: ' . URL . 'user');
    }

}
