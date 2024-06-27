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
            'nama_kursus'        => "",
        );
        if (isset($_POST['kirim'])) {
            $inputData = array(
                'nama_tentor'         => $this->input->post('nama_tentor'),
                'nama' => $this->input->post('nama'),
                'nama_kursus'       => $this->input->post('nama_kursus')
            );

            $siswa = $this->db->get_where('siswa', array('id_siswa' => $inputData["nama"]))->row();
            $tentor = $this->db->get_where('tentor', array('id_tentor' => $inputData["nama_tentor"]))->row();
            $kursus = $this->db->get_where('kursus', array('id_kursus' => $inputData["nama_kursus"]))->row();
            print_r($siswa, "siswa");
            $jadwal["id_sis"] = $siswa->id_siswa;
            $jadwal["id_tent"] = $tentor->id_tentor;
            $jadwal["id_kur"] = $kursus->id_kursus;
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
                'nama_tentor'  => $this->m_admin->get_tentor(),
                'nama'          => $this->m_admin->get_siswa(),
                'nama_kursus'        => $this->m_admin->get_kursus()
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
        $sql = $this->db->join('kursus', 'kursus.id_kursus=jadwal.id_kur');
        $sql = $this->db->where('jadwal.id_jadwal', $id);
        $sql = $this->db->get()->row_array();
        $x = array(
            'judul'          => 'Edit Jadwal Bimbingan',
            'aksi'          => 'edit',
            'nama_tentor'          => $sql['nama_tentor'],
            'nama'  => $sql['nama'],
            'nama_kursus'        => $sql['nama_kursus']
        );
        if (isset($_POST['kirim'])) {
            $inputData = array(
                'nama_tentor'          => $this->input->post('nama_tentor'),
                'nama'  => $this->input->post('nama'),
                'nama_kursus'        => $this->input->post('nama_kursus')
            );

            $siswa = $this->db->get_where('siswa', array('id_siswa' => $inputData["nama"]))->row();
            $tentor = $this->db->get_where('tentor', array('id_tentor' => $inputData["nama_tentor"]))->row();
            $kursus = $this->db->get_where('kursus', array('id_kursus' => $inputData["nama_kursus"]))->row();

            $jadwal["id_sis"] = $siswa->id_siswa;
            $jadwal["id_tent"] = $tentor->id_tentor;
            $jadwal["id_kur"] = $kursus->id_kursus;

            $this->db->where('id_jadwal', $id);
            $cek = $this->db->update("jadwal", $jadwal);

            if ($cek) {
                // Re-run the query to retrieve the updated data
                $sql = $this->db->select('*');
                $sql = $this->db->from('jadwal');
                $sql = $this->db->join('tentor', 'tentor.id_tentor=jadwal.id_tent');
                $sql = $this->db->join('siswa', 'siswa.id_siswa=jadwal.id_sis');
                $sql = $this->db->join('kursus', 'kursus.id_kursus=jadwal.id_kur');
                $sql = $this->db->where('jadwal.id_jadwal', $id);
                $x = $this->db->get()->row_array();

                // Update the $x array with the new values
                $x['nama_tentor'] = $jadwal['nama_tentor'];
                $x['nama'] = $jadwal['nama'];
                $x['nama_kursus'] = $jadwal['nama_kursus'];

                $pesan = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                 Jadwal Bimbingan Berhasil Di Diedit.
                </div>';
                $this->session->set_flashdata('pesan', $pesan);
                tpl('jadwal/jadwal_view_form', $x);
            } else {
                echo "QUERY SQL ERROR";
            }
        } else {
            $x = array(
                'judul'         => 'Edit Jadwal Bimbingan',
                'aksi'          => 'edit',
                'nama_tentor'  => $this->m_admin->get_tentor(),
                'nama'          => $this->m_admin->get_siswa(),
                'nama_kursus'        => $this->m_admin->get_kursus()
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
