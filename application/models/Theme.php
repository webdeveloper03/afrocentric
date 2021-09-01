<?php



class Theme extends MY_Model{

	

	public function getNewPosition($table) {

		$query = $this->db->query('SELECT * FROM '.$table);

		return ($query->num_rows() + 1);

	}



	public function getSliders($slider_id = 0){

	   

		if(isset($slider_id) && $slider_id > 0){

		    

			$this->db->query("SELECT * FROM theme_sliders")->where(array('slider_id'=>$slider_id));

			

			}else{

			    

			$this->db->select("*")->from("theme_sliders")->order_by('slider_id','ASC');

		}

		

		$query = $this->db->get();

		$fetchRows = $query->result();

		return $fetchRows;

	}

	

	public function getSections($section_id = 0){

		if(isset($section_id) && $section_id > 0){

			$this->db->query("SELECT * FROM theme_sections")->where(array('section_id'=>$section_id));

    	} else {

			$this->db->select("*")->from("theme_sections")->order_by('position','ASC');

		}

		$query = $this->db->get();

		$fetchRows = $query->result();

		return $fetchRows;

	}



	public function getThemeHomeSectionsSettings($theme_id = 0) {

		$this->db->select("*");

		$this->db->from("theme_home_sections_setting");

		$this->db->where(array('theme_id'=>$theme_id));

		$this->db->order_by('sec_position', 'ASC');

		if($this->db->get()->num_rows() > 0) {

				$this->db->select("*");

				$this->db->from("theme_home_sections_setting");

				$this->db->where(array('theme_id'=>$theme_id));

				$this->db->order_by('sec_position', 'ASC');

				return $this->db->get()->result();

		} else {

			if($theme_id == 0) {

				$defaultSections = ['Membership Section','Home Content','Home Section','Video Section','Recommendation Section'];

				for ($i=0; $i < sizeof($defaultSections); $i++) { 

					$data = [

						'theme_id' => $theme_id,

						'sec_title' => $defaultSections[$i],

						'sec_is_enable' => 1,

						'sec_position'=> ($i + 1)

					];

					$this->db->insert('theme_home_sections_setting', $data);

				}

				$this->db->select("*");

				$this->db->from("theme_home_sections_setting");

				$this->db->where(array('theme_id'=>$theme_id));

				$this->db->order_by('sec_position', 'ASC');

				return $this->db->get()->result();

			}

		}

		return false;

	}



	public function updateThemeHomeSectionsSettings($secIds, $secStatus){

		try {

			for ($i=0; $i < sizeOf($secIds); $i++) { 

				$data = [

					'sec_is_enable' => $secStatus[$i],

					'sec_position'=> ($i + 1)

				];

				$this->db->where('sec_id', $secIds[$i]);

				$this->db->update('theme_home_sections_setting', $data);

			}

			return 'success';

		} catch (\Throwable $th) {

			return $th->getMessage();

		}

	}



	public function getRecommendation($recommendation_id = 0){

	   

		if(isset($recommendation_id) && $recommendation_id > 0){

		    

			$this->db->query("SELECT * FROM theme_recommendation")->where(array('recommendation_id'=>$recommendation_id));

			

			}else{

			    

			$this->db->select("*")->from("theme_recommendation")->order_by('position','ASC');

		}

		

		$query = $this->db->get();

		$fetchRows = $query->result();

		return $fetchRows;

	}



	public function getHomeContent($homecontent_id = 0){

	   

		if(isset($homecontent_id) && $homecontent_id > 0){

		    

			$this->db->query("SELECT * FROM theme_homecontent")->where(array('homecontent_id'=>$homecontent_id));

			

			}else{

			    

			$this->db->select("*")->from("theme_homecontent")->order_by('position','ASC');

		}

		

		$query = $this->db->get();

		$fetchRows = $query->result();

		return $fetchRows;

	}



	public function getVideos($video_id = 0){

	   

		if(isset($video_id) && $video_id > 0){

		    

			$this->db->query("SELECT * FROM theme_videos")->where(array('video_id'=>$video_id));

			

			}else{

			    

			$this->db->select("*")->from("theme_videos")->order_by('position','ASC');

		}

		

		$query = $this->db->get();

		$fetchRows = $query->result();

		return $fetchRows;

	}



    public function getPages($page_id = 0){

	   

		if(isset($page_id) && $page_id > 0){

		    

			$this->db->query("SELECT * FROM theme_pages")->where(array('page_id'=>$page_id));

			

			}else{

			    

			$this->db->select("*")->from("theme_pages")->order_by('page_id','ASC');

		}

		

		$query = $this->db->get();

		$fetchRows = $query->result();

		return $fetchRows;

	}
	

	public function get_links($status = null){
		if($status == true) {
			$this->db->where('tlink_status', 1);
		}
		$query = $this->db->get('theme_links');
		$fetchRows = $query->result();
		return $fetchRows;
	}

