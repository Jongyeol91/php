<?php 

class Todos extends CI_Controller {

    function __construct() {
        parent::__construct();
        // 모듈 불러오기
        $this->load->model("/test/test_model"); // 모델 호출
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    
	function index() {
        $todos = $this->getAllTodos();
        $data["todos"] = $todos;
        $this->load->view('/test/index.html', $data);
    }

    // 리스트에 추가하기
    function create() {
        $todo = $this->input->post("todo");
        $this->test_model->insertTodo($todo);
        $this->index();
    }

    function getAllTodos () {
        return $this->test_model->getAllTodos();
    }

  
}
