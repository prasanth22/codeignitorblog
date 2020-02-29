<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Answer_Controller extends CI_Controller {
	function __construct() {
        parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->database();
        
        
    }

	function index()
	 {
	  $this->load->view('answer/header.php');
	  $this->load->view('answer/index.php');
	  $this->load->view('answer/footer.php');
	 }
	 
	 function answer(){
		 $this->load->view('answer/header.php');
		 $output = ''; 
		 if($_GET['q_id']){
			 $id = $_GET['q_id'];
			 $this->load->model('Answer_model');
		     $data = $this->Answer_model->question($id);
		 }
		 
		 if($data->num_rows() > 0)
			  {
			   foreach($data->result() as $row)
			   {
				$output .= '
					<div class="q-body">			
						<div><h3 class="card-title">'.$row->title.'</h3></div>										
				    </div>';
			   }
			  }
         echo $output;
		 $this->load->view('answer/answer.php');
	    }
		
     function add_question()
	 {
	  $this->load->model('Answer_model');
	  if($this->input->post('save'))
		{
         $this->Answer_model->add_question($this->input->post('question'));
		}
      	//echo $this->input->post('question');  
	  $this->load->view('answer/header.php');
	  $this->load->view('answer/index.php');
	  $this->load->view('answer/footer.php');
	 }
	 
	 function add_answer()
	 {
	    if($_GET['id']){
		  $id = $_GET['id'];
		  //echo $id;
		  //echo $this->input->post('content');
		  $this->load->model('Answer_model');
		  $data = $this->Answer_model->question($id);
		  foreach($data->result() as $row){
			 $title = $row->title; 
		  }
		  //print_r($title);
		  $data = $this->Answer_model->add_answer($title,$this->input->post('content'));
		  $this->close_method();
		}
	 }
	 function close_method(){
			echo  "<script type='text/javascript'>";
			echo "window.opener.location.href='main_index';";
			echo "window.close();";
			echo "</script>";
		}
		
	function main_index()
	 {
	  $this->load->view('templates/header.php');
	  $this->load->view('templates/index.php');
	  $this->load->view('templates/footer.php');
	 }
}