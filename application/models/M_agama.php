<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_agama extends CI_Model
{
	// Get agama
	public function get($id = ''){
		$this->db->select('*');
		$this->db->from('agama');
			$this->db->where('id', $id);
		$query = $this->db->get();
		return $query;
	}

	// Insert agama
	public function insert($data){
		$this->db->insert('agama', $data);
	}

	// Delete agama
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('agama');
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('agama', $data);
	}
}
