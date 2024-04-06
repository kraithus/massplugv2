<?php

class Upload extends CI_Controller {
	var $root_path;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('typography', 'pagination', 'image_lib', 'session'));
		$this->root_path = realpath(FCPATH.'/uploads');
	}

	public function do_uploadslider()
	{
	$this->load->library('form_validation');

	$this->form_validation->set_rules('title', 'Title', 'required');
	$this->form_validation->set_rules('article', 'Article', 'required');
	$this->form_validation->set_rules('editor', 'Editor', 'required');
	$this->form_validation->set_rules('category', 'Category', 'required');
	$this->form_validation->set_rules('hooker', 'Hooker', 'required');
	$this->form_validation->set_rules('data_file', 'Media', 'required');

	if ($this->form_validation->run() === FALSE)
	{
		$this->load->view('admin/create_slider', array('error' => ' '));
		}
		else
		{
			$image_info = $this->upload->data();
			$data = array(
				'data_file' => $image_info['file_name']								
			);
		}          
		
		$field_name = 'data_file';
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 5000;
		$config['encrypt_name']         = 'TRUE';
		$config['image_library']		= 'gd2';
		$config['source_image']			= './uploads/'.$data['data_file'];
		$config['width']				= '550';
		$config['height']				= '425';

		$this->load->library(array('upload','image_lib'), $config);

		if ( ! $this->image_lib->crop())
		{
			echo $this->image_lib->display_errors();
		}	

		if ( ! $this->upload->do_upload($field_name))
		{
			$error = array('error' => $this->upload->display_errors());

		}
		else
		{
			$image_info = $this->upload->data();
			$data = array(
				'data_file' => $image_info['file_name']								
			);
				$this->main_model->set_news_slider();			
		}
	}               

	public function do_uploadmain()
	{
		$field_name = 'data_file';
		$this->load->library('upload');
		$initi = $this->upload->initialize(array(
				'upload_path' => ROOT_UPLOAD_PATH,
				'allowed_types' => 'gif|jpg|png|jpeg',
				'max_size' => 5000,
				'encrypt_name' => 'TRUE'
		));

		if (!$this->upload->do_upload($field_name))
		{
			$error = array('error' => $this->upload->display_errors());

		}
		else {			
			$data = $this->upload->data();
			$image_info = $data['file_name'];
		}									
		//thumbnails
		$sizes = array('_mobile'=>array(75, 75), '_thumb'=>array(236, 220), '_medium'=>array(270, 200), '_large'=>array(370, 200)); 	
		//loadlibrary
		$this->load->library('image_lib');
		foreach ($sizes as $key=>$resize) {
			$config = array(
				'source_image' => $data['full_path'],
				'new_image' => ROOT_UPLOAD_PATH .'/'.$key,
				'maintain_ratio' => TRUE,
				'width' => $resize[0],
				'height' => $resize[1],
				'quality' => 67
			);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();
		}
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();	
		$this->main_model->set_news_main();	
		$this->session->set_flashdata('success_msg', '<div class ="alert alert-success"> Article uploaded successfully!');
        redirect('main/view_mainarticles');	
	}                

	public function do_uploadgaller()
	{
		$field_name = 'data_file';
		$this->load->library('upload');
		$initi = $this->upload->initialize(array(
				'upload_path' => ROOT_UPLOAD_PATH,
				'allowed_types' => 'gif|jpg|png|jpeg',
				'max_size' => 5000,
				'encrypt_name' => 'TRUE'
		));

		if (!$this->upload->do_upload($field_name))
		{
			$error = array('error' => $this->upload->display_errors());

		}
		else {			
			$data = $this->upload->data();
			$image_info = $data['file_name'];
		}									
		//thumbnails
		$sizes = array('_mobile'=>array(75, 75), '_thumb'=>array(236, 220), '_medium'=>array(270, 200), '_large'=>array(370, 200)); 	
		//loadlibrary
		$this->load->library('image_lib');
		foreach ($sizes as $key=>$resize) {
			$config = array(
				'source_image' => $data['full_path'],
				'new_image' => ROOT_UPLOAD_PATH .'/'.$key,
				'maintain_ratio' => TRUE,
				'width' => $resize[0],
				'height' => $resize[1],
				'quality' => 50
			);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();
		}
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
				$this->main_model->set_news_galler();
				$this->session->set_flashdata('success_msg', '<div class ="alert alert-success"> Article uploaded successfully!');
        		redirect('main/view_photogaller');	
	}                

	public function do_uploadtopstory()
	{
		$field_name = 'data_file';
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 5000;
		$config['encrypt_name']         = 'TRUE';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($field_name))
		{
			$error = array('error' => $this->upload->display_errors());

		}
		else
		{
			$image_info = $this->upload->data();
			$data = array(
				'data_file' => $image_info['file_name']								
			);
				$this->main_model->set_news_topstories();	
				$this->session->set_flashdata('success_msg', '<div class ="alert alert-success"> New ad uploaded successfully!');
        		redirect('main/view_topstories');							
		}
	}

	public function do_editmain()
	{
		$this->main_model->update_news_main();			
		$this->session->set_flashdata('success_msg', '<div class ="alert alert-success"> Article edited successfully!');
        redirect('main/view_mainarticles');
	}

	public function do_edittopstory()
	{
		$this->main_model->update_news_topstory();			
		$this->session->set_flashdata('success_msg', '<div class ="alert alert-success"> Advert edited successfully!');
        redirect('main/view_topstories');
	}  

	public function do_editslider()
	{
		$this->main_model->update_news_slider();			
		$this->session->set_flashdata('success_msg', '<div class ="alert alert-success"> Article edited successfully!');
        redirect('main/view_sliders');
	}   

	public function do_editphotogaller()
	{
		$this->main_model->update_news_photogaller();			
		$this->session->set_flashdata('success_msg', '<div class ="alert alert-success"> Article edited successfully!');
    	redirect('main/view_photogaller');
	}                	                	             	                	              	                	                	                

}