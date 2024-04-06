<?php
class Editmain extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('main_model');
                $this->load->helper('url_helper');
                $this->load->helper(array('form', 'url'));
        }        

        public function view($slug = NULL)
        {
                $data['main_item'] = $this->main_model->get_news_main($slug);  

                if (empty($data['main_item']))
        {
                show_404();
        }

                        $data['title'] = $data['main_item']['title'];
                        $data['data_file'] = $data['main_item']['data_file'];
                        $this->load->view('admin/edit_main', $data);
        }
          
}              

