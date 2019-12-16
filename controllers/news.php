<?php
class News extends CI_Controller {
    function __construct(){
        parent::__construct();
    }

    public function index(){
        $data['news'] = array("title"=>"연습", "text"=>"할일1");
        $data['title'] = 'News archive';

        $this->load->view('partials/header');
        $this->load->view('news/index', $data);
        $this->load->view('partials/footer');
    }

    // public function create() {
    //     $this->load->helper('form');
    //     $this->load->library('form_validation');
        
    //     $data['title'] = 'Create a news item';
        
    //     $this->form_validation->set_rules('title', 'Title', 'required');
    //     $this->form_validation->set_rules('text', 'text', 'required');
        
    //     if ($this->form_validation->run() === FALSE) {
    //         $this->load->view('partials/header');
    //         $this->load->view('news/create');
    //         $this->load->view('partials/footer');
    //     } else {
            
    //     }
    // }

}