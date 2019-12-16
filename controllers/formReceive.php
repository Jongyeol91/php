<?php
class FormReceive extends CI_Controlle {
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
    }

    function index() {
        if ($this->input->post('submit') == true) {
            $data['value1'] = $this->input->post('todo');
            $data['method'] = 'post';
        }
        echo "!!!!!!!!!!!!!";
    }

} 