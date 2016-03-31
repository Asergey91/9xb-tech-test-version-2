<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class People extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('People_model');
        $this->load->helper('url');
    }
    
	private function create($person){
		$this->People_model->create($person);
	}
	
	public function read(){
		
		$dirty=$this->People_model->all();
		
		$clean=$this->security->xss_clean($dirty);
		
		$data['people']=$clean;
		
		$this->load->view('templates/header');
		$this->load->view('People/read', $data);
		$this->load->view('templates/footer');
	}
	
	private function update($person){
		$this->People_model->update($person);
	}
	
	private function destroy($id){
		$this->People_model->delete($id);
	}
	
	public function submit(){
		$people=$_POST['people'];
		
	    foreach($people as $person){
	        if (array_key_exists('delete', $person) && $person['delete']==1){
	        	if ($this->validates($person)){
	            	$this->destroy($person['id']);
	        	}
	        }
	        else if(array_key_exists('id', $person)){
	            if ($this->validates($person)){
	                $this->update($person);
	            }
	        }
	        else if(! array_key_exists('id', $person)){
	            if ($this->validates($person)){
	                $this->create($person);
	            }
	        }
	    }
		redirect('People/read');
	    
	}
	
	public function validates($person){
		if (array_key_exists('delete', $person)){
			if(! is_numeric($person['delete'])){
				return false;
			}
		}
		
		if (array_key_exists('id', $person)){
			if(! is_numeric($person['id'])){
				return false;
			}
		}
		
		foreach($person as $prop=>$value){
			if(empty($value)){
				return false;
			}
		}
		
		if(! is_string($person['email'])){
			return false;
		}
		
		if(! is_string($person['first_name'])){
			return false;
		}
		
		if(! is_string($person['last_name'])){
			return false;
		}
		
		if(! is_string($person['job_role'])){
			return false;
		}
		
		if(! is_string($person['email'])){
			return false;
		}
		
		if (! array_key_exists('id', $person)){
			if (! $this->People_model->validates($person)){
				return false;	
			}
		}
		
	    return true;
	}
}
