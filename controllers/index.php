<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();;  
    }
    
    public function index() {
        echo 'INSIDE INDEX/INDEX';
        $this->view->render('index/index');
    }
    
    public function details() {
        $this->view->render('index/index');
    }

}