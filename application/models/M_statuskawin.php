<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_statuskawin extends CI_Model
{
	// Get statuskawin
	public function get($id = ''){
		$this->db->select('*');
		$this->db->from('statuskawin');
		if ($id != '') {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	// Insert statuskawin
	public function insert($data){
		$this->db->insert('statuskawin', $data);
	}

	// Delete statuskawin
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('statuskawin');
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('statuskawin', $data);
	}
}
