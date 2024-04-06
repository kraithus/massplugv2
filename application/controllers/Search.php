<?php

class Search extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->helper(array('form', 'url', 'url_helper', 'date'));
		$this->load->library(array('typography', 'image_lib', 'form_validation', 'pagination', 'session'));
	}

public function article_search()
	{
		$search_query = $this->input->get('search');

		$data['count'] = $this->news_model->count_article_search($search_query);

		if ($data['count'] >= 0)
		{
			$_SESSION = array('search_result' => $search_query);
        }  

        $config = [
        'base_url' => site_url(). '/search/article_search/',
        'total_rows' => $this->news_model->count_article_search($_SESSION['search_result']),
        'per_page' => 8,
        'suffix' => '/?search='.$_SESSION['search_result'], 
        'first_url' => site_url(). '/search/article_search/?search='.$_SESSION['search_result'],
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
        'num_tag_close' => '</li>',               
        ];

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 

        $this->pagination->initialize($config); 			

		$data = [
            'count' => $this->news_model->count_article_search($search_query),
			'retrieve' => $this->news_model->get_article_search($config['per_page'], $page),
			'links' => $this->pagination->create_links(),
            'about_us' => 'Your Trusted Plug for the latest on music, entertainment, fashion, tech, lifestyle and photography',			
            'now' => time(),	
            'units' => 1		
		];	
			$this->load->view('news/result', $data);		
	}

}	

