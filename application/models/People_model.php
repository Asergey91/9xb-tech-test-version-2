<?php

class People_model extends CI_Model {
  
  private $table_name='People';
  
  public $id;
  
  public $email;
  
  public $first_name;
  
  public $last_name;
  
  public $job_role;
  
  function __construct(){
    parent::__construct();
  }
  
  private function set($person){
    $this->email=$person['email'];
    $this->first_name=$person['first_name'];
    $this->last_name=$person['last_name'];
    $this->job_role=$person['job_role'];
    
    if(array_key_exists('id', $person)){
      $this->id=$person['id'];
    }
  }
  
  public function create($person){
    $this->set($person);
    $this->db->insert($this->table_name, $this);
  }
  public function find($id){
    $person=$this->db->get_where($this->table_name, ['id'=>$id]);
    $this->set($person);
  }
  public function where($person){
    $p=$this->db->get_where($this->table_name, $person);
    $this->set($p);
  }
  public function update($person){
    $this->set($person);
    $this->db->replace($this->table_name, $this);
  }
  public function delete($id){
    $this->find($id);
    $this->db->where('id', $this->id);
    $this->db->delete($this->table_name);
  }
}