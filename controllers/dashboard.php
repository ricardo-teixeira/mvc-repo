<?php

class Dashboard extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        
        $this->view->js = array('dashboard/js/default.js');
    }

    public function index() {
   
        $this->view->render('dashboard/index');
    }
    
    public function logout(){
        Session::destroy();
        header('Location: '. URL . 'login');
        exit;
    }
    
    public function xhrInsert() {
        $this->model->xhrInsert(); 
    }
    
    public function xhrGetListings() {
        $this->model->xhrGetListings();
    }
    
    public function xhrDeleteListing() {
        $this->model->xhrDeleteListing();
    }
}
