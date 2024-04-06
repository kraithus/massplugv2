<?php
class Top extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
        }        

        public function view($slug = NULL)
        {
                $data = [
                'top_item' => $this->news_model->get_news_topstories($slug), 
                'gallery_limit8' => $this->news_model->get_news_galler_limit8(),
                'gallery_limit3' => $this->news_model->get_news_galler_limit3(),
                'main_limit3' => $this->news_model->get_news_main_limit3(),
                'music_limit1' => $this->news_model->get_news_music_limit1(),
                'music_limit3' => $this->news_model->get_news_music_limit3(),
                'fashion_limit1' => $this->news_model->get_news_fashion_limit1(),
                'fashion_limit3' => $this->news_model->get_news_fashion_limit3(),
                'entertainment_limit1' => $this->news_model->get_news_entertainment_limit1(),
                'music_limit3random' => $this->news_model->get_news_music_limit3random()                
                ];

                if (empty($data['top_item']))
        {
                show_404();
        } 

                        $data['title'] = $data['top_item']['title'];
                        $data['data_file'] = $data['top_item']['data_file'];
                        $this->load->view('news/top', $data);
        }
          
}              

