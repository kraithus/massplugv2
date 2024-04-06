<?php 
class News_model extends CI_Model {

		public function __construct()
		{
				$this->load->database();
				$this->load->helper(array('url'));
		}

		public function set_main_comments($slug = FALSE)
		{	
		    $time_stamp = date("Y-m-d h:i:s");

		    $data = array(
		        'commenter_name' => $this->input->post('commenter_name'),
		        'time_stamp' => $time_stamp,
		        'comment' => $this->typography->nl2br_except_pre($this->input->post('comment')),
		        'main_slug' => $_SESSION['slug']
		    );
	
		    return $this->db->insert('main_comments', $data);			
		}

		public function set_minor_galler_comments($slug = FALSE)
		{	
		    $time_stamp = date("Y-m-d h:i:s");

		    $data = array(
		        'commenter_name' => $this->input->post('commenter_name'),
		        'time_stamp' => $time_stamp,
		        'comment' => $this->typography->nl2br_except_pre($this->input->post('comment')),
		        'minor_gallery_slug' => $_SESSION['slug']
		    );
	
		    return $this->db->insert('minor_gallery_comments', $data);			
		}	

		public function count_article_search($search_query = FALSE)
		{   
				$count = $this->db->like('title', $search_query, 'both')
						 	->or_like('article', $search_query, 'both')
						 	->or_like('hooker', $search_query, 'both')				
							->from('main_articles')
							->count_all_results();
				return $count;	
		}

		public function get_article_search($limit, $start)
		{				
				$this->db->limit($limit, $start);	
				$this->db->like('title', $_SESSION['search_result'], 'both');
				$this->db->or_like('article', $_SESSION['search_result'], 'both');
				$this->db->or_like('hooker', $_SESSION['search_result'], 'both');				
				$query = $this->db->get('main_articles');
				return $query->result_array();
		}			

		public function get_news_slider($slug = FALSE)
		{
		        if ($slug === FALSE)
		        {
		                $query = $this->db->get('slider');
		                return $query->result_array();
		        }

		        $query = $this->db->get_where('slider', array('slug' => $slug));
		        return $query->row_array();
		}

		public function get_news_slider_limit3random ($slug = FALSE)
		{
				if ($slug === FALSE)
				{
						$query = $this->db->limit(3)
										->order_by('id', 'RANDOM')
										->get('slider');
						return $query->result_array();				
				}

				$query = $this->db->get_where('slider', array('slug' => $slug));	
		}		

		public function get_news_main($slug = FALSE)
		{
		        if ($slug === FALSE)
		        {
		                $query = $this->db->get('main_articles');
		                return $query->result_array();
		        }

		        $query = $this->db->get_where('main_articles', array('slug' => $slug));
		        return $query->row_array();
		}

		public function count_news_slug($slug = FALSE)
		{		
				$count = $this->db->where('slug', $slug)
							->from('main_articles')
							->count_all_results();
				return $count;				
		}

		public function count_galler_slug($slug = FALSE)
		{		
				$count = $this->db->where('slug', $slug)
							->from('minor_gallery')
							->count_all_results();
				return $count;				
		}		

		public function get_news_main_comments()
		{				
				$query = $this->db->get_where('main_comments', array('main_slug' => $_SESSION['slug']));
				return $query->result_array();
		}

		public function count_news_main_comments()
		{				
				$count = $this->db->where('main_slug', $_SESSION['slug'])
							->from('main_comments')
							->count_all_results();
				return $count;			
		}			

		public function get_minor_galler_comments($main_slug = FALSE)
		{		
				if ($main_slug === FALSE)
				{
				$query = $this->db->get_where('minor_gallery_comments', array('minor_gallery_slug' => $_SESSION['slug']));
				return $query->result_array();
				}
		}

		public function count_minor_galler_comments()
		{				
				$count = $this->db->where('minor_gallery_slug', $_SESSION['slug'])
							->from('minor_gallery_comments')
							->count_all_results();
				return $count;			
		}				

