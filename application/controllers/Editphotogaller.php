<?php
class Editphotogaller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('main_model');
                $this->load->helper('url_helper');
                $this->load->helper(array('form', 'url'));
        }        

        public function view($slug = NULL)
        {
                $data['galler_item'] = $this->main_model->get_news_galler($slug);  

                if (empty($data['galler_item']))
        {
                show_404();
        }

                        $data['title'] = $data['galler_item']['title'];
                        $data['data_file'] = $data['galler_item']['data_file'];
                        $this->load->view('admin/edit_photogaller', $data);
        }
          
}              

