<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_struktur extends CI_Model
{
	// Get Struktur
	public function get($id = ''){
		$this->db->select('*');
		$this->db->from('struktur');
		if ($id != '') {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	// Insert struktur
	public function insert($data){
		$this->db->insert('struktur', $data);
	}

	// Delete struktur
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('struktur');
	}

	// Konfirmasi Status Struktur
	public function status($id, $status)
	{
		$this->db->set('status', $status);
		$this->db->where('id', $id);
		$this->db->update('struktur');
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('struktur', $data);
	}
}
