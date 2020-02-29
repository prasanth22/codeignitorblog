<?php
class Answer_model extends CI_Model
{
	function question($id)
    {

	  $this->db->select('title');
	  $this->db->from('questions');
	  $this->db->where("id",$id);
	  $query = $this->db->get();
	  return $query;	
   }
   
   function add_question($question){
	   $sql = "insert into questions (title)
		 values ('$question')";
	$this->db->query($sql);
   }
   
   function get_tags(){
	   $sql = "select * from tags";
	   $this->db->query($sql);
   }
   
   function add_answer($title,$content){
	   $sql = "insert into post (post_title,post_description)
		               values ('$title','$content')";
	   $this->db->query($sql);
   }
 
}
?>