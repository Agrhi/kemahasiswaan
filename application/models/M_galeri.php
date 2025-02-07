<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_galeri extends CI_Model
{
	// Get galeri
	public function get($id = ''){
		$this->db->select('*');
		$this->db->from('galeri');
		if ($id != '') {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	// Insert galeri
	public function insert($data){
		$this->db->insert('galeri', $data);
	}

	// Delete galeri
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('galeri');
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('galeri', $data);
	}
}
