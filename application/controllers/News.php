<?php 
//This Controller Handles the basic News Views and the View For the Slider per view
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper(array('url_helper','date','form'));
                $this->load->library('image_lib');
                $this->output->enable_profiler(TRUE);                

        }

        public function index()
        {       //add more dollarsigndatas for pulling other information
                $data = [
                'main_limit3' => $this->news_model->get_news_main_limit3(),
                'main_limit4' => $this->news_model->get_news_main_limit4(),
                'main_limit6skip4' => $this->news_model->get_news_main_limit6skip4(),
                'main_limit1random' => $this->news_model->get_news_main_limit1random(),
                'slider_limit3random' => $this->news_model->get_news_slider_limit3random(),        
                'slider' => $this->news_model->get_news_slider(),
                'top' => $this->news_model->get_news_topstories(),
                'top_limit4' => $this->news_model->get_news_topstories_limit4(),
                'top_limit1' => $this->news_model->get_news_topstories_limit1(),
                'top_limit1random' => $this->news_model->get_news_topstories_limit1random(),
                'gallery' => $this->news_model->get_news_galler(),
                'gallery_limit8' => $this->news_model->get_news_galler_limit8(),
                'gallery_limit1random' => $this->news_model->get_news_galler_limit1random(),
                'gallery_limit2' => $this->news_model->get_news_galler_limit2(),
                'gallery_limit3skip2' => $this->news_model->get_news_galler_limit3skip2(),
                'music' => $this->news_model->get_news_music(),
                'music_limit1' => $this->news_model->get_news_music_limit1(),
                'music_limit2' => $this->news_model->get_news_music_limit2(),
                'music_limit4' => $this->news_model->get_news_music_limit4(),
                'music_limit8skip3' => $this->news_model->get_news_music_limit8skip3(),
                'music_limit2skip1' => $this->news_model->get_news_music_limit2skip1(),                
                'entertainment' => $this->news_model->get_news_entertainment(),
                'entertainment_limit1' => $this->news_model->get_news_entertainment_limit1(),
                'entertainment_limit2' => $this->news_model->get_news_entertainment_limit2(),
                'entertainment_limit3skip2' => $this->news_model->get_news_entertainment_limit3skip2(),
                'fashion' => $this->news_model->get_news_fashion(),
                'fashion_limit1' => $this->news_model->get_news_fashion_limit1(),
                'fashion_limit2' => $this->news_model->get_news_fashion_limit2(),
                'fashion_limit2skip1' => $this->news_model->get_news_fashion_limit2skip1(),
                'about_us' => 'Your Trusted Plug for the latest on music, entertainment, fashion and photography',
                'now' => time(),
                'units' => 1,
                ];

                $this->load->view('news/index', $data);
        }

        public function view($slug = NULL)
        {
                $data = [
                'news_item' => $this->news_model->get_news_slider($slug),         
                'gallery_limit8' => $this->news_model->get_news_galler_limit8(),
                'main_limit3' => $this->news_model->get_news_main_limit3(),
                'music_limit1' => $this->news_model->get_news_music_limit1(),
                'fashion_limit1' => $this->news_model->get_news_fashion_limit1(),
                'entertainment_limit1' => $this->news_model->get_news_entertainment_limit1(),
                'music_limit3random' => $this->news_model->get_news_music_limit3random()                
                ];  

                if (empty($data['news_item']))
        {
                show_404();
        }
                        $data['category'] = $data['news_item']['category'];
                        $data['title'] = $data['news_item']['title'];
                        $data['data_file'] = $data['news_item']['data_file'];
                        $this->load->view('news/slider', $data);
        }
          
}              

