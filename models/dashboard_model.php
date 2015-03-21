<?php

class Dashboard_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function xhrInsert() {
        
        $text = $_POST['text'];
        
        $sth = $this->db->prepare('INSERT INTO data(text) VALUES(:text)');
        $sth->execute(array(':text' => $text));
        $data = array('text'=>$text, 'id'=> $this->db->lastInsertId());
        echo json_encode($data);
    }
    
    function xhrGetListings() {
        $sth = $this->db->query('SELECT * FROM data');
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }
    
    function xhrDeleteListing() {
        
        $id = $_POST['id'];       
        $sth = $this->db->prepare('DELETE FROM data WHERE id = :id');
        $sth->execute(array('id'=>$id));
        
    }

}