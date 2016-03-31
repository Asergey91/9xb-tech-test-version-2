<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {
    
	function __construct(){
        parent::__construct();
        //cli only access
        //if (!$this->input->is_cli_request()){
            //exit('Only via CLI');
        //}
        $this->load->library('migration');
        $this->load->model('People_model');
        $this->load->database();
	}
	
	private function create(){
	    if (! $this->migration->latest()){
        	show_error($this->migration->error_string());
        }
	}
	
	public function setup(){
	    $this->drop_tables();
        $this->create();
        $this->seed();
	}
	
	private function drop_tables(){
	    if (! $this->migration->version(1)){
        	show_error($this->migration->error_string());
        }
	}
	private function seed(){
	    $this->People_model->create([
            'email'=>'mail_j_strummer@9xb.com',
            'first_name'=>'Jo',
            'last_name'=>'Strummer',
            'job_role'=>'Developer'
	    ]);
	    $this->People_model->create([
            'email'=>'mail_m_jones@9xb.com',
            'first_name'=>'Mick',
            'last_name'=>'Jones',
            'job_role'=>'Project Manager'
	    ]);
	    $this->People_model->create([
            'email'=>'mail_p_black@9xb.com',
            'first_name'=>'Pauline',
            'last_name'=>'Black',
            'job_role'=>'Developer'
	    ]);
	    $this->People_model->create([
            'email'=>'mail_t_headon@9xb.com',
            'first_name'=>'Topper',
            'last_name'=>'Headon',
            'job_role'=>'Developer'
	    ]);
	    $this->People_model->create([
            'email'=>'asergey91@gmail.com',
            'first_name'=>'Sergey',
            'last_name'=>'Andreev',
            'job_role'=>'Developer'
	    ]);
	}
}