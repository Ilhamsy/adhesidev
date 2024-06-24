<?php
if (!defined('BASEPATH')) exit(header('Location:../'));
class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
    }
    public function index()
    {
        $x = array('judul' => 'Jadwal Bimbingan', 'data' => $this->m_admin->jadwal());
        tpl('jadwal/jadwal_view', $x);
    }

    public function jadwal_tentor($id = '')
    {
        $x = array('judul' => 'Jadwal Tentor', 'data' => $this->m_admin->get_student($id));
        // panggil view
        tpl('jadwal/jadwal_view_detail', $x);
    }

    public function jadwal_tambah()
    {
        $x = array(
            'judul'          => 'Tambah Jadwal Bimbingan',
            'aksi'          => 'tambah',
            'nama_tentor'          => "",
            'nama'  => "",
            'jam'           => "",
            'bidang'        => "",
        );
        if (isset($_POST['kirim'])) {
            $inputData = array(
                'nama_tentor'         => $this->input->post('nama_tentor'),
                'nama' => $this->input->post('nama'),
                'jam'          => $this->input->post('jam'),
                'bidang'       => $this->input->post('bidang')
            );

            $siswa = $this->db->get_where('siswa', array('id_siswa' => $inputData["nama"]))->row();
            //$pegawai = $this->db->where(orderby('nama_jabatan'))->row();
            $tentor = $this->db->get_where('tentor', array('id_tentor' => $inputData["nama_tentor"]))->row();
            print_r($siswa, "siswa");
            $jadwal["id_sis"] = $siswa->id_siswa;
            $jadwal["id_tent"] = $tentor->id_tentor;
            $jadwal["jam"]    = $inputData["jam"];
            $jadwal["bidang"] = $inputData["bidang"];
            $cek = $this->db->insert("jadwal", $jadwal);
            if ($cek) {
                $pesan = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                 Jadwal Bimbingan Berhasil Di Ditambahkan.
                </div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect(base_url('jadwal'));
            } else {
                echo "QUERY SQL ERROR";
            }
        } else {
            $x = array(
                'judul'          => 'Tambah Jadwal Bimbingan',
                'aksi'          => 'tambah',
                'nama'          => $this->m_admin->get_siswa_join_jadwal(),
                'nama_tentor'  => $this->m_admin->getName_mentor(),
                'jam'           => "",
                'bidang'        => "",
            );
            tpl('jadwal/jadwal_view_form', $x);
        }
    }

    public function jadwal_edit($id = '')
    {
        $sql = $this->db->select('*');
        $sql = $this->db->from('jadwal');
        $sql = $this->db->join('tentor', 'tentor.id_tentor=jadwal.id_tent');
        $sql = $this->db->join('siswa', 'siswa.id_siswa=jadwal.id_sis');
        $sql = $this->db->where('jadwal.id_jadwal', $id);
        $sql = $this->db->get()->row_array();
        $x = array(
            'judul'          => 'Edit Jadwal Bimbingan',
            'aksi'          => 'edit',
            'nama_tentor'          => $sql['nama_tentor'],
            'nama'  => $sql['nama'],
            'jam'           => $sql['jam'],
            'bidang'        => $sql['bidang']
        );
        if (isset($_POST['kirim'])) {
            $inputData = array(
                'nama_tentor'          => $this->input->post('nama_tentor'),
                'nama'  => $this->input->post('nama'),
                'jam'           => $this->input->post('jam'),
                'bidang'        => $this->input->post('bidang')
            );

            $siswa = $this->db->get_where('siswa', array('id_siswa' => $inputData["nama"]))->row();
            $tentor = $this->db->get_where('tentor', array('id_tentor' => $inputData["nama_tentor"]))->row();
            print_r($siswa);
            $jadwal["id_sis"] = $siswa->id_siswa;
            $jadwal["id_tent"] = $tentor->id_tentor;
            $jadwal["jam"] = $inputData["jam"];
            $jadwal["bidang"] = $inputData["bidang"];
            $this->db->where('id_jadwal', $id);
            $cek = $this->db->update("jadwal", $jadwal);
            if ($cek) {
                $pesan = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                 Jadwal Bimbingan Berhasil Di Diedit.
                </div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect(base_url('jadwal'));
            } else {
                echo "QUERY SQL ERROR";
            }
        } else {
            $x = array(
                'judul'         => 'Edit Jadwal Bimbingan',
                'aksi'          => 'edit',
                'nama_tentor'  => $this->m_admin->getName_mentor(),
                'nama'          => $this->m_admin->get_siswa_join_jadwal(),
                'jam'           => "",
                'bidang'        => "",
            );
            tpl('jadwal/jadwal_view_form', $x);
        }
    }

    public function jadwal_hapus($id = '')
    {
        $cek = $this->db->delete('jadwal', array('id_jadwal' => $id));
        if ($cek) {
            $pesan = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Data Berhasil Di Hapus.
                </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect(base_url('jadwal'));
        }
    }
}
