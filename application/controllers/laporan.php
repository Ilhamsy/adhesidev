<?php
if (!defined('BASEPATH')) exit(header('Location:../'));
class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
    }

    public function index()
    {
        $x = array('judul' => 'Halaman Laporan', 'data' => $this->m_admin->jadwal());
        tpl('laporan/laporan_view', $x);
    }

    public function print()
    {
        $data = $this->input->post('data');

        switch ($data) {
            case 'tentor':
                $this->print_tentor_data();
                break;
            case 'siswa':
                $this->print_siswa_data();
                break;
            case 'kursus':
                $this->print_kursus_data();
                break;
            case 'jadwal':
                $this->print_jadwal_data();
                break;
            default:
                echo "Please select a valid option.";
        }
    }

    private function print_tentor_data()
    {
        $data['tentor'] = $this->m_admin->get_tentor();
        $this->load->view('laporan/laporan_print_tentor', $data);
    }
    private function print_siswa_data()
    {
        $data['siswa'] = $this->m_admin->get_siswa();
        $this->load->view('laporan/laporan_print_siswa', $data);
    }
    private function print_kursus_data()
    {
        $data['kursus'] = $this->m_admin->get_kursus();
        $this->load->view('laporan/laporan_print_kursus', $data);
    }
    private function print_jadwal_data()
    {
        $data['jadwal'] = $this->m_admin->jadwal();
        $this->load->view('laporan/laporan_print_jadwal', $data);
    }
}
