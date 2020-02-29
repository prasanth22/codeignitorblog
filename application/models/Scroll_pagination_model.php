<?php
class Scroll_pagination_model extends CI_Model
{
 function fetch_data($limit, $start)
 {

	  $this->db->select('*');
	  $this->db->from('post');
	  $this->db->order_by("id", "DESC");
	  $this->db->limit($limit, $start);
	  $query = $this->db->get();
	  return $query;	
 }
 function fetch_questions($limit, $start)
 {
	  $this->db->select('*');
	  $this->db->from('questions');
	  $this->db->order_by("id", "DESC");
	  $this->db->limit($limit, $start);
	  $query = $this->db->get();
	  return $query;	
 }
 
}
?>