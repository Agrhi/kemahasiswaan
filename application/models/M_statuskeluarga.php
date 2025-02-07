<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_statuskeluarga extends CI_Model
{
	// Get statuskeluarga
	public function get($id = ''){
		$this->db->select('*');
		$this->db->from('statuskeluarga');
		if ($id != '') {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	// Insert statuskeluarga
	public function insert($data){
		$this->db->insert('statuskeluarga', $data);
	}

	// Delete statuskeluarga
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('statuskeluarga');
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('statuskeluarga', $data);
	}
}
