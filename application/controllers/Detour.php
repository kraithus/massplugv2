<?php
class Detour extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper(array('url_helper', 'date', 'form'));
                $this->load->library(array('form_validation','image_lib', 'session'));
        } 
        public function redir()
        {
                redirect('article' . '/' . $_SESSION['slug']);
        }
}        