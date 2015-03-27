<?php

class User_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function userList()
    {
        return $this->db->select('SELECT user_id, login, role FROM user');
    }

    public function userSingle($user_id)
    {
        return $this->db->select('SELECT user_id, login, password, role FROM user WHERE user_id = :user_id', array(':user_id'=> $user_id));
    }

    public function create($data)
    {

        $this->db->insert('user', array(
            'login'     => $data['login'],
            'password'  => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'role'      => $data['role']
            ));

    }

    public function save($data)
    {

        $postData = array(
            'login'     => $data['login'],
            'user_id'   => $data['user_id'],
            'password'  => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'role'      => $data['role']
        );

        $this->db->update('user', $postData, "`user_id` = {$data['user_id']}");

    }

    public function delete($user_id)
    {

        $result = $this->db->select('SELECT role FROM user WHERE user_id = :user_id', array(':user_id' => $user_id));

        if($result[0]['role'] == 'owner')
            return false;

        $this->db->delete('user', "user_id = '$user_id'");
    
    }
    
}