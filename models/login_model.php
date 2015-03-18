<?php

class Login_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function run() {
        
        $login      = strip_tags(trim($_POST['login']));
        $password   = strip_tags(trim($_POST['password']));
        
        $stmt = $this->db->prepare("SELECT id FROM users WHERE login = :login AND password = MD5(:password)");
        $stmt->execute(array(
            ':login'    => $login,
            ':password' => $password
        ));
        
        //$data = $stmt->fetch();
        
        $count = $stmt->rowCount();
        if ($count > 0) {
            Session::init();
            Session::set('loggedIn', true);
            header('location: '. URL . 'dashboard');
        } else {
            header('location: '. URL . 'login');
        }

    }

}

