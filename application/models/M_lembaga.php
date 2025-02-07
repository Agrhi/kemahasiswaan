<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lembaga extends CI_Model
{
	// Get lembaga
	public function get($id = ''){
		$this->db->select('l.*, p.nama');
		$this->db->from('lembaga l');
		if ($id != '') {
			$this->db->where('l.id', $id);
		}
		$this->db->join('penduduk p', 'p.id = l.id_penduduk');
		$query = $this->db->get();
		return $query;
	}

	// Insert lembaga
	public function insert($data){
		$this->db->insert('lembaga', $data);
	}

	// Delete lembaga
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('lembaga');
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('lembaga', $data);
	}
}
