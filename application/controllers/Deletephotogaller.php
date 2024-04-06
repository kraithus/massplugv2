<?php
class Deletephotogaller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('main_model');
                $this->load->library('session');
                $this->load->helper(array('form', 'url', 'url_helper'));
        }        

        public function delete($slug = NULL)
        {
                $this->main_model->delete_news_galler($slug);  
                $this->session->set_flashdata('success_msg', '<div class ="alert alert-success"> Article deleted successfully!');
                redirect('main/view_photogaller');  
        }  

}              

