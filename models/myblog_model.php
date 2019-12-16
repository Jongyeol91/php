<?php
class Myblog_model extends CI_Model {
    public function __construct(){
        parent:: __construct();
        // $this->load->database();
    }
    
    public function gets () {
        echo "연결확인";
        //return $this->db->query("SELECT * FROM user")->result(); // 질의문+결과값 가져오기
        return $this->db->query("SELECT * FROM user")->result(); // 질의문+결과값 가져오기
    }

    public function get($blog_id) {
        
    }

// This code looks similar to the controller code that was used earlier.
// It creates a new model by extending CI_Model and loads the database library. 
//This will make the database class available through the $this->db object.

    public function get_blog($slug = FALSE) {
        if ($slug === FALSE)
        {
            $query = $this->db->get('myblog');
            return $query->result_array();
        }
        
        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }
}