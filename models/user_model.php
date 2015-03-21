<?php

class User_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function singleUser($id) {

        try {
            $sth = $this->db->prepare('SELECT id, login, password, role FROM users WHERE id = :id');
            $sth->execute(array(':id'=> $id));
            return $sth->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }

    public function userList() {
        
        try {
            $sth = $this->db->query('SELECT id, login, role FROM users');
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }

    public function create($data) {

        try {
            $sth = $this->db->prepare('INSERT INTO users (login, password, role) VALUES (:login, :password, :role)');
            $sth->execute(array(
                ':login'    => $data['login'],
                ':password' => md5($data['password']),
                ':role'     => $data['role']
                ));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }

    public function save($data) {

        try {
            $sth = $this->db->prepare('UPDATE users SET login = :login, password = :password, role = :role WHERE id = :id');
            $sth->execute(array(
                ':id'       => $data['id'],
                ':login'    => $data['login'],
                ':password' => md5($data['password']),
                ':role'     => $data['role']
                ));
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function delete($id) {

        try {
            $sth = $this->db->prepare('DELETE FROM users WHERE id = :id');
            $sth->execute(array(':id' => $id));
        } catch (Exception $e) {
            echo $e->getMessage();
        }      

    }
    
}