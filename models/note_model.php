<?php

class Note_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function noteList()
    {
        return $this->db->select('SELECT * FROM note WHERE user_id = :user_id', 
                                    array(':user_id' => $_SESSION['user_id']));
    }
    
    public function noteSingle($note_id)
    {
        return $this->db->select('SELECT * FROM note WHERE note_id = :note_id AND user_id = :user_id', 
                                    array(':note_id'=> $note_id, ':user_id' => $_SESSION['user_id']));
    }

    public function create($data)
    {

        $this->db->insert('note', array(
            'title'         => $data['title'],
            'user_id'       => $_SESSION['user_id'],
            'content'       => $data['content'],
            'date_added'    => gmdate('Y-m-d H:i:s'),
            'last_edited'   => gmdate('Y-m-d H:i:s')
            ));

    }

    public function save($data)
    {

        $postData = array(
            'title'         => $data['title'],
            'content'       => $data['content'],
            'last_edited'   => date('Y-m-d H:i:s')
        );

        $this->db->update('note', $postData, "`note_id` = {$data['note_id']} AND user_id = {$_SESSION['user_id']}");

    }

    public function delete($id)
    {

        $this->db->delete('note', "`note_id` = {$id} AND user_id = {$_SESSION['user_id']}");
    
    }
    
}