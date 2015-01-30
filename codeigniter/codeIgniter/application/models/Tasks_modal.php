<?php

class Tasks_modal extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	public function dataIndex(){
		$data = $this->db->query('select * from tasks')->result();
		return $data;
	}	
	public function save(){
		$this->task_name = $_POST['task_name'];
		$this->db->insert('tasks',$this);
		redirect('tasks');
	}
	public function done($id){
		$data = array(
	           'state' => '1',
        );		

		$this->db->where('id', $id);
		$this->db->update('tasks', $data); 
		redirect('tasks');
	}
	public function edit($id){
		$this->db->from('tasks');
		$this->db->where('id',$id);
		return $this->db->get()->row_array();
	}
	public function update($id){
			$data = array(
	           'task_name' => $_POST['task_name'],
        );		

		$this->db->where('id', $id);
		$this->db->update('tasks', $data); 
		redirect('tasks');
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('tasks'); 
	}

}