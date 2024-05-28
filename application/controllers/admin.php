<?php
 if ( ! defined('BASEPATH')) exit(header('Location:../'));
class Admin extends CI_controller
{
  function __construct()
  {
   parent:: __construct();
   session_start ();
      $timeout = 10; // setting timeout dalam menit
	    $logout = "http://localhost/Adhesidev/"; // redirect halaman logout

	$timeout = $timeout * 60; // menit ke detik
	if(isset($_SESSION['start_session'])){
		$elapsed_time = time()-$_SESSION['start_session'];
		if($elapsed_time >= $timeout){
			session_destroy();
			echo "<script type='text/javascript'>alert('Sesi telah berakhir');window.location='$logout'</script>";
		}
	}

	$_SESSION['start_session']=time();
   // error_reporting(0);
    if($this->session->userdata('admin') != TRUE){
      redirect(base_url(''));
      exit;
    };
    $this->load->model("m_admin");
  }

  public function index()
  {
      $x = array('judul' =>'Dashboard');
      tpl('admin/home',$x);
  }

  public function jabatan()
  {
   $x = array('judul' =>'Data Mentor', 
              'data'=>$this->db->get('jabatan')->result_array()); 
   tpl('admin/jabatan',$x);
  }


  public function ls_jabatan($value='')
  {$data=$this->m_admin->jabatan()->row_array();
  echo json_encode($data);
}
  public function jabatan_tambah()
  {
  $x = array('judul'          => 'Tambah Data Mentor' ,
              'aksi'          => 'tambah',
              'nama_jabatan'  => '',
              'Email'         => '',
              'Domisili'      => '',
              'Jumlah_Student'=> '',
              'No_Tlp'        => '',
              'Bidang'        => '',
              'Status'        => ''
            );
    if(isset($_POST['kirim'])){
      $inputData=array(
        'nama_jabatan'  =>$this->input->post('nama_jabatan'),
        'Email'         =>$this->input->post('Email'),
        'Domisili'      =>$this->input->post('Domisili'),
        'Jumlah_Student'=>$this->input->post('Jumlah_Student'),
        'No_Tlp'        =>$this->input->post('No_Tlp'),
        'Bidang'        =>$this->input->post('Bidang'),
        'Status'        =>$this->input->post('Status'));
      $cek=$this->db->insert('jabatan',$inputData);
      if($cek)
      {
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di tambahkan.
              </div>';
        $this->session->set_flashdata('pesan',$pesan);
        redirect(base_url('admin/jabatan'));
      }
      else
      {
        echo "QUERY SQL ERROR";
      }
    }
    else
    {
      tpl('admin/jabatan_form',$x);
    }
  }
  public function jabatan_edit($id='')
  {
  $sql=$this->db->get_where('jabatan',array('id_jabatan'=>$id))->row_array(); 
  $x = array('judul'        =>'Edit Data Mentor' ,
              'aksi'        =>'tambah',
        'nama_jabatan'      =>$sql['nama_jabatan'],
        'Email'             =>$sql['Email'],
        'Domisili'          =>$sql['Domisili'],
        'Jumlah_Student'    =>$sql['Jumlah_Student'],
        'No_Tlp'            =>$sql['No_Tlp'],
        'Bidang'            =>$sql['Bidang'],
        'Status'            =>$sql['Status']); 
    if(isset($_POST['kirim']))
    {
      $inputData=array(
        'nama_jabatan'      =>$this->input->post('nama_jabatan'),
        'Email'             =>$this->input->post('Email'),
        'Domisili'          =>$this->input->post('Domisili'),
        'Jumlah_Student'    =>$this->input->post('Jumlah_Student'),
        'No_Tlp'            =>$this->input->post('No_Tlp'),
        'Bidang'            =>$this->input->post('Bidang'),
        'Status'            =>$this->input->post('Status'));
      $cek=$this->db->update('jabatan',$inputData,array('id_jabatan'=>$id));
      if($cek)
      {
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di edit.
              </div>';
        $this->session->set_flashdata('pesan',$pesan);
        redirect(base_url('admin/jabatan'));
      }
      else
      {
        echo "QUERY SQL ERROR";
      }
    }
    else
    {
        tpl('admin/jabatan_form',$x);
    }
  }

  public function jabatan_hapus($id='')
  {
   $cek=$this->db->delete('jabatan',array('id_jabatan'=>$id));
   if ($cek) 
   {
    $pesan='<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i> Success!</h4>
              Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/jabatan'));
   }
  }

  public function pegawai()
  {
   $x = array('judul' =>'Data Student', 
              'data'=>$this->db->get('pegawai')->result_array()); 
   tpl('admin/pegawai',$x);
  }


