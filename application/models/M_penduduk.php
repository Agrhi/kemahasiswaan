<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penduduk extends CI_Model
{
	// Get penduduk
	public function get($id = ''){
		$this->db->select('d.*, p.tingkat_pendidikan, k.pekerjaan, a.agama, st.status_kawin, sk.status_keluarga');
		$this->db->from('penduduk d');
		if ($id != '') {
			$this->db->where('d.id', $id);
		}
		$this->db->join('pendidikan p', 'p.id = d.id_pendidikan');
		$this->db->join('pekerjaan k', 'k.id = d.id_pekerjaan');
		$this->db->join('agama a', 'a.id = d.id_agama');
		$this->db->join('statuskawin st', 'st.id = d.id_status_kawin');
		$this->db->join('statuskeluarga sk', 'sk.id = d.id_status_keluarga');
		$query = $this->db->get();
		return $query;
	}

	// Insert penduduk
	public function insert($data){
		$this->db->insert('penduduk', $data);
	}

	// Delete penduduk
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('penduduk');
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('penduduk', $data);
	}
}
