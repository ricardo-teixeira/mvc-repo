<?php

class Login_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    
    public function run()
    {

        $login      = strip_tags(trim($_POST['login']));
        $password   = strip_tags(trim($_POST['password']));

        try {

            $sth = $this->db->prepare("SELECT user_id, role FROM user WHERE login = :login AND password = :password");
            $sth->execute(array(
                ':login'    => $login,
                ':password' => Hash::create('sha256', $password, HASH_PASSWORD_KEY)
                ));

            $data = $sth->fetch();

            $count = $sth->rowCount();
            if ($count > 0) {
                Session::init();
                Session::set('loggedIn', true);
                Session::set('role', $data['role']);
                Session::set('user_id', $data['user_id']);
                header('Location: '. URL . 'dashboard');
            } else {
                header('Location: '. URL . 'login');
            }
            
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        
    }

}

