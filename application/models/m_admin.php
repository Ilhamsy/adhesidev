<?php

class M_admin extends CI_model
{
  public function jadwal()
  {
    $data = array();
    $query = $this->db->select("*");

    $this->db->from("jadwal");
    $this->db->join("siswa", "siswa.id_siswa = jadwal.id_sis");
    $this->db->join("tentor", "tentor.id_tentor = jadwal.id_tent");
    $this->db->group_by("tentor.id_tentor");

    $jadwal = $this->db->get()->result_array();
    return $jadwal;
  }

  public function get_student($id_tentor)
  {
    $query = $this->db->select("*");

    $this->db->from('jadwal');
    $this->db->join("siswa", "siswa.id_siswa = jadwal.id_sis");
    $this->db->join("tentor", "tentor.id_tentor = jadwal.id_tent");
    $this->db->where("tentor.id_tentor", $id_tentor);

    $jadwal_mentor = $this->db->get()->result_array();
    return $jadwal_mentor;
  }

  public function getName_mentor()
  {
    $query = $this->db->from('jadwal');
    $this->db->join("tentor", "tentor.id_tentor = jadwal.id_tent", 'right');
    $this->db->group_by("tentor.id_tentor");
    return $query->get()->result_array();
  }

  public function get_siswa_join_jadwal()
  {
    $query = $this->db->from('jadwal');
    $this->db->join("siswa", "siswa.id_siswa = jadwal.id_sis", 'right');
    $this->db->group_by("siswa.id_siswa");
    return $query->get()->result_array();
  }
  // jumlah siswa yang diampu oleh seorang tentor
  public function get_jumlah_siswa()
  {
  }

  public function get_nama_tentor_aktif()
  {
    $query = $this->db->select('nama_tentor');
    $this->db->from('tentor');
    $this->db->where('status' == "A");
    return $query->get()->result_array();
  }
}