  public function ls_pegawai($value='')
  {
   $data=$this->m_admin->pegawai()->row_array();
   echo json_encode($data);
  }

  public function pegawai_tambah()
  {
    
   $x = array('judul' =>'Tambah Data Student' , 
    'aksi'            =>'tambah',
    'nama'            =>'',
    'jenis_kelamin'   =>'',
    'alamat'          =>'',
    'tgl_lahir'       =>'',
    'last_education'  =>'',
    'next_education'  =>'',
    'university'      =>'',
    'nilai'           =>'',
    'toefl'           =>'',
    'no_tlp'          =>''
  );
    
   if (isset($_POST['kirim'])) {
        $SQLinsert=array(
        'id_pegawai'=>$this->input->post('id_pegawai'),
        'nama'=>$this->input->post('nama'),
        'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
        'alamat'=>$this->input->post('alamat'),
        'tgl_lahir'=>$this->input->post('tgl_lahir'),
        'last_education'=>$this->input->post('last_education'),
        'next_education'=>$this->input->post('next_education'),
        'university'=>$this->input->post('university'),
        'nilai'=>$this->input->post('nilai'),
        'toefl'=>$this->input->post('toefl'),
        'no_tlp'=>$this->input->post('no_tlp')
        );

        $cek=$this->db->insert('pegawai',$SQLinsert);
        if($cek){
            $pesan='<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                       Data Berhasil Di Tambahkan.
                      </div>';
            $this->session->set_flashdata('pesan',$pesan);
            redirect(base_url('admin/pegawai'));
        }else{
         echo "QUERY SQL ERROR";
        }
    }else{
      tpl('admin/pegawai_form',$x);
    } 
 
  }

  public function pegawai_edit($id='')
  { 
  $data=$this->db->get_where('pegawai',array('id_pegawai'=>$id))->row_array();  
  $x = array('aksi'=>'edit',
    'judul' =>'Edit Data Student' ,
    'nama'=>$data['nama'],
    'jenis_kelamin'=>$data['jenis_kelamin'],
    'alamat'=>$data['alamat'],
    'tgl_lahir'=>$data['tgl_lahir'],
    'last_education'=>$data['last_education'],
    'next_education'=>$data['next_education'],
    'university'=>$data['university'],
    'nilai'=>$data['nilai'],
    'toefl'=>$data['toefl'],
    'no_tlp'=>$data['no_tlp']
  );
  if (isset($_POST['kirim'])) {     
      $SQLinsert=array(
      'nama'=>$this->input->post('nama'),
      'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
      'alamat'=>$this->input->post('alamat'),
      'tgl_lahir'=>$this->input->post('tgl_lahir'),
      'last_education'=>$this->input->post('last_education'),
      'next_education'=>$this->input->post('next_education'),
      'university'=>$this->input->post('university'),
      'nilai'=>$this->input->post('nilai'),
      'toefl'=>$this->input->post('toefl'),
      'no_tlp'=>$this->input->post('no_tlp')
      );

      $this->db->update('pegawai',$SQLinsert,array('id_pegawai'=>$id));
      $pesan='<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-check"></i> Success!</h4>
                     Data Berhasil Di Edit.
                    </div>';
      $this->session->set_flashdata('pesan',$pesan);
      redirect(base_url('admin/pegawai'));
    
          $SQLinsert=array(
          'id_pegawai'=>$this->input->post('id_pegawai'),
          'nama'=>$this->input->post('nama'),
          'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
          'alamat'=>$this->input->post('alamat'),
          'tgl_lahir'=>$this->input->post('tgl_lahir'),
          'last_education'=>$this->input->post('last_education'),
          'next_education'=>$this->input->post('next_education'),
          'university'=>$this->input->post('university'),
          'nilai'=>$this->input->post('nilai'),
          'toefl'=>$this->input->post('toefl'),
          'no_tlp'=>$this->input->post('no_tlp')
          //'password'=>md5($this->input->post('password'))
          );
          $cek=$this->db->update('pegawai',$SQLinsert,array('id_pegawai'=>$id));
          if($cek){
              $pesan='<div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h4><i class="icon fa fa-check"></i> Success!</h4>
                         Data Berhasil Di Edit.
                        </div>';
              $this->session->set_flashdata('pesan',$pesan);
              redirect(base_url('admin/pegawai'));
          }else{
           echo "QUERY SQL ERROR";
          }
        }
    else{
      tpl('admin/pegawai_form',$x);
    }
  }
   

  public function pegawai_hapus($id='')
  {
    $foto=$this->db->get_where('pegawai',array('id_pegawai'=>$id))->row_array();
    if($foto['foto'] != ""){ @unlink('template/data/'.$foto['foto']); }else{ }

    $cek=$this->db->delete('pegawai',array('id_pegawai'=>$id));
   if ($cek) {
    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/pegawai'));
   }
  } 


//bagian absensi  

