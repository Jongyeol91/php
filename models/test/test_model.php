<?php
class Test_model extends CI_Model {
    public $todos = array("test model1", "test model2", "test model3", "test model4");
    
    public function __construct(){
        parent:: __construct();
    }

    public function getAllTodos () {
        echo "연결확인";
        // return $this->db->query("SELECT * FROM user")->result(); // 질의문+결과값 가져오기
        return $this->todos;
    }

    public function insertTodo ($todo) {
        array_push($this->todos, $todo);

    }
}