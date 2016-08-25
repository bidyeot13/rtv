<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rtvnews extends CI_Model {


  public function __construct()
  {
    parent::__construct();
     define('tonightable','rtv_tonight');
     define('newstable','rtv_dailynews');
     define('programtable','rtv_programs');  
     define('programcategory','rtv_category'); 
     $this->load->database();
  }

 public function rtvDailyNews()
 {   
   $query = $this->db->query('SELECT * FROM rtv_dailynews WHERE news_status != 0 AND news_date = (SELECT max(news_date) FROM rtv_dailynews) ORDER BY news_id');
   if($query->num_rows()>0)
   {
     return $query = $query->result();
   }
   return false;
 }


public function rtvSingleDailyNews($id) {
   $this->db->select('*');
   $this->db->from(newstable);
   $this->db->where('news_id',$id);
   $query = $this->db->get();
   if($query->num_rows()>0)
   {
    return  $query->result();
   }
   return false;
 }

 public function tonight() {
   $gUTCOffset = +6.00;
   $day = gmdate("D", time() + $gUTCOffset * 3600);
   $daysimg = strtolower($day);
   $this->db->select('*');
   $this->db->from(tonightable);
   $this->db->where('day',$day);
   $query = $this->db->get();
   if($query->num_rows()>0)
   {
	  $data= array (
		 'query' => $query->result(),
		 'numrows' => $query->num_rows(),
		 'numfields' => ($query->num_fields() -3) / 2);
		return $data;
   }
   return false;
 }


public function rtvProgram($search) {
   $this->db->select('*');
   $this->db->from(programtable);
   $this->db->where($search);
   $query = $this->db->get();
   if($query->num_rows()>0)
   {
    return  $query->result();
   }
   return false;
 }

 public function rtvProgramrnd($search) {
   $this->db->select('*');
   $this->db->from(programtable);
   $this->db->where($search);
   $this->db->order_by('rand()');
   $this->db->limit(4);
   $query = $this->db->get();
   if($query->num_rows()>0)
   {
    return  $query->result();
   }
   return false;
 }


 
 public function rtvProgramcat() {
   $this->db->select('*');
   $this->db->from(programcategory);
   $query = $this->db->get();
   if($query->num_rows()>0)
   {
    return  $query->result();
   }
   return false;
 }

 

}
?>