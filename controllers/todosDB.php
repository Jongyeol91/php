<?php

class TodosDB extends CI_Controller {

	function __construct() {
		parent::__construct();
		// 모듈 불러오기
		$this->load->database();
		$this->load->model("/test/todos_model"); // 모델 호출
		$this->load->helper(array('form', "korean")); // korean_helper.php에 있는 함수 사용 가능해짐
		$this->load->library('form_validation');
	}

	function index() {
		$data["todos"] = $this->getAllTodos();
		$data["mappedTodos"] = array_map(function ($value) {
			return $value["todo"];
		}, $data["todos"]);

		$this->load->view('/partials/header.html');
		$this->load->view('/test/index.html', $data);
		$this->load->view('/partials/footer.html');
	}

	function getAllTodos() {
		return $this->todos_model->getAllTodos();
	}

	function delete($id) {
		$this->todos_model->deleteTodo($id);
		$this->index();
	}

	function add() {
		$this->_head();
		$this->load->library('form_validation');
		// 첫번째: name
		// 두번째: 사람이 알아보기 쉬운 인자 (에러발생시 사용)
		// 데이터에 대한 유효성 규칙
		$this->form_validation->set_rules('title', '제목', 'required');
		$this->form_validation->set_rules('description', '본문', 'required');

		$title = $this->input->post('title');
		$description = $this->input->post('description');

		if ($this->form_validation->run() == TRUE) {
			$this->_create($title, $description);
		}
		$this->load->view('/test/add.html');
		$this->load->view('/partials/footer.html');
	}

	function get($id) {
		$data = $this->todos_model->getTodo($id);
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		$this->load->view('/test/eachTodo.html', $data);
	}

	// private route
	function _head() {
		$this->load->view('/partials/header.html');
	}

	// 리스트에 추가하기
	function _create($title, $description) {
		$todos_id = $this->todos_model->insertTodo($title, $description);
		$this->load->helper('url');
		redirect('/todosdb/get/'.$todos_id);
	}

}