  public function cari_pegawai()
  {
  if($this->session->userdata('level') == "pegawai"){  

     $id = $this->session->userdata('id_pegawai');  
     $x['pegawai']=$this->db->get_where('pegawai',array('id_pegawai'=>$id));
     $this->load->view('admin/data_pegawai',$x);

  }elseif($this->session->userdata('level') == "admin"){

     $id=$this->input->post('cari_p');  
     $x['pegawai']=$this->db->get_where('pegawai',array('id_pegawai'=>$id));
     $this->load->view('admin/data_pegawai',$x);

  }elseif($this->session->userdata('level') == "user"){
     $id=$this->input->post('cari_p');  
     $x['pegawai']=$this->db->get_where('pegawai',array('id_pegawai'=>$id));
     $this->load->view('admin/data_pegawai',$x);
  }
}

 
//bagian Login Administrais User..
public function user_admin($value='')
{
$x = array('judul' =>'Data Hak Akses',
            'data' =>$this->db->get('admin')); 
 tpl('admin/user_admin',$x);
}

public function user_admin_tambah()
{
if(isset($_POST['kirim'])){
 $data = array(
                'username' =>$this->input->post('username'),
                'password' =>md5($this->input->post('password')),
                'nama' =>$this->input->post('nama'),
                'level' =>$this->input->post('level'), );
 $cek =$this->db->insert('admin',$data);
 if($cek){
      $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Edit.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/user_admin'));
 }else{
  buat_alert('SYSTEM ERROR');
 }
 
}else{
$x = array('judul' =>'Data Hak Akses',
           'username' =>'',
           'nama'     =>'',
           'data' =>$this->db->get('admin')); 
 tpl('admin/user_admin_form',$x);
}
}

public function user_admin_edit($id='')
{
$sql=$this->db->get_where('admin',array('id_admin'=>$id))->row_array();  
if(isset($_POST['kirim'])){
 $data = array(
                'username' =>$this->input->post('username'),
                'password' =>md5($this->input->post('password')),
                'nama' =>$this->input->post('nama'),
                'level' =>$this->input->post('level'),);
 $cek =$this->db->update('admin',$data,array('id_admin' =>$id));
 if($cek){
      $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Edit.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/user_admin'));
 }else{
  buat_alert('SYSTEM ERROR');
 }
}else{
$x = array('judul' =>'Edit Data Hak Akses',
            'username' =>$sql['username'],
            'nama'     =>$sql['nama'],
            'data' =>$this->db->get('admin')); 
 tpl('admin/user_admin_form',$x);
}
}
public function user_admin_hapus($id='')
{
 if($this->session->userdata('id_admin') == $id){
  $pesan='<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
              Anda Tidak Bisa Menghapus Anda Sendiri.
              </div>';
 $this->session->set_flashdata('pesan',$pesan);
 redirect(base_url('admin/user_admin'));

 }else{ 
 $this->db->delete('admin',array('id_admin' =>$id));
  $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
 $this->session->set_flashdata('pesan',$pesan);
 redirect(base_url('admin/user_admin'));
  }
}

public function profil()
{
 if (isset($_POST['kirim'])) {
     $data = array('username' => $this->input->post('username'),
                  'password' => $this->input->post('password'),
                    'nama'    => $this->input->post('nama'),
                    'level' => $this->input->post('level'));
      $this->db->update('admin',$data,array('id_admin'=>$this->session->userdata('id_admin')));
      $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Edit Password Anda Adalah '.$this->input->post('password').' .
              </div>';
   $this->session->set_flashdata('pesan',$pesan);
   redirect(base_url('admin/profil'));   
  }else{
   $x = array('judul' =>'Ubah Password Administrator', 
               'data' =>$this->db->get_where('admin',array('id_admin'=>$this->session->userdata('id_admin')))->row_array(),
             );
   tpl('admin/ubah_password',$x);            
  } 

}

public function jadwal()
{
  $x = array('judul' =>'Jadwal Bimbingan','data'=>$this->m_admin->jadwal());
  //$x = $this->db->select ('nama_jabatan');
  //$x = $this->db->distinct();
 // $x = $this->db->from ('jabatan');
  tpl('admin/jadwal',$x); 
}

public function jadwal_mentor($id='') {
  $x = array('judul' =>'Jadwal Mentor','data' => $this->m_admin->get_student($id));
  // panggil view
  tpl('admin/jadwal_mentor',$x);

}

public function jadwal_tambah()
  {
  $x = array('judul'          => 'Tambah Jadwal Bimbingan' ,
              'aksi'          => 'tambah',
              'nama'          => "",
              'nama_jabatan'  => "",
              'jam'           => "",
              'bidang'        => "",);
    if(isset($_POST['kirim'])){
      $inputData=array(
        'nama'         =>$this->input->post('nama'),
        'nama_jabatan' =>$this->input->post('nama_jabatan'),
        'jam'          =>$this->input->post('jam'),
        'bidang'       =>$this->input->post('bidang'));
      
      $pegawai = $this->db->get_where('pegawai', array('id_pegawai'=>$inputData["nama"]))->row();
      //$pegawai = $this->db->where(orderby('nama_jabatan'))->row();
      $jabatan = $this->db->get_where('jabatan', array('id_jabatan' => $inputData["nama_jabatan"]))->row();
      print_r($pegawai,"pegawai");
      $jadwal["id_peg"] = $pegawai->id_pegawai;
      $jadwal["id_jab"] = $jabatan->id_jabatan;
      $jadwal["jam"]    = $inputData["jam"];
      $jadwal["bidang"] = $inputData["bidang"];
      $cek = $this->db->insert("jadwal", $jadwal);
      if($cek)
      {
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Jadwal Bimbingan Berhasil Di Ditambahkan.
              </div>';
        $this->session->set_flashdata('pesan',$pesan);
        redirect(base_url('admin/jadwal'));
      }
      else
      {
        echo "QUERY SQL ERROR";
      }
    }
    else
    {
      $x = array(
        'judul'          => 'Tambah Jadwal Bimbingan' ,
        'aksi'          => 'tambah',
        'nama'          => $this->m_admin->get_pegawai_join_jadwal(),
        'nama_jabatan'  => $this->m_admin->getName_mentor(),
        'jam'           => "",
        'bidang'        => "",
      );
      tpl('admin/jadwal_form',$x);
    }
  }