	public function create_tlink($data) {
		return $this->db->insert('theme_links',$data);
	}

	public function update_tlink($id, $data) {
		$this->db->where('tlink_id', $id);
		return $this->db->update('theme_links', $data);
	}

	public function delete_tlink($id) {
		return $this->db->delete('theme_links', array('tlink_id'=> $id));
	}

	

	public function save_slider_into_db($form_data,$image_details){

	     $post_data = [

	         'title' => $form_data['title'],

	         'description' => $form_data['description'],

	         'image' => $image_details,

	         'link' => $form_data['link'],

	         'button_text' => $form_data['button_text'],

	         'position'=>$form_data['position'],

	         'status' => $form_data['status'],

	         ];

	         $this->db->insert('theme_sections',$post_data);

	}



	public function save_section_into_db($form_data,$image_details){

	     $post_data = [

	         'title' => $form_data['title'],

	         'description' => $form_data['description'],

	         'image' => $image_details,

	         'link' => $form_data['link'],

	         'button_text' => $form_data['button_text'],

	         'position' => $form_data['position'],

	         'status' => $form_data['status'],

	         ];

	         $this->db->insert('theme_sections',$post_data);

	}



	public function save_recommendation_into_db($form_data,$image_details){

	     $post_data = [

	         'title' => $form_data['title'],

	         'description' => $form_data['description'],

	         'occupation'=>$form_data['occupation'],

	         'image' => $image_details,

	         'status' => $form_data['status'],

	         ];

	         $this->db->insert('theme_recommendation',$post_data);

	}



	public function save_video_into_db($form_data){



	     $post_data = [

	         'video_title' => $form_data['video_title'],

	         'video_sub_title' => $form_data['video_sub_title'],

	         'video_link'=>$form_data['video_link'],

	         'status' => $form_data['status'],

	         ];

	         $this->db->insert('theme_videos',$post_data);

	}



	public function save_homecontent_into_db($form_data,$image_details){



		 $title = $this->security->xss_clean($this->input->post('title'));

		 $description = $this->input->post('description');

		 $image = $this->security->xss_clean($this->input->post('image'));

		 $status = $this->security->xss_clean($this->input->post('status'));



	     $post_data = [

	         'title' => $form_data['title'],

	         'description' => $form_data['description'],

	         'image' => $image_details,

	         'status' => $form_data['status'],

	        ];

	        $this->db->insert('theme_homecontent',$post_data);

	}





	

	public function delete_faq($faq_id){

		$condtion = ['faq_id' =>$faq_id];

		$this->db->delete('theme_faq',$condtion);

   	}



	public function delete_slider($slider_id){

	     $condtion = ['slider_id' =>$slider_id];

	     $this->db->delete('theme_sliders',$condtion);

	}



	public function delete_section($section_id){

	     $condtion = ['section_id' =>$section_id];

	     $this->db->delete('theme_sections',$condtion);

	}



	public function delete_recommendation($recommendation_id){

	     $condtion = ['recommendation_id' =>$recommendation_id];

	     $this->db->delete('theme_recommendation',$condtion);

	}



	public function delete_homecontent($homecontent_id){

	     $condtion = ['homecontent_id' =>$homecontent_id];

	     $this->db->delete('theme_homecontent',$condtion);

	}



	public function delete_page($page_id){

	     $condtion = ['page_id' =>$page_id];

	     $this->db->delete('theme_pages',$condtion);

	}



	public function delete_video($video_id){

	     $condtion = ['video_id' =>$video_id];

	     $this->db->delete('theme_videos',$condtion);

	}



	public function get_slider_data_byid($slider_id){



	     return $this->db->where('slider_id',$slider_id)->get('theme_sliders')->row();

	}



	public function get_section_data_byid($section_id){



	     return $this->db->where('section_id',$section_id)->get('theme_sections')->row();

	}



	public function get_recommendation_data_byid($recommendation_id){



	     return $this->db->where('recommendation_id',$recommendation_id)->get('theme_recommendation')->row();

	}



	public function get_homecontent_data_byid($homecontent_id){



	     return $this->db->where('homecontent_id',$homecontent_id)->get('theme_homecontent')->row();

	}



	public function get_page_data_byid($page_id){



	     return $this->db->where('page_id',$page_id)->get('theme_pages')->row();

	}



	public function get_page_data_by_slug($slug){



	     return $this->db->where('slug',$slug)->get('theme_pages')->row();

	}

	public function get_all_routes()

    {

        return $this->db->get_where('theme_pages',array('status'=>1))->result_array();

    }

	public function get_video_data_byid($video_id){



	     return $this->db->where('video_id',$video_id)->get('theme_videos')->row();

	}





	public function create_slider_data($data){

		return $this->db->insert('theme_sliders',$data);

   	}



	public function update_slider_data($slider_id,$data){

		$this->db->where('slider_id', $slider_id);

		return $this->db->update('theme_sliders', $data);

	}



