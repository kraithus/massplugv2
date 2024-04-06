<?php
class Main extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('main_model');
                $this->load->helper(array('form', 'url', 'url_helper'));
                $this->load->library(array('pagination', 'session'));
        }

        public function panel()
        {       $data = [
                'main_count' => $this->main_model->count_news_main(),
                'slider_count' => $this->main_model->count_news_slider(),
                'topstory_count' => $this->main_model->count_news_topstory(),
                'galler_count' => $this->main_model->count_news_photogaller()
                ];

                if (isset($_SESSION['username'])){

                        $this->load->view('admin/panel' ,$data);
                }else
                redirect('login/signin');

        }                        

        public function create_slider()
	{
                if (isset($_SESSION['username'])){
			$this->load->view('admin/create_slider', array('error' => ' '));
                }
                else 
                redirect('login/signin'); 
	}

        public function create_galler()
        {
                if (isset($_SESSION['username'])){
                        $this->load->view('admin/create_galler', array('error' => ' '));
                }
                else 
                redirect('login/signin'); 
        }

        public function create_mainarticle()
        {
                if (isset($_SESSION['username'])){
                        $this->load->view('admin/create_mainarticle', array('error' => ' '));
                }
                else 
                redirect('login/signin');       

        }

        public function create_topstorytile()
        {
                if (isset($_SESSION['username'])){
                        $this->load->view('admin/create_topstorytile', array('error' => ' '));
                }
                else 
                redirect('login/signin'); 
        }

        public function view_mainarticles()
        {
                $config = [
                'base_url' => site_url(). '/main/view_mainarticles',
                'total_rows' => $this->main_model->count_news_main(),
                'per_page' => 8,
                'uri_segment' => 3,
                'enable_query_strings' => TRUE,
                'prev_link' => '&laquo Prev', 
                'next_link' => 'Next &raquo',     
                'cur_tag_open' => '<li><a>',//<a> tags embrace him cause he does not have auto generated <a> tag 
                'cur_tag_close' => '</li></a>',  
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',              
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>',
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',                 
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>' 
                ];

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 

                $this->pagination->initialize($config);  
                          
                $data = [
                'news' => $this->main_model->get_news_main_pagination($config['per_page'], $page),
                'links' => $this->pagination->create_links()
                ];
                
                $var = 1;
                if($var != 1){
                $this->session->set_flashdata('no_activity_msg', '<div class ="alert alert-success"> No recent uploads!');
                } else
                $this->load->view('admin/main_articles', $data);

        }

        public function view_sliders()
        {
                $config = [
                'base_url' => site_url(). '/main/view_sliders',
                'total_rows' => $this->main_model->count_news_slider(),
                'per_page' => 8,
                'uri_segment' => 3,
                'enable_query_strings' => TRUE,
                'prev_link' => '&laquo Prev', 
                'next_link' => 'Next &raquo',     
                'cur_tag_open' => '<li><a>',//<a> tags embrace him cause he does not have auto generated <a> tag 
                'cur_tag_close' => '</li></a>',  
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',              
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>', 
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>'
                ];

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 

                $this->pagination->initialize($config);  
                          
                $data = [
                'slider' => $this->main_model->get_news_slider_pagination($config['per_page'], $page),
                'links' => $this->pagination->create_links()
                ];
                if (isset($_SESSION['username'])){
                        $this->load->view('admin/sliders', $data);
                }
                else
                redirect('login/signin');        
                        
        }

        public function view_photogaller()
        {
                $config = [
                'base_url' => site_url(). '/main/view_photogaller',
                'total_rows' => $this->main_model->count_news_photogaller(),
                'per_page' => 8,
                'uri_segment' => 3,
                'enable_query_strings' => TRUE,
                'prev_link' => '&laquo Prev', 
                'next_link' => 'Next &raquo',     
                'cur_tag_open' => '<li><a>',//<a> tags embrace him cause he does not have auto generated <a> tag 
                'cur_tag_close' => '</li></a>',  
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',              
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>', 
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',                 
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>'                
                ];

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 

                $this->pagination->initialize($config);  
                          
                $data = [
                'gallery' => $this->main_model->get_news_galler_pagination($config['per_page'], $page),
                'links' => $this->pagination->create_links()
                ];
                if (isset($_SESSION['username'])){
                        $this->load->view('admin/photogaller', $data);
                }
                else
                redirect('login/signin');        
                        
        }
        
        public function view_topstories()
        {
                $config = [
                'base_url' => site_url(). '/main/view_topstories',
                'total_rows' => $this->main_model->count_news_topstory(),
                'per_page' => 8,
                'uri_segment' => 3,
                'enable_query_strings' => TRUE,
                'prev_link' => '&laquo Prev', 
                'next_link' => 'Next &raquo',     
                'cur_tag_open' => '<li><a>',//<a> tags embrace him cause he does not have auto generated <a> tag 
                'cur_tag_close' => '</li></a>',  
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',              
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>' 
                ];

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 

                $this->pagination->initialize($config);  
                          
                $data = [
                'top' => $this->main_model->get_news_topstories_pagination($config['per_page'], $page),
                'links' => $this->pagination->create_links()
                ];
                if (isset($_SESSION['username'])){
                        $this->load->view('admin/topstories', $data);
                }else
                redirect('login/signin');        
                        
        }
        
        public function logout()
        {
                session_destroy();
                redirect('login/signin');
        }        

}        