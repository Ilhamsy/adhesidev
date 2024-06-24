<?php
class Tentor extends CI_Controller
{
    public function index()
    {
        $x = array(
            'judul' => 'Data Tentor',
            'data' => $this->db->get('tentor')->result_array()
        );
        tpl('tentor/tentor_view', $x);
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
                redirect(base_url('tentor'));
            } else {
                echo "QUERY SQL ERROR";
            }
        } else {
            tpl('tentor/tentor_view_form', $x);
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
                redirect(base_url('tentor'));
            } else {
                echo "QUERY SQL ERROR";
            }
        } else {
            tpl('tentor/tentor_view_form', $x);
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
            redirect(base_url('tentor'));
        }
    }
}
