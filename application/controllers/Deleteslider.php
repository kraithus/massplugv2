<?php
class Deleteslider extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('main_model');
                $this->load->library('session');
                $this->load->helper(array('form', 'url', 'url_helper'));
        }        

        public function delete($slug = NULL)
        {
                $this->main_model->delete_news_slider($slug);  
                $this->load->view('admin/delete');   
        }   
                          
}              

