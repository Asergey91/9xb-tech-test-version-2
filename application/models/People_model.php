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
    $this->load->database();
  }
  private function set_to_nothing(){
    unset($this->email);
    unset($this->first_name);
    unset($this->last_name);
    unset($this->job_role);
    unset($this->id);
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
  
  public function all(){
    return $this->db->get($this->table_name)->result_array();
  }
  
  public function create($person){
    $this->set_to_nothing();
    $this->set($person);
    $this->db->insert($this->table_name, $this);
  }
  public function find($id){
    $this->set_to_nothing();
    $person=$this->db->get_where($this->table_name, ['id'=>$id])->result_array();
    $person=$person[0];
    $this->set($person);
  }
  
  public function where($person){
    $this->set_to_nothing();
    $p=$this->db->get_where($this->table_name, $person);
    $this->set($p);
  }
  
  public function update($person){
    $this->set_to_nothing();
    $this->set($person);
    $this->db->replace($this->table_name, $this);
    $this->set_to_nothing();
  }
  
  public function delete($id){
    $this->set_to_nothing();
    $this->find($id);
    $this->db->where('id', $id);
    $this->db->delete($this->table_name);
  }
  
  public function validates($person){
    $people=$this->db->simple_query('SELECT * FROM '.$this->table_name);
    $similar_jobs=0;
    $entries=0;
    foreach ($people as $p){
      if($person['job_role']==$p['job_role']){
        $similar_jobs++;
      }
      $entries++;
    }
    if($entries>=10){
      return false;
    }
    if($similar_jobs>=4){
      return false;
    }
    return true;
  }
}