	public function get_faq($faq_id = null) {

		if($faq_id != null) {

			return $this->db->where('faq_id', $faq_id)->get('theme_faq')->row();

		} else {

			return $this->db->order_by('position','ASC')->get('theme_faq')->result();

		}

	}



	public function create_faq_data($data){

		return $this->db->insert('theme_faq',$data);

   	}



	public function update_faq_data($faq_id,$form__updated_data){

	    $this->db->where('faq_id', $faq_id);

		return $this->db->update('theme_faq', $form__updated_data);

	}

	 

	public function update_section_data($section_id,$form__updated_data){

	     $this->db->where('section_id',$section_id);

	     $this->db->update('theme_sections',$form__updated_data);

	}



	public function update_recommendation_data($recommendation_id,$form__updated_data){

	     $this->db->where('recommendation_id',$recommendation_id);

	     $this->db->update('theme_recommendation',$form__updated_data);

	}



	public function update_homecontent_data($homecontent_id,$form__updated_data){

	     $this->db->where('homecontent_id',$homecontent_id);

	     $this->db->update('theme_homecontent',$form__updated_data);

	}



	public function update_data($table,$where,$data){

		$this->db->where($where);

		$this->db->update($table,$data);

   }



	//This is the save function in module

	public function save_page_into_db($form_data){



	     $page_name = $this->security->xss_clean($this->input->post('page_name'));

	     $link_footer_section = $this->security->xss_clean($this->input->post('link_footer_section'));

		 $top_banner_title = $this->security->xss_clean($this->input->post('top_banner_title'));

		 $top_banner_sub_title = $this->security->xss_clean($this->input->post('top_banner_sub_title'));

		 $page_content_title = $this->security->xss_clean($this->input->post('page_content_title'));

         $status = $this->security->xss_clean($this->input->post('status'));

         $page_content = $this->input->post('page_content');

         $slug = str_replace(' ','_', $page_name);

         

	     $post_data = [

			'page_name' =>$page_name,  	

			'link_footer_section' =>$link_footer_section,  	

	        'top_banner_title' => $top_banner_title,

	        'top_banner_sub_title' => $top_banner_sub_title,

	        'page_content_title' => $page_content_title,

	        'page_content' => $page_content,

	        'status' => $status,

	        'slug'=>$slug, 

		];

		$this->db->insert('theme_pages',$post_data);

	}





	public function update_page_data($page_id,$form__updated_data){

		 $this->db->where('page_id',$page_id);

		 $link_footer_section = $this->security->xss_clean($this->input->post('link_footer_section'));

	     $page_name = $this->security->xss_clean($this->input->post('page_name'));

		 $top_banner_title = $this->security->xss_clean($this->input->post('top_banner_title'));

		 $top_banner_sub_title = $this->security->xss_clean($this->input->post('top_banner_sub_title'));

		 $page_content_title = $this->security->xss_clean($this->input->post('page_content_title'));

         $status = $this->security->xss_clean($this->input->post('status'));

         $page_content = $this->input->post('page_content');

         

         $slug = str_replace(' ','_', $page_name);

         

          $post_data = [

			'page_name' =>$page_name,  	

			'link_footer_section' =>$link_footer_section,  	

	        'top_banner_title' => $top_banner_title,

	        'top_banner_sub_title' => $top_banner_sub_title,

	        'page_content_title' => $page_content_title,

	        'page_content' => $page_content,

	        'status' => $status,

	        'slug'=>$slug, 

	        ];

	     $this->db->update('theme_pages',$post_data);

	}

	public function update_page_status($page_id,$status){

		 $this->db->where('page_id',$page_id);

		 $post_data = [

	        'status' => $status 

	        ];

	     $this->db->update('theme_pages',$post_data);

	}

	public function update_video_data($video_id,$form__updated_data){

	     $this->db->where('video_id',$video_id);

	     $this->db->update('theme_videos',$form__updated_data);

	}



    public function getSliderDetailsObject($slider_id){ 



         return $this->db->get_where('theme_sliders', array('slider_id' => $slider_id))->row_object(); 

    }

     

    public function update_settings_data($settings_id,$form__updated_data){

         if($settings_id != 0){

             $this->db->where('settings_id',$settings_id);

	         $this->db->update('theme_settings',$form__updated_data); 

         }else{

	         $this->db->insert('theme_settings',$form__updated_data);

         }

	        return true;   

	}



    public function getSettingsDetailsObject($settings_id){ 

        

        return $this->db->get_where('theme_settings', array('settings_id' => $settings_id))->row_object(); 

    }



    public function getSettings(){



     

         if(isset($settings_id) && $settings_id > 0){

            

            $this->db->query("SELECT * FROM theme_settings");

         }

         else

         {

          $this->db->select("*")->from("theme_settings");

         }

         

        $query = $this->db->get();

		$fetchRows = $query->result();

		return $fetchRows;

     }

}