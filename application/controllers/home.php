<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rtvnews');
		$this->load->helper("url");
		$this->load->driver('cache', array('adapter' => 'file'),900);
		$this->load->library("pagination");	
	}


	public function news()
	{   
		$data['title'] = 'আরটিভির সংবাদ';
		$data['cssvalue'] = '1';
		$config = array();
		$config["base_url"] = base_url().'news';
		$total_row = $this->rtvnews->rtvDailyNewsCount();
		$config["total_rows"] = $total_row;
		$config['num_links'] = $total_row;
		$config["per_page"] = 12;
		$this->pagination->initialize($config);
		if($this->uri->segment(2)){
			$page = ($this->uri->segment(2)) ;
		}
		else
		{
			$page = 1;
		}
		$data["dailyNews"] = $this->rtvnews->rtvDailyNews($config["per_page"], $page);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );
		$data['tonight'] = $this->rtvnews->tonight();
		$this->load->view('v1/header',$data);
		$this->load->view('v1/news',$data);
		$this->load->view('v1/footer');
	}
	
	public function videonews()
	{
		$data['title'] = 'আরটিভির সংবাদ';
		$data['cssvalue'] = '1';
		$id = $this->input->get('id');
		$data['onedailyNews'] = $this->rtvnews->rtvSingleDailyNews($id);
		$config = array();
		$config["base_url"] = base_url().'news';
		$total_row = $this->rtvnews->rtvDailyNewsCount();
		$config["total_rows"] = $total_row;
		$config['num_links'] = $total_row;
		$config["per_page"] = 12;
		$this->pagination->initialize($config);
		if($this->uri->segment(2)){
			$page = ($this->uri->segment(2)) ;
		}
		else
		{
			$page = 1;
		}
		$data["dailyNews"] = $this->rtvnews->rtvDailyNews($config["per_page"], $page);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );
		$data['tonight'] = $this->rtvnews->tonight();
		$this->load->view('v1/header',$data);
		$this->load->view('v1/singlenews',$data);
		$this->load->view('v1/footer');

	}
	
	public function rtvmusic()
	{   

		$data['title'] = 'সঙ্গীত ও নৃত্য';
		$data['cssvalue'] = '2';
		$id = $this->input->get('id');
		if(!empty($id))
		{   
			$searchone = array('prog_cat' => '3' , 'prog_status !=' => '0' , 'prog_id' => $id );
			$data['rtvTopProgram'] = $this->rtvnews->rtvProgram($searchone);
		}
		$search = array('prog_cat' => '3' , 'prog_status !=' => '0');
		$data['rtvProgram'] = $this->rtvnews->rtvProgram($search);
		$data['tonight'] = $this->rtvnews->tonight();
		$data['program'] = 'music';
		$this->load->view('v1/header',$data); 
		$this->load->view('v1/rtvprogram',$data);
		$this->load->view('v1/footer');

	}

	public function eidspecial()
	{   
		$data['title'] = 'ঈদের বিশেষ অনুষ্ঠান';
		$data['cssvalue'] = '3';
		$id = $this->input->get('id');
		if(!empty($id))
		{   
			$searchone = array('prog_cat' => '8' , 'prog_status !=' => '0' , 'prog_id' => $id );
			$data['rtvTopProgram'] = $this->rtvnews->rtvProgram($searchone);
		}
		$search = array('prog_cat' => '8' , 'prog_status !=' => '0');
		$data['rtvProgram'] = $this->rtvnews->rtvProgram($search);
		$data['tonight'] = $this->rtvnews->tonight();
		$data['program'] = 'eid';
		$this->load->view('v1/header', $data);
		$this->load->view('v1/rtvprogram',$data);
		$this->load->view('v1/footer');
	}

	public function drama()
	{   
		$data['title'] = 'নাটক';
		$data['cssvalue'] = '4';
		$id = $this->input->get('id');
		if(!empty($id))
		{   
			$searchone = array('prog_cat' => '2' , 'prog_status !=' => '0' , 'prog_id' => $id );
			$data['rtvTopProgram'] = $this->rtvnews->rtvProgram($searchone);
		}
		$search = array('prog_cat' => '2' , 'prog_status !=' => '0');
		$data['rtvProgram'] = $this->rtvnews->rtvProgram($search);
		$data['tonight'] = $this->rtvnews->tonight();
		$data['program'] = 'drama';
		$this->load->view('v1/header',$data); 
		$this->load->view('v1/rtvprogram',$data);
		$this->load->view('v1/footer');

	}



	public function talkshow()
	{   
		$data['title'] = 'টক শো';
		$data['cssvalue'] = '5';
		$id = $this->input->get('id');
		if(!empty($id))
		{   
			$searchone = array('prog_cat' => '4' , 'prog_status !=' => '0' , 'prog_id' => $id );
			$data['rtvTopProgram'] = $this->rtvnews->rtvProgram($searchone);
		}
		$search = array('prog_cat' => '4' , 'prog_status !=' => '0');
		$data['rtvProgram'] = $this->rtvnews->rtvProgram($search);
		$data['tonight'] = $this->rtvnews->tonight();
		$data['program'] = 'talkshow';
		$this->load->view('v1/header',$data); 
		$this->load->view('v1/rtvprogram',$data);
		$this->load->view('v1/footer');

	}

	public function schedule()
	{   
		$data['title'] = 'অনুষ্ঠানের সময় সূচী';
		$data['cssvalue'] = '6';
		$data['rtvSchedule'] = $this->rtvnews->rtvSchedule();
		$data['tonight'] = $this->rtvnews->tonight();
		$data['program'] = 'talkshow';
		$this->load->view('v1/header',$data); 
		$this->load->view('v1/rtvshcedule',$data);
		$this->load->view('v1/footer');

	}

	public function iframe()
	{   
		$search = array('prog_cat !=' => '8', 'prog_status !=' => '0');
		//$search = array('prog_cat !=' => '8', 'prog_status !=' => '0', 'prog_cat' => 'cat_id');
		//$data['rtvProgramcat'] = $this->rtvnews->rtvProgramcat();
		$data['rtvProgramrand'] = $this->rtvnews->rtvProgramrnd($search); 
		$this->load->view('v1/iframeProgram',$data);

	}



}
