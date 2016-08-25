<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rtvnews extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    define('TONIGHT_TABLE','rtv_tonight');
    define('NEWS_TABLE','rtv_dailynews');
    define('PROGRAM_TABLE','rtv_programs');  
    define('PROGRAM_CAT_TABLE','rtv_category'); 
    $this->load->database();
  }

  

  public function rtvDailyNewsCount()
  {   
   //$query = $this->db->query('SELECT * FROM rtv_dailynews WHERE news_status != 0 AND news_date = (SELECT max(news_date) FROM rtv_dailynews) ORDER BY news_id');
   
   $this->db->select('*');
   $this->db->from(NEWS_TABLE);
   $this->db->where('news_status != 0 AND news_date = (SELECT max(news_date) FROM rtv_dailynews)');
   $this->db->order_by('news_id');
   $query = $this->db->get();
   if($query->num_rows()>0)
   {
     return $query = $query->num_rows();
   }
   return false;
 }


  public function rtvDailyNews($limit,$id)
  {   
   //$query = $this->db->query('SELECT * FROM rtv_dailynews WHERE news_status != 0 AND news_date = (SELECT max(news_date) FROM rtv_dailynews) ORDER BY news_id');
   
   $this->db->select('*');
   $this->db->from(NEWS_TABLE);
   $this->db->where('news_status != 0 AND news_date = (SELECT max(news_date) FROM rtv_dailynews)');
   $this->db->order_by('news_id');
   $this->db->limit($limit, $id);
   $query = $this->db->get();
   if($query->num_rows()>0)
   {
     return $query = $query->result();
   
   }
   return false;
 }
  
 
 public function rtvSingleDailyNews($id) {
   $this->db->select('*');
   $this->db->from(NEWS_TABLE);
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
 $this->db->from(TONIGHT_TABLE);
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
 $this->db->from(PROGRAM_TABLE);
 $this->db->where($search);
 $query = $this->db->get();
 if($query->num_rows()>0)
 {
  return  $query->result();
}
return false;
}

// SELECT * FROM rtv_programs, rtv_category WHERE prog_cat != 8 AND prog_status != 0 AND prog_cat = cat_id ORDER BY rand() LIMIT 4

public function rtvProgramrnd($search) {
 $this->db->select('*');
 $this->db->from(PROGRAM_TABLE);
 $this->db->join(PROGRAM_CAT_TABLE, 'prog_cat = cat_id');
 //$this->db->from(PROGRAM_CAT_TABLE);
 //$this->db->join(PROGRAM_CAT_TABLE);
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
 $this->db->from(PROGRAM_CAT_TABLE);
 $query = $this->db->get();
 if($query->num_rows()>0)
 {
  return  $query->result();
}
return false;
}

public function rtvSchedule() {
 $this->db->select('*');
 $this->db->from(TONIGHT_TABLE);
 $query = $this->db->get();
 if($query->num_rows()>0)
 {
  return  $query->result();
}
return false;
}

}
?>