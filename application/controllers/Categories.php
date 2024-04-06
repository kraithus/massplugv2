<?php
class Categories extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper(array('url_helper', 'date'));
                $this->load->library('pagination');             
        }        

        public function fashion()
        {
                $config = [
                'base_url' => site_url(). '/categories/fashion',
                'total_rows' => $this->news_model->count_news_fashion(),
                'per_page' => 8,
                'uri_segment' => 3,
                'enable_query_strings' => TRUE,
                'prev_link' => '&laquo', 
                'next_link' => '&raquo',     
                'cur_tag_open' => '<li class="active"><a>',//<a> tags embrace him cause he does not have auto generated <a> tag 
                'cur_tag_close' => '</li></a>',  
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',                
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',               
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>' 
                ];

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 

                $this->pagination->initialize($config);  

                $data = [
                'fashion_news' => $this->news_model->get_news_fashion_pagination($config['per_page'], $page),
                'main_limit3' => $this->news_model->get_news_main_limit3(),
                'gallery_limit8' => $this->news_model->get_news_galler_limit8(),
                'music_limit3' => $this->news_model->get_news_music_limit3(),
                'gallery_limit3' => $this->news_model->get_news_galler_limit3(),
                'lifestyle_limit3' => $this->news_model->get_news_lifestyle_limit3(),
                'links' => $this->pagination->create_links(),
                'title' => 'Fashion',   
                'about_us' => 'Your Trusted Plug for the latest on music, entertainment, fashion, tech, lifestyle and photography',
                'now' => time(),
                'units' => 1           
                ];


                if (empty($data['fashion_news']))
        {
                show_404();
        }

                        $this->load->view('categories/fashion', $data);
        }

        public function music()
        {
                $config = [
                'base_url' => site_url(). '/categories/music',
                'total_rows' => $this->news_model->count_news_music(),
                'per_page' => 8,
                'uri_segment' => 3,
                'enable_query_strings' => TRUE,
                'prev_link' => '&laquo', 
                'next_link' => '&raquo',     
                'cur_tag_open' => '<li class="active"><a>',
                'cur_tag_close' => '</li></a>',  
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',                
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',               
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>'                 
                ];

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 

                $this->pagination->initialize($config);                  
                
                $data = [
                'music_news' => $this->news_model->get_news_music_pagination($config['per_page'], $page), 
                'main_limit3' => $this->news_model->get_news_main_limit3(),
                'gallery_limit8' => $this->news_model->get_news_galler_limit8(),
                'entertainment_limit3' => $this->news_model->get_news_entertainment_limit3(),
                'fashion_limit3' => $this->news_model->get_news_fashion_limit3(),
                'links' => $this->pagination->create_links(),
                'title' => 'Music',
                'about_us' => 'Your Trusted Plug for the latest on music, entertainment, fashion, tech, lifestyle and photography',
                'now' => time(),
                'units' => 1                             
                ];           

                if (empty($data['music_news']))
        {
                show_404();
        }

                        $this->load->view('categories/music', $data);
        }  

        public function entertainment()
        {
                $config = [
                'base_url' => site_url(). '/categories/entertainment',
                'total_rows' => $this->news_model->count_news_entertainment(),
                'per_page' => 8,
                'uri_segment' => 3,
                'enable_query_strings' => TRUE,
                'prev_link' => '&laquo', 
                'next_link' => '&raquo',     
                'cur_tag_open' => '<li class="active"><a>',
                'cur_tag_close' => '</li></a>',  
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',                
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',               
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>'                 
                ];

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 

                $this->pagination->initialize($config);       

                $data = [
                'entertainment_news' => $this->news_model->get_news_entertainment_pagination($config['per_page'], $page),
                'main_limit3' => $this->news_model->get_news_main_limit3(),
                'gallery_limit8' => $this->news_model->get_news_galler_limit8(),
                'music_limit3' => $this->news_model->get_news_music_limit3(),
                'fashion_limit3' => $this->news_model->get_news_fashion_limit3(),
                'links' => $this->pagination->create_links(),
                'title' => 'Entertainment',
                'about_us' => 'Your Trusted Plug for the latest on music, entertainment, fashion, tech, lifestyle and photography',
                'now' => time(),
                'units' => 1                             
                ];           

                if (empty($data['entertainment_news']))
        {
                show_404();
        }

                        $this->load->view('categories/entertainment', $data);
        } 

        public function photography()
        {
                $config = [
                'base_url' => site_url(). '/categories/photography',
                'total_rows' => $this->news_model->count_news_galler(),
                'per_page' => 8,
                'uri_segment' => 3,
                'enable_query_strings' => TRUE,
                'prev_link' => '&laquo', 
                'next_link' => '&raquo',     
                'cur_tag_open' => '<li class="active"><a>',
                'cur_tag_close' => '</li></a>',  
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',                
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',               
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>'                 
                ];

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 

                $this->pagination->initialize($config);       

                $data = [
                'photography_news' => $this->news_model->get_news_galler_pagination($config['per_page'], $page),
                'main_limit3' => $this->news_model->get_news_main_limit3(),
                'gallery_limit8' => $this->news_model->get_news_galler_limit8(),
                'entertainment_limit3' => $this->news_model->get_news_entertainment_limit3(),
                'fashion_limit3' => $this->news_model->get_news_fashion_limit3(),
                'fashion_limit8' => $this->news_model->get_news_fashion_limit8(),
                'technology_limit3' => $this->news_model->get_news_technology_limit3(),                
                'links' => $this->pagination->create_links(),
                'title' => 'Photography',
                'about_us' => 'Your Trusted Plug for the latest on music, entertainment, fashion, tech, lifestyle and photography',
                'now' => time(),
                'units' => 1                                        
                ];           

                if (empty($data['photography_news']))
        {
                show_404();
        }
                        $this->load->view('categories/photography', $data);
        }

        public function lifestyle()
        {
                $config = [
                'base_url' => site_url(). '/categories/lifestyle',
                'total_rows' => $this->news_model->count_news_lifestyle(),
                'per_page' => 8,
                'uri_segment' => 3,
                'enable_query_strings' => TRUE,
                'prev_link' => '&laquo', 
                'next_link' => '&raquo',     
                'cur_tag_open' => '<li class="active"><a>',
                'cur_tag_close' => '</li></a>',  
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',                
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',               
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>'                 
                ];

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 

                $this->pagination->initialize($config);                  
                
                $data = [
                'lifestyle_news' => $this->news_model->get_news_lifestyle_pagination($config['per_page'], $page), 
                'main_limit3' => $this->news_model->get_news_main_limit3(),
                'gallery_limit8' => $this->news_model->get_news_galler_limit8(),
                'entertainment_limit3' => $this->news_model->get_news_entertainment_limit3(),
                'fashion_limit3' => $this->news_model->get_news_fashion_limit3(),
                'links' => $this->pagination->create_links(),
                'title' => 'Lifestyle',
                'about_us' => 'Your Trusted Plug for the latest on music, entertainment, fashion, tech, lifestyle and photography',
                'now' => time(),
                'units' => 1                             
                ];           

                if (empty($data['lifestyle_news']))
        {
                show_404();
        }

                        $this->load->view('categories/lifestyle', $data);
        }   

        public function technology()
        {
                $config = [
                'base_url' => site_url(). '/categories/technology',
                'total_rows' => $this->news_model->count_news_technology(),
                'per_page' => 8,
                'uri_segment' => 3,
                'enable_query_strings' => TRUE,
                'prev_link' => '&laquo', 
                'next_link' => '&raquo',     
                'cur_tag_open' => '<li class="active"><a>',
                'cur_tag_close' => '</li></a>',  
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',                
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',               
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>'                 
                ];

                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 

                $this->pagination->initialize($config);                  
                
                $data = [
                'technology_news' => $this->news_model->get_news_technology_pagination($config['per_page'], $page), 
                'main_limit3' => $this->news_model->get_news_main_limit3(),
                'gallery_limit8' => $this->news_model->get_news_galler_limit8(),
                'music_limit3' => $this->news_model->get_news_music_limit3(),
                'fashion_limit3' => $this->news_model->get_news_fashion_limit3(),
                'links' => $this->pagination->create_links(),
                'title' => 'Technology',
                'about_us' => 'Your Trusted Plug for the latest on music, entertainment, fashion, tech, lifestyle and photography',
                'now' => time(),
                'units' => 1                             
                ];           

                if (empty($data['technology_news']))
        {
                show_404();
        }

                        $this->load->view('categories/technology', $data);
        }                                      
          
}              

