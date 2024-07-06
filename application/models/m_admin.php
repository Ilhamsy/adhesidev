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
    $this->db->join("kursus", "kursus.id_kursus = jadwal.id_kur");
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
    $this->db->join("kursus", "kursus.id_kursus = jadwal.id_kur");
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

  public function get_kursus()
  {
    $query = $this->db->select("*")->from('kursus');
    return $query->get()->result_array();
  }

  public function get_tentor()
  {
    $query = $this->db->select("*")->from('tentor');
    return $query->get()->result_array();
  }
  public function get_siswa()
  {
    $query = $this->db->select("*")->from('siswa');
    return $query->get()->result_array();
  }

  public function get_jadwal()
  {
    $query = $this->db->from("jadwal");
    $this->db->join("siswa", "siswa.id_siswa = jadwal.id_sis");
    $this->db->join("tentor", "tentor.id_tentor = jadwal.id_tent");
    $this->db->join("kursus", "kursus.id_kursus = jadwal.id_kur");
    $this->db->group_by("jadwal.id_jadwal");
    return $query->get()->result_array();
  }
  public function get_data($report_type)
  {
    switch ($report_type) {
      case 'tentor':
        return $this->get_tentor_pdf();
        break;
      case 'siswa':
        return $this->get_siswa_pdf();
        break;
      case 'kursus':
        return $this->get_kursus_pdf();
        break;
      case 'jadwal':
        return $this->get_jadwal_pdf();
        break;
      default:
        return array();
    }
  }

  private function get_tentor_pdf()
  {
    $this->db->select('*');
    $this->db->from('tentor');
    $query = $this->db->get();
    return $query->result_array();
  }

  private function get_siswa_pdf()
  {
    $this->db->select('*');
    $this->db->from('siswa');
    $query = $this->db->get();
    return $query->result_array();
  }

  private function get_kursus_pdf()
  {
    $this->db->select('*');
    $this->db->from('kursus');
    $query = $this->db->get();
    return $query->result_array();
  }

  private function get_jadwal_pdf()
  {
    $query = $this->db->from("jadwal");
    $this->db->join("siswa", "siswa.id_siswa = jadwal.id_sis");
    $this->db->join("tentor", "tentor.id_tentor = jadwal.id_tent");
    $this->db->join("kursus", "kursus.id_kursus = jadwal.id_kur");
    $this->db->group_by("jadwal.id_jadwal");
    return $query->get()->result_array();
  }
}
