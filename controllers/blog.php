<?php
    class Blog extends CI_Controller {
        
        function index() {
            // $person = array(); // 배열생성
            // $person["name"] = "박종열";
            // $person["region"] ="노원";
            
            $person = array("name" => "박종열", "region" => "nowon");
            
            $this->load->database();
            $this->load->model('myblog_model');
            $data = $this->myblog_model->gets(); // 오브젝트에 접속하는 약속
            $this->load->view('partials/header');
            $this->load->view('content/dataview', array('data' => $data));
            $this->load->view('partials/footer');
        }
        
        // function get($userId) {
        //     $this->load->database(); // 데이터베이스 라이브러리호출
        //     $this->load->model("myblog_model"); // 모델 호출
            
        //     $this->load->view('partials/header');
        //     $this->load->view('content/dataview', )
        //     //$this->load->view('get', array('userId' => $userId));
        //     $this->load->view('partials/footer');
        // }
    }
?>
