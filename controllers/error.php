<?php

class Error extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->title = '404 Error';
        $this->view->msg = "This page doesn't exists.";
        
        $this->view->render('header');
        $this->view->render('error/index');
        $this->view->render('footer');
    }

}
