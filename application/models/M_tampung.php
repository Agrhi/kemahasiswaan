<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penduduk extends CI_Model
{
	// Get penduduk
	public function get($id = ''){
		$this->db->select('*');
		$this->db->from('tampung_jumlah');
		if ($id != '') {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	// Insert penduduk
	public function insert($data){
		$this->db->insert('tampung_jumlah', $data);
	}

	// Delete penduduk
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('tampung_jumlah');
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tampung_jumlah', $data);
	}
}
