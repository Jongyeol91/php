<?php

class Todos_model extends CI_Model {

	public function __construct() {
		parent:: __construct();
	}

	public function getAllTodos() {
		$foundTodos = $this->db->query("SELECT * FROM todo")->result_array(); // 질의문+결과값 가져오기
		return $foundTodos;
	}

	public function getTodo($id) {
		return $this->db->query("SELECT * FROM todo WHERE id = $id") -> row(); // 객체형태로 가져오기
	}

	public function insertTodo($todo) {
		$newRow = array("todo" => $todo, "date" => date('Y-m-d H:i:s'));
		$this->db->insert("todo", $newRow);
		return $this->db->insert_id();
	}

	public function deleteTodo($id) {
		return $this->db->delete("todo", array('id' => $id));
	}
}
