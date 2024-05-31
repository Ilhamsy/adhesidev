<?php 

class M_admin extends CI_model
{
	public function jadwal()
{
  $data = array();
  $query = $this->db->select("*");

  $this->db->from("jadwal");
  $this->db->join("pegawai", "pegawai.id_pegawai = jadwal.id_peg");
  $this->db->join("jabatan", "jabatan.id_jabatan = jadwal.id_jab");
  $this->db->group_by("jabatan.id_jabatan");

  $jadwal = $this->db->get()->result_array();
return $jadwal;
}

public function get_student($id_jabatan) {
  $query = $this->db->select("*");

  $this->db->from('jadwal');
  $this->db->join("pegawai", "pegawai.id_pegawai = jadwal.id_peg");
  $this->db->join("jabatan", "jabatan.id_jabatan = jadwal.id_jab");
  $this->db->where("jabatan.id_jabatan", $id_jabatan);

  $jadwal_mentor = $this->db->get()->result_array();
  return $jadwal_mentor;
}

public function getName_mentor(){
  $query = $this->db->from('jadwal');
  $this->db->join("jabatan", "jabatan.id_jabatan = jadwal.id_jab", 'right');
  $this->db->group_by("jabatan.id_jabatan");
  return $query->get()->result_array();

}

public function get_pegawai_join_jadwal(){
  $query = $this->db->from('jadwal');
  $this->db->join("pegawai", "pegawai.id_pegawai = jadwal.id_peg", 'right');
  $this->db->group_by("pegawai.id_pegawai");
  return $query->get()->result_array();

}



}