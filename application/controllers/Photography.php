<?php
class Photography extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper(array('url_helper', 'date'));
                $this->load->library(array('form_validation','image_lib','session'));          
        }        

        public function view($slug = NULL)
        {       
                $data['count'] = $this->news_model->count_galler_slug($slug);

                if ($data['count'] == 1)
                {
                    $_SESSION = array(
                        'slug' => $slug 
                    );
                }

                $data['galler_item'] = $this->news_model->get_news_galler($slug);
                $category = $data['galler_item']['category'];
                $_SESSION['category'] = $category;                

                $data = [
                'galler_item' => $this->news_model->get_news_galler($slug),
                'gallery_limit8' => $this->news_model->get_news_galler_limit8(),
                'gallery_limit3' => $this->news_model->get_news_galler_limit3(),
                'main_limit3' => $this->news_model->get_news_main_limit3(),
                'main_limit4random' => $this->news_model->get_news_main_limit4random(),
                'music_limit1' => $this->news_model->get_news_music_limit1(),
                'music_limit8' => $this->news_model->get_news_music_limit8(),
                'fashion_limit1' => $this->news_model->get_news_fashion_limit1(),
                'entertainment_limit1' => $this->news_model->get_news_entertainment_limit1(),
                'entertainment_limit3' => $this->news_model->get_news_entertainment_limit3(),
                'category_byvar' => $this->news_model->get_galler_category_byvar(),
                'music_limit3random' => $this->news_model->get_news_music_limit3random(),
                'galler_comments' => $this->news_model->get_minor_galler_comments(),
                'comment_count' => $this->news_model->count_minor_galler_comments(),                
                'about_us' => 'Your Trusted Plug for the latest on music, entertainment, fashion, tech, lifestyle and photography',
                'now' => time(),
                'units' => 1                
                ];    
             
                if (empty($data['galler_item']))
        {
                show_404();
        }

                        $data['title'] = $data['galler_item']['title'];
                        $data['data_file'] = $data['galler_item']['data_file'];
                        $this->load->view('news/photography', $data);
        }
          
}              

