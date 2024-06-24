<?php
class Kursus extends CI_Controller
{
    public function index()
    {
        $x = array(
            'judul' => 'Data Kursus',
            'data' => $this->db->get('kursus')->result_array()
        );
        tpl('kursus/kursus_view', $x);
    }
    public function ls_kursus($value = '')
    {
        $data = $this->m_admin->kursus()->row_array();
        echo json_encode($data);
    }
    public function kursus_tambah()
    {
        $x = array(
            'judul'          => 'Tambah Data Kursus',
            'aksi'          => 'tambah',
            'nama_kursus'  => '',
            'kapasitas'         => '',
            'waktu'      => ''
        );
        if (isset($_POST['kirim'])) {
            $inputData = array(
                'nama_kursus'  => $this->input->post('nama_kursus'),
                'kapasitas'         => $this->input->post('kapasitas'),
                'waktu'      => $this->input->post('waktu')
            );
            $cek = $this->db->insert('kursus', $inputData);
            if ($cek) {
                $pesan = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di tambahkan.
              </div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect(base_url('kursus'));
            } else {
                echo "QUERY SQL ERROR";
            }
        } else {
            tpl('kursus/kursus_view_form', $x);
        }
    }
    public function kursus_edit($id = '')
    {
        $sql = $this->db->get_where('kursus', array('id_kursus' => $id))->row_array();
        $x = array(
            'judul'        => 'Edit Data Kursus',
            'aksi'        => 'tambah',
            'nama_kursus'      => $sql['nama_kursus'],
            'kapasitas'             => $sql['kapasitas'],
            'waktu'          => $sql['waktu']
        );
        if (isset($_POST['kirim'])) {
            $inputData = array(
                'nama_kursus'      => $this->input->post('nama_kursus'),
                'kapasitas'             => $this->input->post('kapasitas'),
                'waktu'          => $this->input->post('waktu')
            );
            $cek = $this->db->update('kursus', $inputData, array('id_kursus' => $id));
            if ($cek) {
                $pesan = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di edit.
              </div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect(base_url('kursus'));
            } else {
                echo "QUERY SQL ERROR";
            }
        } else {
            tpl('kursus/kursus_view_form', $x);
        }
    }

    public function tentor_hapus($id = '')
    {
        $cek = $this->db->delete('kursus', array('id_kursus' => $id));
        if ($cek) {
            $pesan = '<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i> Success!</h4>
              Data Berhasil Di Hapus.
              </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect(base_url('kursus'));
        }
    }
}
