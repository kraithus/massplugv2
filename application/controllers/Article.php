<?php
class Article extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper(array('url_helper', 'date', 'form'));
                $this->load->library(array('form_validation','image_lib', 'session',));
        }        

        public function view($slug = NULL)
        {
                $data['count'] = $this->news_model->count_news_slug($slug);

                if ($data['count'] == 1)
                {
                    $session = array(
                    'slug' => $slug
                );

                $this->session->set_userdata($session);

                }  

                $data['main_item'] = $this->news_model->get_news_main($slug);
                $category = $data['main_item']['category'];
                $_SESSION['category'] = $category;  
                               
                $data = [
                'main_item' => $this->news_model->get_news_main($slug),    
                'main_limit3' => $this->news_model->get_news_main_limit3(),
                'main_limit4random' => $this->news_model->get_news_main_limit4random(),
                'music_limit1' => $this->news_model->get_news_music_limit1(),
                'fashion_limit1' => $this->news_model->get_news_fashion_limit1(),
                'fashion_limit3' => $this->news_model->get_news_fashion_limit3(),
                'entertainment_limit1' => $this->news_model->get_news_entertainment_limit1(),
                'music_limit3random' => $this->news_model->get_news_music_limit3random(),
                'category_byvar' => $this->news_model->get_news_category_byvar(),
                'main_comments' => $this->news_model->get_news_main_comments(),
                'comment_count' => $this->news_model->count_news_main_comments(),
                'gallery_limit8' => $this->news_model->get_news_galler_limit8(),
                'about_us' => 'Your Trusted Plug for the latest on music, entertainment, fashion, tech, lifestyle and photography',
                'now' => time(),
                'units' => 1
                ];                

                if (empty($data['main_item']))
                {
                    show_404();
                }       
                $this->load->view('news/article', $data);
        }

}              

