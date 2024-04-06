<?php
class Editslider extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('main_model');
                $this->load->helper('url_helper');
                $this->load->helper(array('form', 'url'));
        }        

        public function view($slug = NULL)
        {
                $data['slider_item'] = $this->main_model->get_news_slider($slug);  

                if (empty($data['slider_item']))
        {
                show_404();
        }

                        $data['title'] = $data['slider_item']['title'];
                        $data['data_file'] = $data['slider_item']['data_file'];
                        $this->load->view('admin/edit_slider', $data);
        }
          
}              

