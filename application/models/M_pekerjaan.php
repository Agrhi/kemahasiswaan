<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pekerjaan extends CI_Model
{
	// Get pekerjaan
	public function get($id = ''){
		$this->db->select('*');
		$this->db->from('pekerjaan');
		if ($id != '') {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	// Insert pekerjaan
	public function insert($data){
		$this->db->insert('pekerjaan', $data);
	}

	// Delete pekerjaan
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('pekerjaan');
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('pekerjaan', $data);
	}
}
