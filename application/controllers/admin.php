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
    tpl('admin/dashboard', $x);
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
        redirect(base_url('admin/dashboard'));
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

  public function keluar($value = '')
  {

    $this->session->sess_destroy();
    redirect(base_url(''));
  }
}
