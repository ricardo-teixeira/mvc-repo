<?php

class Login_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function run() {
        
        $login      = strip_tags(trim($_POST['login']));
        $password   = strip_tags(trim($_POST['password']));
        
        $sth = $this->db->prepare("SELECT id, role FROM users WHERE login = :login AND password = MD5(:password)");
        $sth->execute(array(
            ':login'    => $login,
            ':password' => $password
        ));
        
        $data = $sth->fetch();

        $count = $sth->rowCount();
        if ($count > 0) {
            Session::init();
            Session::set('loggedIn', true);
            Session::set('role', $data['role']);
            header('Location: '. URL . 'dashboard');
        } else {
            header('Location: '. URL . 'login');
        }

    }

}

