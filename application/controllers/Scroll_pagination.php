
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scroll_pagination extends CI_Controller {
	
  function __construct() {
        parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->database();
        
        // Load post model
        $this->load->model('scroll_pagination_model');
        
    }	

 function index()
 {
  $this->load->view('scroll_pagination');
 }

 function fetch()
 {
  $output = '';
  $this->load->model('scroll_pagination_model');
  $data = $this->scroll_pagination_model->fetch_data($this->input->post('limit'), $this->input->post('start'));
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
    $output .= '
	   <div class="card mb-4">         
             <div class="card-body">
		        <div class="smalldesc comment more">
				  <h3 class="card-title">'.$row->post_title.'</h3>
				  <p class="card-text">'.$row->post_description.'</span></p>
			    </div>
				<a href="#" class="btn btn-primary myBtn">Read More &rarr;</a>
			  </div>
			  <div class="card-footer text-muted">
				Posted on January 1, 2017 by
				<a href="#">Start Bootstrap</a>
			  </div>
        </div>
    ';
   }
  }
  echo $output;
 }
 function fetch_questions()
 {
  $output = '';
  $this->load->model('scroll_pagination_model');
  $data = $this->scroll_pagination_model->fetch_questions($this->input->post('limit'), $this->input->post('start'));
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
    $output .= '
	<div class="card mb-4">
          <div class="card-body">
            <h3 class="card-title">'.$row->title.'</h3>
            <p class="card-text">'.$row->tags.'</p>
            
			<a class="btn btn-primary" href="answer?q_id='.$row->id.'" onclick="basicPopup(this.href);return false">Answer</a>
			  
          </div>
          <div class="card-footer text-muted">
            Posted on January 1, 2017 by
            <a href="#">Start Bootstrap</a>
          </div>
        </div>
    ';
   }
  }
  echo $output;
 }

}