<?php

class Login extends CI_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('login_m');
  }

  public function index()
  {
    if (isset($_POST['login'])) {

      $username = barasiah($this->input->post('username'));
      $password = barasiah($this->input->post('password'));

      //cek data login
      $admin  = $this->login_m->admin($username, $password);

      if ($admin->num_rows() > 0) {
        $DataAdmin = $admin->row_array();
        $sessionAdmin = array(
          'admin'    => TRUE,
          'id_admin' => $DataAdmin['id_admin'],
          'username' => $DataAdmin['username'],
          'password' => $DataAdmin['password'],
          'nama'     => $DataAdmin['nama'],
          'level'    => $DataAdmin['level']
        );
        $this->session->set_userdata($sessionAdmin);

        echo '
        <script type="text/JavaScript"> 
            alert("Anda berhasil login.");
            document.location.href="admin"
        </script>';
?>
    <?php
        echo mysqli_error($connect);

        redirect(base_url('admin/index'));
      } elseif ($admin->num_rows() > 0) {
        $DataPegawai = $admin->row_array();
        $sessionPegawai = array(
          'admin'    => TRUE,
          'id_pegawai' => $DataPegawai['id_pegawai'],
          'username'  => $DataPegawai['username'],
          'password'  => $DataPegawai['password'],
          'nama'      => $DataPegawai['nama'],
          'level'     => $DataPegawai['level'],
        );
      } else {
        echo '
        <script type="text/JavaScript">
            alert("Incorrect username or password, please try again.");
            document.location.href=""
        </script>';
    ?>
    <?php
        echo mysqli_error($connect);
      }
    } else {
      $x = array(
        'judul' => '.:: Login Aplikasi ::.'
      );
      $this->load->view('login', $x);
    }
  }
}
