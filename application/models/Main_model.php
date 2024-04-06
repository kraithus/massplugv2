<?php
class Main_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

		public function authenticate_user($username = FALSE, $password = FALSE)
		{
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$this->db->select('account_id AS account_id', FALSE);
			/*When executes it looks like this: 
			SELECT user_id AS user_id FROM `users` WHERE `username` = '$username' AND `password` = '$password'*/
			$query = $this->db->get('accounts');

			$count = count($query->result());
			return ($count);
		}

        public function set_news_slider()
		{
		    $this->load->helper(array('form', 'url'));

		    $slug = url_title($this->input->post('title'), 'dash', TRUE);
		    $time_stamp = date("Y-m-d h:i:s");
		    $image_info = $this->upload->data();

		    $data = array(
		        'title' => $this->input->post('title'),
		        'slug' => $slug,
		        'time_stamp' => $time_stamp,
		        'article' => $this->typography->nl2br_except_pre($this->input->post('article')),
		        'editor' => $this->input->post('editor'),
		        'category' => $this->input->post('category'),
		        'hooker' => $this->input->post('hooker'),
		        'data_file' => $image_info['file_name']
		    );
	
		    return $this->db->insert('slider', $data);
		}

		public function set_news_main()
		{
			$this->load->helper(array('form', 'url'));

		    $slug = url_title($this->input->post('title'), 'dash', TRUE);
		    $time_stamp = date("Y-m-d h:i:s");
		    $image_info = $this->upload->data();

		    $data = array(
		        'title' => $this->input->post('title'),
		        'slug' => $slug,
		        'time_stamp' => $time_stamp,
		        'article' => $this->typography->nl2br_except_pre($this->input->post('article')),
		        'editor' => $this->input->post('editor'),
		        'category' => $this->input->post('category'),
		        'hooker' => $this->input->post('hooker'),
		        'data_file' => $image_info['file_name']
		    );
	
		    return $this->db->insert('main_articles', $data);			
		}

		public function set_news_galler()
		{
			$this->load->helper(array('form', 'url'));

		    $slug = url_title($this->input->post('title'), 'dash', TRUE);
		    $time_stamp = date("Y-m-d h:i:s");
		    $image_info = $this->upload->data();

		    $data = array(
		        'title' => $this->input->post('title'),
		        'slug' => $slug,
		        'time_stamp' => $time_stamp,
		        'article' => $this->typography->nl2br_except_pre($this->input->post('article')),
		        'editor' => $this->input->post('editor'),
		        'category' => $this->input->post('category'),
		        'hooker' => $this->input->post('hooker'),
		        'data_file' => $image_info['file_name']
		    );
	
		    return $this->db->insert('minor_gallery', $data);			
		}

		public function set_news_topstories()
		{
			$this->load->helper(array('form', 'url'));

		    $slug = url_title($this->input->post('title'), 'dash', TRUE);
		    $time_stamp = date("Y-m-d h:i:s");
		    $image_info = $this->upload->data();

		    $data = array(
		        'title' => $this->input->post('title'),
		        'slug' => $slug,
		        'time_stamp' => $time_stamp,
		        'article' => $this->typography->nl2br_except_pre($this->input->post('article')),
		        'editor' => $this->input->post('editor'),
		        'category' => $this->input->post('category'),
		        'hooker' => $this->input->post('hooker'),
		        'data_file' => $image_info['file_name']
		    );
	
		    return $this->db->insert('top_story_tile', $data);			
		}

		public function get_news_slider($slug = FALSE)
		{
		        if ($slug === FALSE)
		        {
		                $query = $this->db->order_by('id', 'DESC')
		                				->get('slider');
		                return $query->result_array();
		        }

		        $query = $this->db->get_where('slider', array('slug' => $slug));
		        return $query->row_array();
		}

		public function get_news_slider_pagination ($limit, $start)
		{
				{		
		                $query = $this->db->limit($limit, $start)
		                				->order_by('id', 'DESC')
		                				->get('slider');
		                return $query->result_array();
				}

		        $query = $this->db->get_where('slider');
		}							

		public function get_news_main($slug = FALSE)
		{
		        if ($slug === FALSE)
		        {
		                $query = $this->db->order_by('id', 'DESC')
		                				->get('main_articles');
		                return $query->result_array();
		        }

		        $query = $this->db->get_where('main_articles', array('slug' => $slug));
		        return $query->row_array();
		}

		public function get_news_main_pagination ($limit, $start)
		{
				{		
		                $query = $this->db->limit($limit, $start)
		                				->order_by('id', 'DESC')
		                				->get('main_articles');
		                return $query->result_array();
				}

		        $query = $this->db->get_where('main_articles', array('slug' => $slug));
		        return $query->row_array();
		}							

		public function get_news_galler($slug = FALSE)
		{
		        if ($slug === FALSE)
		        {
		                $query = $this->db->order_by('id', 'DESC')
		                				->get('minor_gallery');	
		                return $query->result_array();
		        }

		        $query = $this->db->get_where('minor_gallery', array('slug' => $slug));
		        return $query->row_array();
		}

		public function get_news_galler_pagination ($limit, $start)
		{
				{		
		                $query = $this->db->limit($limit, $start)
		                				->order_by('id', 'DESC')
		                				->get('minor_gallery');
		                return $query->result_array();
				}

		        $query = $this->db->get_where('minor_gallery', array('slug' => $slug));
		}									

		public function get_news_topstories($slug = FALSE)
		{
		        if ($slug === FALSE)
		        {
		                $query = $this->db->order_by('id', 'DESC')
		                				->get('top_story_tile');
		                return $query->result_array();
		        }

		        $query = $this->db->get_where('top_story_tile', array('slug' => $slug));
		        return $query->row_array();
		}

		public function get_news_topstories_pagination ($limit, $start)
		{
				{		
		                $query = $this->db->limit($limit, $start)
		                				->order_by('id', 'DESC')
		                				->get('top_story_tile');
		                return $query->result_array();
				}

		        $query = $this->db->get_where('top_story_tile', array('slug' => $slug));
		}									


		public function update_news_main($slug = FALSE)
		{
			$this->load->helper(array('form', 'url'));

		    $slug = url_title($this->input->post('title'), 'dash', TRUE);
		    $time_stamp = date("Y-m-d h:i:s");
		    $id = $this->input->post('id');

		    $data = array(
		    	'id' => $id,
		        'title' => $this->input->post('title'),
		        'slug' => $slug,
		        'time_stamp' => $time_stamp,
		        'article' => $this->typography->nl2br_except_pre($this->input->post('article')),
		        'editor' => $this->input->post('editor'),
		        'category' => $this->input->post('category'),
		        'hooker' => $this->input->post('hooker'),
		    );
			
			$query = $this->db->where('id', $id);
		    return $this->db->update('main_articles', $data);			
		}

		public function update_news_slider($slug = FALSE)
		{
			$this->load->helper(array('form', 'url'));

		    $slug = url_title($this->input->post('title'), 'dash', TRUE);
		    $time_stamp = date("Y-m-d h:i:s");
		    $id = $this->input->post('id');

		    $data = array(
		    	'id' => $id,
		        'title' => $this->input->post('title'),
		        'slug' => $slug,
		        'time_stamp' => $time_stamp,
		        'article' => $this->typography->nl2br_except_pre($this->input->post('article')),
		        'editor' => $this->input->post('editor'),
		        'category' => $this->input->post('category'),
		        'hooker' => $this->input->post('hooker'),
		    );
			
			$query = $this->db->where('id', $id);
		    return $this->db->update('slider', $data);			
		}	

		public function update_news_topstory($slug = FALSE)
		{
			$this->load->helper(array('form', 'url'));

		    $slug = url_title($this->input->post('title'), 'dash', TRUE);
		    $time_stamp = date("Y-m-d h:i:s");
		    $id = $this->input->post('id');

		    $data = array(
		    	'id' => $id,
		        'title' => $this->input->post('title'),
		        'slug' => $slug,
		        'time_stamp' => $time_stamp,
		        'article' => $this->typography->nl2br_except_pre($this->input->post('article')),
		        'editor' => $this->input->post('editor'),
		        'category' => $this->input->post('category'),
		        'hooker' => $this->input->post('hooker'),
		    );
			
			$query = $this->db->where('id', $id);
		    return $this->db->update('top_story_tile', $data);			
		}

		public function update_news_photogaller($slug = FALSE)
		{
			$this->load->helper(array('form', 'url'));

		    $slug = url_title($this->input->post('title'), 'dash', TRUE);
		    $time_stamp = date("Y-m-d h:i:s");
		    $id = $this->input->post('id');

		    $data = array(
		    	'id' => $id,
		        'title' => $this->input->post('title'),
		        'slug' => $slug,
		        'time_stamp' => $time_stamp,
		        'article' => $this->typography->nl2br_except_pre($this->input->post('article')),
		        'editor' => $this->input->post('editor'),
		        'category' => $this->input->post('category'),
		        'hooker' => $this->input->post('hooker'),
		    );
			
			$query = $this->db->where('id', $id);
		    return $this->db->update('minor_gallery', $data);			
		}

		public function delete_news_main($slug = FALSE)
		{
				if ($slug === FALSE)
		        {
		                $query = $this->db->get('main_articles');
		                return $query->result_array();
		        }

		        $query = $this->db->delete('main_articles', array('slug' => $slug));
		        return $query;
		}

		public function delete_news_slider($slug = FALSE)
		{
				if ($slug === FALSE)
		        {
		                $query = $this->db->get('slider');
		                return $query->result_array();
		        }

		        $query = $this->db->delete('slider', array('slug' => $slug));
		        return $query;
		}

		public function delete_news_topstory($slug = FALSE)
		{
				if ($slug === FALSE)
		        {
		                $query = $this->db->get('top_story_tile');
		                return $query->result_array();
		        }

		        $query = $this->db->delete('top_story_tile', array('slug' => $slug));
		        return $query;
		}

		public function delete_news_galler($slug = FALSE)
		{
				if ($slug === FALSE)
		        {
		                $query = $this->db->get('minor_gallery');
		                return $query->result_array();
		        }

		        $query = $this->db->delete('minor_gallery', array('slug' => $slug));
		        return $query;
		}						

		public function count_news_main()
		{
		        $query = $this->db->count_all('main_articles');
		        return $query;
		}

		public function count_news_slider()
		{
		        $query = $this->db->count_all('slider');
		        return $query;
		}

		public function count_news_topstory()
		{
		        $query = $this->db->count_all('top_story_tile');
		        return $query;
		}																			

		public function count_news_photogaller()
		{
		        $query = $this->db->count_all('minor_gallery');
		        return $query;
		}						

}        