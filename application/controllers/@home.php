<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rtvnews');
		$this->load->helper("url");
	}


	public function news()
	{
		
		$data['dailyNews'] = $this->rtvnews->rtvDailyNews();
		$data['tonight'] = $this->rtvnews->tonight();
		$this->load->view('v1/header');
		$this->load->view('v1/news',$data);
		$this->load->view('v1/footer');
	}
	
	public function videonews()
	{
		$id = $this->input->get('id');
		$data['onedailyNews'] = $this->rtvnews->rtvSingleDailyNews($id);
		$data['dailyNews'] = $this->rtvnews->rtvDailyNews();
		$data['tonight'] = $this->rtvnews->tonight();
		$this->load->view('v1/header');
		$this->load->view('v1/singlenews',$data);
		$this->load->view('v1/footer');
	}
	
	public function rtvmusic()
	{   $id = $this->input->get('id');
		if(!empty($id))
		{   $searchone = array('prog_cat' => '3' , 'prog_status !=' => '0' , 'prog_id' => $id );
			$data['rtvTopProgram'] = $this->rtvnews->rtvProgram($searchone);
		}
		$search = array('prog_cat' => '3' , 'prog_status !=' => '0');
		$data['rtvProgram'] = $this->rtvnews->rtvProgram($search);
		$data['tonight'] = $this->rtvnews->tonight();
		$data['program'] = 'music';
		$this->load->view('v1/header');
		$this->load->view('v1/rtvprogram',$data);
		$this->load->view('v1/footer');
	}

	public function eidspecial()
	{   
		$id = $this->input->get('id');
		if(!empty($id))
		{   $searchone = array('prog_cat' => '8' , 'prog_status !=' => '0' , 'prog_id' => $id );
			$data['rtvTopProgram'] = $this->rtvnews->rtvProgram($searchone);
		}
		$search = array('prog_cat' => '8' , 'prog_status !=' => '0');
		$data['rtvProgram'] = $this->rtvnews->rtvProgram($search);
		$data['tonight'] = $this->rtvnews->tonight();
		$data['program'] = 'eid';
		$this->load->view('v1/header');
		$this->load->view('v1/rtvprogram',$data);
		$this->load->view('v1/footer');

	}

	public function drama()
	{   

		$id = $this->input->get('id');
		if(!empty($id))
		{   $searchone = array('prog_cat' => '2' , 'prog_status !=' => '0' , 'prog_id' => $id );
			$data['rtvTopProgram'] = $this->rtvnews->rtvProgram($searchone);
		}
		$search = array('prog_cat' => '2' , 'prog_status !=' => '0');
		$data['rtvProgram'] = $this->rtvnews->rtvProgram($search);
		$data['tonight'] = $this->rtvnews->tonight();
		$data['program'] = 'drama';
		$this->load->view('v1/header');
		$this->load->view('v1/rtvprogram',$data);
		$this->load->view('v1/footer');
	}



	public function talkshow()
	{   $id = $this->input->get('id');
		if(!empty($id))
		{   $searchone = array('prog_cat' => '4' , 'prog_status !=' => '0' , 'prog_id' => $id );
			$data['rtvTopProgram'] = $this->rtvnews->rtvProgram($searchone);
		}
		$search = array('prog_cat' => '4' , 'prog_status !=' => '0');
		$data['rtvProgram'] = $this->rtvnews->rtvProgram($search);
		$data['tonight'] = $this->rtvnews->tonight();
		$data['program'] = 'talkshow';
		$this->load->view('v1/header');
		$this->load->view('v1/rtvprogram',$data);
		$this->load->view('v1/footer');
	}

	public function iframe()
	{   $search = array('prog_cat >=' => '1' , 'prog_status !=' => '0');
	    //SELECT * FROM (`rtv_programs`) WHERE `prog_cat` >= '1' AND `prog_status` != '0' AND `ss` = '' ORDER BY rand() LIMIT 4
		$data['rtvProgramcat'] = $this->rtvnews->rtvProgramcat();
		$data['rtvProgramrand'] = $this->rtvnews->rtvProgramrnd($search); 
		$this->load->view('v1/iframeProgram',$data);
	}



}
