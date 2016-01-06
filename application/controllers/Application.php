<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Application extends CI_Controller {

	function __construct() {
	    parent::__construct();

		$this->load->database(); // load database
	    $this->load->helper(array('form', 'url','file'));
	    $this->load->model('ModelUsers'); // load model
	    $this->load->library('session');
    }

    public function index(){
		$this->load->view('application/index');	
	}

	public function game(){
		if(!isset($_SESSION['username'])) {  
    		header('Location: http://localhost/hangman/index');   
  		}
    	$data['username']=$this->session->userdata('username');
		$this->load->view('application/header',$data);
		$this->load->view('application/game');
		$this->load->view('application/footer');
	}

	public function players(){
		if(!isset($_SESSION['username'])) {  
    		header('Location: http://localhost/hangman/index');   
  		}
    	$data['username']=$this->session->userdata('username');
    	$this->data['users'] = $this->ModelUsers->get_players();
		$this->load->view('application/header',$data);
		$this->load->view('application/players',$this->data);
		$this->load->view('application/footer');
	}

	public function register(){
		//$data['username']=$this->session->userdata('username');
		$this->load->view('application/header');
		$this->load->view('application/register');
		$this->load->view('application/footer');
	}

	public function word(){
		if(!isset($_SESSION['username'])) {  
    		header('Location: http://localhost/hangman/index');   
  		}
		$data['username']=$this->session->userdata('username');
		$this->data['words'] = $this->ModelUsers->get_words();

		$this->load->view('application/header',$data);
		$this->load->view('application/word',$this->data);
		$this->load->view('application/footer');
	}

	


	//******************//
   //      Add    	   //
  //        User      //
 //******************//

	public function addUser(){
		$username = $this->input->post('username');
		$password =$this ->input->post('password');
		$sex =$this ->input->post('sex');
		$this->ModelUsers->saveUser($username, $password,$sex);
	}	

	//******************//
   //      Add    	   //
  //        word      //
 //******************//

	public function add_word(){
		$word =$this ->input->post('word');
		$this->ModelUsers->save_word($word);
	}

    //******************//
   //  Confirmation    //
  //     User         //
 //******************//  

	public function Confirm(){
    	$username=$this->input->post('username');
    	$password=$this->input->post('password');
    	$this->ModelUsers->confirm_user($username,$password);
    }

	//******************//
   //     Log_out      //
  //     User         //
 //******************//  

    public function Logout() {
		$this->load->library('session');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('admin');
		$this->session->unset_userdata('sex');
		session_destroy();
		redirect(base_url('index'));
	}

	//******************//
   //     Delete       //
  //     Word         //
 //******************// 

	public function delete_word() {
		$id=$this->input->post('id');
		$word=$this->input->post('word');
		$this->ModelUsers->delete_word($id,$word);
	}

	//******************//
   //     Edit         //
  //     Word         //
 //******************//

	function Edit_record ($id) {
  	
		$q=$this->db->get_where('words',array('id'=>$id));
		$item=$q->row();

		$data['username']=$this->session->userdata('username');
		$this->load->view('application/header',$data);
		$this->load->view('application/record',array('record'=>$item));
		$this->load->view('application/footer');
	}
	//******************//
   //     Update       //
  //     Word         //
 //******************//

	function Update() {
		
		$id=$this->input->post('id');
		$word=$this->input->post('word');
		$this->ModelUsers->update_record($id,$word);
		header('Location: http://localhost/hangman/word');
	}

}
