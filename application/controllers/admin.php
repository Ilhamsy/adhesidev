<?php
if (!defined('BASEPATH')) exit(header('Location:../'));
class Admin extends CI_controller
{
  function __construct()
  {
    parent::__construct();
    session_start();
    $timeout = 10; // setting timeout dalam menit
    $logout = "http://localhost/Adhesidev/"; // redirect halaman logout

    $timeout = $timeout * 60; // menit ke detik
    if (isset($_SESSION['start_session'])) {
      $elapsed_time = time() - $_SESSION['start_session'];
      if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script type='text/javascript'>alert('Sesi telah berakhir');window.location='$logout'</script>";
      }
    }

    $_SESSION['start_session'] = time();
    // error_reporting(0);
    if ($this->session->userdata('admin') != TRUE) {
      redirect(base_url(''));
      exit;
    };
    $this->load->model("m_admin");
  }

  public function index()
  {
    $x = array('judul' => 'Dashboard');
    tpl('admin/home', $x);
  }

  public function tentor()
  {
    $x = array(
      'judul' => 'Data Tentor',
      'data' => $this->db->get('tentor')->result_array()
    );
    tpl('admin/tentor', $x);
  }


  public function ls_tentor($value = '')
  {
    $data = $this->m_admin->tentor()->row_array();
    echo json_encode($data);
  }
  public function tentor_tambah()
  {
    $x = array(
      'judul'          => 'Tambah Data Tentor',
      'aksi'          => 'tambah',
      'nama_tentor'  => '',
      'email'         => '',
      'alamat'      => '',
      'jml_siswa' => '',
      'telepon'        => '',
      'bidang'        => '',
      'status'        => ''
    );
    if (isset($_POST['kirim'])) {
      $inputData = array(
        'nama_tentor'  => $this->input->post('nama_tentor'),
        'email'         => $this->input->post('email'),
        'alamat'      => $this->input->post('alamat'),
        'jml_siswa' => $this->input->post('jml_siswa'),
        'telepon'        => $this->input->post('telepon'),
        'bidang'        => $this->input->post('bidang'),
        'status'        => $this->input->post('status')
      );
      $cek = $this->db->insert('tentor', $inputData);
      if ($cek) {
        $pesan = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di tambahkan.
              </div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect(base_url('admin/tentor'));
      } else {
        echo "QUERY SQL ERROR";
      }
    } else {
      tpl('admin/tentor_form', $x);
    }
  }
  public function tentor_edit($id = '')
  {
    $sql = $this->db->get_where('tentor', array('id_tentor' => $id))->row_array();
    $x = array(
      'judul'        => 'Edit Data Mentor',
      'aksi'        => 'tambah',
      'nama_tentor'      => $sql['nama_tentor'],
      'email'             => $sql['email'],
      'alamat'          => $sql['alamat'],
      'jml_siswa'    => $sql['jml_siswa'],
      'telepon'            => $sql['telepon'],
      'bidang'            => $sql['bidang'],
      'status'            => $sql['status']
    );
    if (isset($_POST['kirim'])) {
      $inputData = array(
        'nama_tentor'      => $this->input->post('nama_tentor'),
        'email'             => $this->input->post('email'),
        'alamat'          => $this->input->post('alamat'),
        'jml_siswa'    => $this->input->post('jml_siswa'),
        'telepon'            => $this->input->post('telepon'),
        'bidang'            => $this->input->post('bidang'),
        'status'            => $this->input->post('status')
      );
      $cek = $this->db->update('tentor', $inputData, array('id_tentor' => $id));
      if ($cek) {
        $pesan = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di edit.
              </div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect(base_url('admin/tentor'));
      } else {
        echo "QUERY SQL ERROR";
      }
    } else {
      tpl('admin/tentor_form', $x);
    }
  }

  public function tentor_hapus($id = '')
  {
    $cek = $this->db->delete('tentor', array('id_tentor' => $id));
    if ($cek) {
      $pesan = '<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i> Success!</h4>
              Data Berhasil Di Hapus.
              </div>';
      $this->session->set_flashdata('pesan', $pesan);
      redirect(base_url('admin/tentor'));
    }
  }

  public function siswa()
  {
    $x = array(
      'judul' => 'Data Siswa',
      'data' => $this->db->get('siswa')->result_array()
    );
    tpl('admin/siswa', $x);
  }


  public function ls_siswa($value = '')
  {
    $data = $this->m_admin->siswa()->row_array();
    echo json_encode($data);
  }

  public function siswa_tambah()
  {

    $x = array(
      'judul' => 'Tambah Data Siswa',
      'aksi'            => 'tambah',
      'nama'            => '',
      'jenis_kelamin'   => '',
      'alamat'          => '',
      'tgl_lahir'       => '',
      'last_education'  => '',
      'next_education'  => '',
      'university'      => '',
      'nilai'           => '',
      'toefl'           => '',
      'telepon'          => ''
    );

    if (isset($_POST['kirim'])) {
      $SQLinsert = array(
        'id_siswa' => $this->input->post('id_siswa'),
        'nama' => $this->input->post('nama'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'alamat' => $this->input->post('alamat'),
        'tgl_lahir' => $this->input->post('tgl_lahir'),
        'last_education' => $this->input->post('last_education'),
        'next_education' => $this->input->post('next_education'),
        'university' => $this->input->post('university'),
        'nilai' => $this->input->post('nilai'),
        'toefl' => $this->input->post('toefl'),
        'telepon' => $this->input->post('telepon')
      );

      $cek = $this->db->insert('siswa', $SQLinsert);
      if ($cek) {
        $pesan = '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                       Data Berhasil Di Tambahkan.
                      </div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect(base_url('admin/siswa'));
      } else {
        echo "QUERY SQL ERROR";
      }
    } else {
      tpl('admin/siswa_form', $x);
    }
  }

  public function siswa_edit($id = '')
  {
    $data = $this->db->get_where('siswa', array('id_siswa' => $id))->row_array();
    $x = array(
      'aksi' => 'edit',
      'judul' => 'Edit Data Siswa',
      'nama' => $data['nama'],
      'jenis_kelamin' => $data['jenis_kelamin'],
      'alamat' => $data['alamat'],
      'tgl_lahir' => $data['tgl_lahir'],
      'last_education' => $data['last_education'],
      'next_education' => $data['next_education'],
      'university' => $data['university'],
      'nilai' => $data['nilai'],
      'toefl' => $data['toefl'],
      'telepon' => $data['telepon']
    );
    if (isset($_POST['kirim'])) {
      $SQLinsert = array(
        'nama' => $this->input->post('nama'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'alamat' => $this->input->post('alamat'),
        'tgl_lahir' => $this->input->post('tgl_lahir'),
        'last_education' => $this->input->post('last_education'),
        'next_education' => $this->input->post('next_education'),
        'university' => $this->input->post('university'),
        'nilai' => $this->input->post('nilai'),
        'toefl' => $this->input->post('toefl'),
        'telepon' => $this->input->post('telepon')
      );

      $this->db->update('siswa', $SQLinsert, array('id_siswa' => $id));
      $pesan = '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-check"></i> Success!</h4>
                     Data Berhasil Di Edit.
                    </div>';
      $this->session->set_flashdata('pesan', $pesan);
      redirect(base_url('admin/siswa'));

      $SQLinsert = array(
        'id_siswa' => $this->input->post('id_siswa'),
        'nama' => $this->input->post('nama'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'alamat' => $this->input->post('alamat'),
        'tgl_lahir' => $this->input->post('tgl_lahir'),
        'last_education' => $this->input->post('last_education'),
        'next_education' => $this->input->post('next_education'),
        'university' => $this->input->post('university'),
        'nilai' => $this->input->post('nilai'),
        'toefl' => $this->input->post('toefl'),
        'telepon' => $this->input->post('telepon')
        //'password'=>md5($this->input->post('password'))
      );
      $cek = $this->db->update('siswa', $SQLinsert, array('id_siswa' => $id));
      if ($cek) {
        $pesan = '<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h4><i class="icon fa fa-check"></i> Success!</h4>
                         Data Berhasil Di Edit.
                        </div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect(base_url('admin/siswa'));
      } else {
        echo "QUERY SQL ERROR";
      }
    } else {
      tpl('admin/siswa_form', $x);
    }
  }


  public function siswa_hapus($id = '')
  {
    $foto = $this->db->get_where('siswa', array('id_siswa' => $id))->row_array();
    if ($foto['foto'] != "") {
      @unlink('template/data/' . $foto['foto']);
    } else {
    }

    $cek = $this->db->delete('siswa', array('id_siswa' => $id));
    if ($cek) {
      $pesan = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
      $this->session->set_flashdata('pesan', $pesan);
      redirect(base_url('admin/siswa'));
    }
  }


  //bagian absensi  

  // public function cari_pegawai()
  // {
  //   if ($this->session->userdata('level') == "pegawai") {

  //     $id = $this->session->userdata('id_pegawai');
  //     $x['pegawai'] = $this->db->get_where('pegawai', array('id_pegawai' => $id));
  //     $this->load->view('admin/data_pegawai', $x);
  //   } elseif ($this->session->userdata('level') == "admin") {

  //     $id = $this->input->post('cari_p');
  //     $x['pegawai'] = $this->db->get_where('pegawai', array('id_pegawai' => $id));
  //     $this->load->view('admin/data_pegawai', $x);
  //   } elseif ($this->session->userdata('level') == "user") {
  //     $id = $this->input->post('cari_p');
  //     $x['pegawai'] = $this->db->get_where('pegawai', array('id_pegawai' => $id));
  //     $this->load->view('admin/data_pegawai', $x);
  //   }
  // }


  //bagian Login Administrais User..
  public function user_admin($value = '')
  {
    $x = array(
      'judul' => 'Data Hak Akses',
      'data' => $this->db->get('admin')
    );
    tpl('admin/user_admin', $x);
  }

  public function user_admin_tambah()
  {
    if (isset($_POST['kirim'])) {
      $data = array(
        'username' => $this->input->post('username'),
        'password' => md5($this->input->post('password')),
        'nama' => $this->input->post('nama'),
        'level' => $this->input->post('level'),
      );
      $cek = $this->db->insert('admin', $data);
      if ($cek) {
        $pesan = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Edit.
              </div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect(base_url('admin/user_admin'));
      } else {
        buat_alert('SYSTEM ERROR');
      }
    } else {
      $x = array(
        'judul' => 'Data Hak Akses',
        'username' => '',
        'nama'     => '',
        'data' => $this->db->get('admin')
      );
      tpl('admin/user_admin_form', $x);
    }
  }

  public function user_admin_edit($id = '')
  {
    $sql = $this->db->get_where('admin', array('id_admin' => $id))->row_array();
    if (isset($_POST['kirim'])) {
      $data = array(
        'username' => $this->input->post('username'),
        'password' => md5($this->input->post('password')),
        'nama' => $this->input->post('nama'),
        'level' => $this->input->post('level'),
      );
      $cek = $this->db->update('admin', $data, array('id_admin' => $id));
      if ($cek) {
        $pesan = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Edit.
              </div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect(base_url('admin/user_admin'));
      } else {
        buat_alert('SYSTEM ERROR');
      }
    } else {
      $x = array(
        'judul' => 'Edit Data Hak Akses',
        'username' => $sql['username'],
        'nama'     => $sql['nama'],
        'data' => $this->db->get('admin')
      );
      tpl('admin/user_admin_form', $x);
    }
  }
  public function user_admin_hapus($id = '')
  {
    if ($this->session->userdata('id_admin') == $id) {
      $pesan = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
              Anda Tidak Bisa Menghapus Anda Sendiri.
              </div>';
      $this->session->set_flashdata('pesan', $pesan);
      redirect(base_url('admin/user_admin'));
    } else {
      $this->db->delete('admin', array('id_admin' => $id));
      $pesan = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
      $this->session->set_flashdata('pesan', $pesan);
      redirect(base_url('admin/user_admin'));
    }
  }

  public function profil()
  {
    if (isset($_POST['kirim'])) {
      $data = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'nama'    => $this->input->post('nama'),
        'level' => $this->input->post('level')
      );
      $this->db->update('admin', $data, array('id_admin' => $this->session->userdata('id_admin')));
      $pesan = '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Edit Password Anda Adalah ' . $this->input->post('password') . ' .
              </div>';
      $this->session->set_flashdata('pesan', $pesan);
      redirect(base_url('admin/profil'));
    } else {
      $x = array(
        'judul' => 'Ubah Password Administrator',
        'data' => $this->db->get_where('admin', array('id_admin' => $this->session->userdata('id_admin')))->row_array(),
      );
      tpl('admin/ubah_password', $x);
    }
  }

  public function jadwal()
  {
    $x = array('judul' => 'Jadwal Bimbingan', 'data' => $this->m_admin->jadwal());
    //$x = $this->db->select ('nama_jabatan');
    //$x = $this->db->distinct();
    // $x = $this->db->from ('jabatan');
    tpl('admin/jadwal', $x);
  }

  public function jadwal_tentor($id = '')
  {
    $x = array('judul' => 'Jadwal Tentor', 'data' => $this->m_admin->get_student($id));
    // panggil view
    tpl('admin/jadwal_tentor', $x);
  }

  public function jadwal_tambah()
  {
    $x = array(
      'judul'          => 'Tambah Jadwal Bimbingan',
      'aksi'          => 'tambah',
      'nama'          => "",
      'nama_jabatan'  => "",
      'jam'           => "",
      'bidang'        => "",
    );
    if (isset($_POST['kirim'])) {
      $inputData = array(
        'nama'         => $this->input->post('nama'),
        'nama_jabatan' => $this->input->post('nama_jabatan'),
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
        redirect(base_url('admin/jadwal'));
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
      tpl('admin/jadwal_form', $x);
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
      'nama'          => $sql['nama'],
      'nama_tentor'  => $sql['nama_tentor'],
      'jam'           => $sql['jam'],
      'bidang'        => $sql['bidang']
    );
    if (isset($_POST['kirim'])) {
      $inputData = array(
        'nama'          => $this->input->post('nama'),
        'nama_tentor'  => $this->input->post('nama_tentor'),
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
        redirect(base_url('admin/Jadwal'));
      } else {
        echo "QUERY SQL ERROR";
      }
    } else {
      $x = array(
        'judul'         => 'Edit Jadwal Bimbingan',
        'aksi'          => 'edit',
        'nama'          => $this->m_admin->get_siswa_join_jadwal(),
        'nama_jabatan'  => $this->m_admin->getName_mentor(),
        'jam'           => "",
        'bidang'        => "",
      );
      tpl('admin/jadwal_form', $x);
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
      redirect(base_url('admin/jadwal'));
    }
  }

  public function keluar($value = '')
  {

    $this->session->sess_destroy();
    redirect(base_url(''));
  }
}