		public function get_news_main_limit1random ($slug = FALSE)
		{
				if ($slug === FALSE)
				{
						$query = $this->db->limit(1)
										->order_by('id', 'RANDOM')
										->get('main_articles');
						return $query->result_array();				
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}						

		public function get_news_main_limit3 ($slug = FALSE)
		{
				if ($slug === FALSE)
				{
						$query = $this->db->limit(3)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();				
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}

		public function get_news_main_limit4random ($slug = FALSE)
		{
				if ($slug === FALSE)
				{
						$query = $this->db->limit(4)
										->order_by('id', 'RANDOM')
										->get_where('main_articles', array('slug !=' => $_SESSION['slug']));
						return $query->result_array();				
				}					
		}							

		public function get_news_main_limit4 ($slug = FALSE)
		{
				if ($slug === FALSE)
				{
						$query = $this->db->limit(4)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();				
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}

		public function get_news_main_limit6skip4 ($slug = FALSE)
		{
				if ($slug === FALSE)
				{
						$query = $this->db->limit(6 , $offset = 4)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();				
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}						

		public function get_news_galler($slug = FALSE)
		{
		        if ($slug === FALSE)
		        {
		                $query = $this->db->get('minor_gallery');
		                return $query->result_array();
		        }

		        $query = $this->db->get_where('minor_gallery', array('slug' => $slug));
		        return $query->row_array();
		}

		public function count_news_galler()
		{
				$category = 'Photography';
				$query = $this->db->where('category', $category)
							->from('minor_gallery')
							->count_all_results();
				return $query;				
		}		

		public function get_news_galler_pagination ($limit, $start)
		{
				$category = 'Photography';
				{		
						$this->db->limit($limit, $start);
						$query = $this->db->order_by('id', 'DESC')
										->get_where('minor_gallery', array('category' => $category));
						return $query->result_array();
				}

				$query = $this->db->get_where('minor_gallery');	
		}			

		public function get_news_galler_limit1random ($slug = FALSE)
		{
				if ($slug === FALSE)
				{
						$query = $this->db->limit(1)
										->order_by('id', 'RANDOM')
										->get('minor_gallery');
						return $query->result_array();				
				}

				$query = $this->db->get_where('minor_gallery', array('slug' => $slug));	
		}				

		public function get_news_galler_limit2 ($slug = FALSE)
		{
				if ($slug === FALSE)
				{
						$query = $this->db->limit(2)
										->order_by('id', 'DESC')
										->get('minor_gallery');
						return $query->result_array();				
				}

				$query = $this->db->get_where('minor_gallery', array('slug' => $slug));	
		}		

		public function get_news_galler_limit3 ($slug = FALSE)
		{
				if ($slug === FALSE)
				{
						$query = $this->db->limit(3)
										->order_by('id', 'DESC')
										->get('minor_gallery');
						return $query->result_array();				
				}

				$query = $this->db->get_where('minor_gallery', array('slug' => $slug));	
		}

		public function get_news_galler_limit3skip2 ($slug = FALSE)
		{
				if ($slug === FALSE)
				{
						$query = $this->db->limit(3, $offset = 2)
										->order_by('id', 'DESC')
										->get('minor_gallery');
						return $query->result_array();				
				}

				$query = $this->db->get_where('minor_gallery', array('slug' => $slug));	
		}				

		public function get_news_galler_limit8 ($slug = FALSE)
		{
				if ($slug === FALSE)
				{
						$query = $this->db->limit(8)
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
		                $query = $this->db->get('top_story_tile');
		                return $query->result_array();
		        }

		        $query = $this->db->get_where('top_story_tile', array('slug' => $slug));
		        return $query->row_array();
		}

		public function get_news_topstories_limit1 ($slug = FALSE)
		{
				if ($slug === FALSE)
				{
						$query = $this->db->limit(1)
										->order_by('id', 'DESC')
										->get('top_story_tile');
						return $query->result_array();				
				}

				$query = $this->db->get_where('top_story_tile', array('slug' => $slug));	
		}

		public function get_news_topstories_limit1random ($slug = FALSE)
		{
				if ($slug === FALSE)
				{
						$query = $this->db->limit(1)
										->order_by('id', 'RANDOM')
										->get('top_story_tile');
						return $query->result_array();				
				}

				$query = $this->db->get_where('top_story_tile', array('slug' => $slug));	
		}											

		public function get_news_topstories_limit4 ($slug = FALSE)
		{
				if ($slug === FALSE)
				{
						$query = $this->db->limit(4)
										->order_by('id', 'DESC')
										->get('top_story_tile');
						return $query->result_array();				
				}

				$query = $this->db->get_where('top_story_tile', array('slug' => $slug));	
		}										

		public function get_news_entertainment ($slug = FALSE)
		{
				$category = 'Entertainment';
				if ($slug === FALSE)
				{
						$query = $this->db->get_where('main_articles', array('category' => $category));
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}

		public function get_news_category_byvar ()
		{
				{
						$query = $this->db->limit(4)
										->order_by('id', 'DESC')
										->get_where('main_articles', array('category' => $_SESSION['category'], 'slug !=' =>$_SESSION['slug']));
						return $query->result_array();
				}
		}

		public function get_galler_category_byvar ()
		{
				{
						$query = $this->db->limit(4)
										->order_by('id', 'DESC')
										->get_where('minor_gallery', array('category' => $_SESSION['category'], 'slug !=' =>$_SESSION['slug']));
						return $query->result_array();
				}
		}								

		public function count_news_entertainment()
		{		
				$category = 'Entertainment';
				
		        $query = $this->db->where('category', $category)
		        				->from('main_articles')
		        				->count_all_results();
		        return $query;	   		
		}			

		public function get_news_entertainment_pagination ($limit, $start)
		{
				$category = 'Entertainment';
				{		
						$this->db->limit($limit, $start);
						$query = $this->db->order_by('id', 'DESC')
										->get_where('main_articles', array('category' => $category));
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles');	
		}									

		public function get_news_entertainment_limit1 ($slug = FALSE)
		{
				$category = 'Entertainment';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(1)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();				
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}

		public function get_news_entertainment_limit2 ($slug = FALSE)
		{
				$category = 'Entertainment';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(2)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();				
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}		

		public function get_news_entertainment_limit3 ($slug = FALSE)
		{
				$category = 'Entertainment';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(3)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();				
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}

		public function get_news_entertainment_limit3skip2 ($slug = FALSE)
		{
				$category = 'Entertainment';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(3, $offset = 2)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();				
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}																												

		public function get_news_music ($slug = FALSE)
		{
				$category = 'Music';
				if ($slug === FALSE)
				{
						$query = $this->db->get_where('main_articles', array('category' => $category));
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}

		public function count_news_music()
		{		
				$category = 'Music';
				
		        $query = $this->db->where('category', $category)
		        				->from('main_articles')
		        				->count_all_results();
		        return $query;	   		
		}

		public function get_news_music_pagination ($limit, $start)
		{
				$category = 'Music';
				{		
						$this->db->limit($limit, $start);
						$query = $this->db->order_by('id', 'DESC')
										->get_where('main_articles', array('category' => $category));
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles');	
		}												

		public function get_news_music_limit1 ($slug = FALSE)
		{
				$category = 'Music';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(1)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}		

		public function get_news_music_limit2 ($slug = FALSE)
		{
				$category = 'Music';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(2)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}

		public function get_news_music_limit2skip1 ($slug = FALSE)
		{
				$category = 'Music';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(2, $offset = 1)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}		

		public function get_news_music_limit3 ($slug = FALSE)
		{
				$category = 'Music';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(3)
										->order_by('id')
										->get('main_articles');
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}

		public function get_news_music_limit3random ($slug = FALSE)
		{
				$category = 'Music';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(3)
										->order_by('id', 'RANDOM')
										->get('main_articles');
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}						

		public function get_news_music_limit4 ($slug = FALSE)
		{
				$category = 'Music';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(4)
										->order_by('id')
										->get('main_articles');
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}

		public function get_news_music_limit8 ($slug = FALSE)
		{
				$category = 'Music';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(8)
										->order_by('id')
										->get('main_articles');
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}	

		public function get_news_music_limit8skip3 ($slug = FALSE)
		{
				$category = 'Music';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(8, $offset = 3)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}																																	

		public function get_news_fashion ($slug = FALSE)
		{
				$category = 'Fashion';
				if ($slug === FALSE)
				{
						$query = $this->db->order_by('id', 'DESC')
										->get_where('main_articles', array('category' => $category));
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}

		public function count_news_fashion()
		{		
				$category = 'Fashion';
				
		        $query = $this->db->where('category', $category)
		        				->from('main_articles')
		        				->count_all_results();
		        return $query;	    		
		}							

		public function get_news_fashion_pagination ($limit, $start)
		{
				$category = 'Fashion';
				{		
						$this->db->limit($limit, $start);
						$query = $this->db->order_by('id', 'DESC')
										->get_where('main_articles', array('category' => $category));
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles');	
		}	

		public function get_news_fashion_limit1 ($slug = FALSE)
		{
				$category = 'Fashion';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(1)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}

		public function get_news_fashion_limit2 ($slug = FALSE)
		{
				$category = 'Fashion';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(2)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}

		public function get_news_fashion_limit8 ($slug = FALSE)
		{
				$category = 'Fashion';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(8)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}		

		public function get_news_fashion_limit2skip1 ($slug = FALSE)
		{
				$category = 'Fashion';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(2, $offset = 1)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}		

		public function get_news_fashion_limit3 ($slug = FALSE)
		{
				$category = 'Fashion';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(3)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}

		public function get_news_lifestyle_pagination ($limit, $start)
		{
				$category = 'Lifestyle';
				{		
						$this->db->limit($limit, $start);
						$query = $this->db->order_by('id', 'DESC')
										->get_where('main_articles', array('category' => $category));
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles');	
		}

		public function count_news_lifestyle()
		{		
				$category = 'Lifestyle';
				
		        $query = $this->db->where('category', $category)
		        				->from('main_articles')
		        				->count_all_results();
		        return $query;	    		
		}

		public function get_news_lifestyle_limit3 ($slug = FALSE)
		{
				$category = 'Lifestyle';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(3)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();				
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}		

		public function get_news_technology_pagination ($limit, $start)
		{
				$category = 'Technology';
				{		
						$this->db->limit($limit, $start);
						$query = $this->db->order_by('id', 'DESC')
										->get_where('main_articles', array('category' => $category));
						return $query->result_array();
				}

				$query = $this->db->get_where('main_articles');	
		}

		public function get_news_technology_limit3 ($slug = FALSE)
		{
				$category = 'Technology';
				if ($slug === FALSE)
				{
						$query = $this->db->where('category', $category)
										->limit(3)
										->order_by('id', 'DESC')
										->get('main_articles');
						return $query->result_array();				
				}

				$query = $this->db->get_where('main_articles', array('slug' => $slug));	
		}			

		public function count_news_technology()
		{		
				$category = 'Technology';
				
		        $query = $this->db->where('category', $category)
		        				->from('main_articles')
		        				->count_all_results();
		        return $query;	    		
		}										


}