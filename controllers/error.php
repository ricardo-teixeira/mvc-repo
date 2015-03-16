<?php

class Error extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->msg = "This page doesn't exists.";
        $this->view->render('error/index');
    }

}
