<?php
class Edittopstory extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('main_model');
                $this->load->helper('url_helper');
                $this->load->helper(array('form', 'url'));
        }        

        public function view($slug = NULL)
        {
                $data['topstory_item'] = $this->main_model->get_news_topstories($slug);  

                if (empty($data['topstory_item']))
        {
                show_404();
        }

                        $data['title'] = $data['topstory_item']['title'];
                        $data['data_file'] = $data['topstory_item']['data_file'];
                        $this->load->view('admin/edit_topstory', $data);
        }
          
}              

