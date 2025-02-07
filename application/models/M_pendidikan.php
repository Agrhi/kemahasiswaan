<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pendidikan extends CI_Model
{
	// Get pendidikan
	public function get($id = ''){
		$this->db->select('*');
		$this->db->from('pendidikan');
		if ($id != '') {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	// Insert pendidikan
	public function insert($data){
		$this->db->insert('pendidikan', $data);
	}

	// Delete pendidikan
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('pendidikan');
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('pendidikan', $data);
	}
}