  public function jadwal_edit($id='')
  {
  $sql=$this->db->select ('*');
  $sql=$this->db->from ('jadwal');
  $sql=$this->db->join('jabatan','jabatan.id_jabatan=jadwal.id_jab');
  $sql=$this->db->join('pegawai','pegawai.id_pegawai=jadwal.id_peg');
  $sql=$this->db->where ('jadwal.id_jadwal',$id);
  $sql=$this->db->get()->row_array();
  $x = array('judul'          =>'Edit Jadwal Bimbingan' ,
              'aksi'          =>'edit',
              'nama'          =>$sql['nama'],
              'nama_jabatan'  =>$sql['nama_jabatan'],
              'jam'           =>$sql['jam'],
              'bidang'        =>$sql['bidang']); 
    if(isset($_POST['kirim']))
    {
      $inputData=array(
        'nama'          =>$this->input->post('nama'),
        'nama_jabatan'  =>$this->input->post('nama_jabatan'),
        'jam'           =>$this->input->post('jam'),
        'bidang'        =>$this->input->post('bidang'));
        
      $pegawai = $this->db->get_where('pegawai', array('id_pegawai' => $inputData["nama"]))->row();
      $jabatan = $this->db->get_where('jabatan', array('id_jabatan' => $inputData["nama_jabatan"]))->row();
      print_r($pegawai);
      $jadwal["id_peg"] = $pegawai->id_pegawai;
      $jadwal["id_jab"] = $jabatan->id_jabatan;
      $jadwal["jam"] = $inputData["jam"];
      $jadwal["bidang"] = $inputData["bidang"];
      $this->db->where('id_jadwal',$id);
      $cek = $this->db->update("jadwal", $jadwal);
      if($cek)
      {
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Jadwal Bimbingan Berhasil Di Diedit.
              </div>';
        $this->session->set_flashdata('pesan',$pesan);
        redirect(base_url('admin/Jadwal'));
      }
      else
      {
        echo "QUERY SQL ERROR";
      }
    }
    else
    {
      $x = array(
        'judul'         => 'Edit Jadwal Bimbingan' ,
        'aksi'          => 'edit',
        'nama'          => $this->m_admin->get_pegawai_join_jadwal(),
        'nama_jabatan'  => $this->m_admin->getName_mentor(),
        'jam'           => "",
        'bidang'        => "",
      );
        tpl('admin/jadwal_form',$x);
    }
  }

  public function jadwal_hapus($id='')
  {
   $cek=$this->db->delete('jadwal',array('id_jadwal'=>$id));
   if ($cek) 
   {
    $pesan='<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i> Success!</h4>
              Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/jadwal'));
   }
  }

public function keluar($value='')
{

$this->session->sess_destroy();
redirect(base_url(''));
}
  
}