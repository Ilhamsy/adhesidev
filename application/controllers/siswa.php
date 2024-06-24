<?php
class Siswa extends CI_Controller
{
    public function index()
    {
        $x = array(
            'judul' => 'Data Siswa',
            'data' => $this->db->get('siswa')->result_array()
        );
        tpl('siswa/siswa_view', $x);
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
                redirect(base_url('siswa'));
            } else {
                echo "QUERY SQL ERROR";
            }
        } else {
            tpl('siswa/siswa_view_form', $x);
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
            redirect(base_url('siswa'));

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
                redirect(base_url('siswa'));
            } else {
                echo "QUERY SQL ERROR";
            }
        } else {
            tpl('siswa/siswa_view_form', $x);
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
            redirect(base_url('siswa'));
        }
    }
}
