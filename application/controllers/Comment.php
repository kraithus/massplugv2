<?php
class Comment extends CI_Controller {
        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper(array('url_helper', 'date', 'form'));
                $this->load->library(array('typography','session','form_validation','image_lib'));
        }  

        public function upload_main_comment()
        {
                $data = [
                        'main_item' => $this->news_model->get_news_main($slug = NULL)
                ];


            if ($this->form_validation->run() === FALSE)
            {     
                        
                $this->news_model->set_main_comments();
            }
                redirect('article' . '/' . $_SESSION['slug']);
        }  

        public function minor_galler_comment()
        {
                $data = [
                        'galler_item' => $this->news_model->get_news_galler($slug = NULL)
                ];


            if ($this->form_validation->run() === FALSE)
            {     
                        
                $this->news_model->set_minor_galler_comments();
            }
                redirect('photography' . '/' . $_SESSION['slug']);      
        }  

}                
  