<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Image extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation', 'image_lib');
        }

        public function index()
        {
          $this->load->view('image', array('error' => ' ' ));
        }
        public function uploadwatrfile()
        {
                $config['upload_path']          = './uploads/user_profile_pic/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';

                //$config['max_size']             = 500;

                //$config['max_width']            = 1024;

                //$config['max_height']           = 768;
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userimage'))
                {    
                    
                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('image', $error);
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    
                    $file_name = $data['upload_data']['file_name'];
				
                    /* Image resize, crop, rotate, watermark code here */
					$imgConfig = array();
                        
					$imgConfig = array();
                        
					$imgConfig['image_library'] = 'GD2';
											
					$imgConfig['source_image']  = './uploads/user_profile_pic/'.$file_name;

					$imgConfig['wm_type']       = 'overlay';    
											
					$imgConfig['wm_overlay_path'] = './front_assets/images/watermark.png';
					$imgConfig['wm_opacity'] = '100';
                    $imgConfig['wm_vrt_alignment'] = 'bottom';
                    $imgConfig['wm_hor_alignment'] = 'right';
                    $imgConfig['wm_vrt_offset'] = '10';
					
					$this->load->library('image_lib', $imgConfig);
											
					$this->image_lib->initialize($imgConfig);
											
					$this->image_lib->watermark(); 
											

                    $this->load->view('success', $data); 
                }
            }
        }



    ?>