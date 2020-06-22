<?php
defined('BASEPATH') or exit('No direct script acess allowed');
class admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        //$this->load->model('model_tugas','',TRUE);
        $this->load->helper(array('form', 'url'));
    }

    function index()
    {
        $data['title'] = "Sistem Informasi Kesehatan Desa";
        $data['meta'] = "Sistem Informasi Kesehatan Desa";
        $data['content'] = 'admin_views/home';
        //$data['sidebar']='sidebar';
        $this->load->view('template', $data);
    }
    function grafik2()
    {
        $data['title'] = "Sistem Informasi Kesehatan Desa";
        $data['meta'] = "Sistem Informasi Kesehatan Desa";
        $data['content'] = 'admin_views/grafik2';
        //$data['sidebar']='sidebar';
        $this->load->view('template', $data);
    }
    function grafik3()
    {
        $data['title'] = "Sistem Informasi Kesehatan Desa";
        $data['meta'] = "Sistem Informasi Kesehatan Desa";
        $data['content'] = 'admin_views/grafik3';
        //$data['sidebar']='sidebar';
        $this->load->view('template', $data);
    }
    function grafik4()
    {
        $data['title'] = "Sistem Informasi Kesehatan Desa";
        $data['meta'] = "Sistem Informasi Kesehatan Desa";
        $data['content'] = 'admin_views/grafik4';
        //$data['sidebar']='sidebar';
        $this->load->view('template', $data);
    }

    //Awal Fungsi User
    function input_user()
    {
        $data['title'] = "Register";
        $data['meta'] = "Registrasi";
        $data['content'] = 'admin_views/input_user';
        //$data['sidebar']='sidebar';
        //mengambil data agaa untuk dipilihan 
        $data['kategoriuser'] = $this->admin_model->get_tb_kategoriuser();
        $this->load->view('template', $data);
    }
    function update_user($id)
    {
        $data['title'] = "Update Data";
        $data['meta'] = "Registrasi user Baru";
        $data['content'] = 'admin_views/input_user';
        //$data['sidebar']='sidebar';
        $this->db->where('md5(id)', $id);
        $data['user'] = $this->db->get('tb_user')->row_array();
        //print_r($data['user']);exit();
        //mengambil data agaa untuk dipilihan 
        $data['kategoriuser'] = $this->admin_model->get_tb_kategoriuser();
        $this->load->view('template', $data);
    }
    function delete_user($id)
    {
        $where = array('md5(id)' => $id);
        $this->admin_model->delete_user($where, 'tb_user');
        redirect('admin/data_user');
    }
    function data_user($page = 0)
    {
        $data['title'] = "daftar user";
        $data['meta'] = "daftar user";
        $config['total_rows'] = $this->admin_model->get_num_rows('tb_user');
        $config['per_page'] = 5;
        $config['base_url'] = site_url('admin/data_user');
        $data['user'] = $this->admin_model->get_user($config['per_page'], $page);
        $this->pagination->initialize($config);
        $data['content'] = 'admin_views/data_user';
        $this->load->view('template', $data);
    }
    function save_user()
    {
        //mengirim post ke model
        // $this->form_validation->set_rules('nama_user','Nama','required',array('required'=>'Nama harus diisi'));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('required' => 'Email harus diisi'));
        $this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Username harus diisi'));
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]', array('required' => 'Password harus diisi'));
        if ($this->form_validation->run() == FALSE) {
            $this->input_user();
        } else {
            if ($_POST['id'] != '') {
                //exit();
                $this->admin_model->save_update_user($_POST);
            } else {
                $this->admin_model->save_user($_POST);
            }
            //akses fungsi untuk menampilkan halaman daftar peserta
            redirect('admin/data_user');
        }
    }
    //Akhir Fungsi User

    //Awal Fungsi  KK
    function input_kk()
    {
        $data['title'] = "input kk";
        $data['meta'] = "input kk";
        $data['content'] = 'admin_views/input_kk';
        //$data['sidebar']='sidebar';
        $this->load->view('template', $data);
    }
    function update_kk($id_kk)
    {
        $data['title'] = "Update Data";
        $data['meta'] = "Registrasi user Baru";
        $data['content'] = 'admin_views/input_kk';
        //$data['sidebar']='sidebar';
        $this->db->where('md5(id_kk)', $id_kk);
        $data['kk'] = $this->db->get('tb_kk')->row_array();
        //print_r($data['user']);exit();
        //mengambil data agaa untuk dipilihan 
        $this->load->view('template', $data);
    }
    function delete_kk($id_kk)
    {
        $where = array('md5(id_kk)' => $id_kk);
        $this->admin_model->delete_kk($where, 'tb_kk');
        redirect('admin/data_kk');
    }
    function data_kk($page = 0)
    {
        $data['title'] = "daftar kk";
        $data['meta'] = "daftar kk";
        $config['total_rows'] = $this->admin_model->get_num_rows('tb_kk');
        $config['per_page'] = 5;
        $config['base_url'] = site_url('admin/data_kk');
        $data['kk'] = $this->admin_model->get_kk($config['per_page'], $page);
        $this->pagination->initialize($config);
        $data['content'] = 'admin_views/data_kk';
        $this->load->view('template', $data);
    }
    function save_kk()
    {
        //mengirim post ke model
        // $this->form_validation->set_rules('nama_user','Nama','required',array('required'=>'Nama harus diisi'));
        /* $this->form_validation->set_rules('email','Email','required|valid_email',array('required'=>'Email harus diisi'));
        $this->form_validation->set_rules('username','Username','required',array('required'=>'Username harus diisi'));
        $this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[20]',array('required'=>'Password harus diisi'));
        if($this->form_validation->run()==FALSE){
            $this->input_kk();
        }else{*/
        if ($_POST['id_kk'] != '') {
            //exit();
            $this->admin_model->save_update_kk($_POST);
        } else {
            $this->admin_model->save_kk($_POST);
        }
        //akses fungsi untuk menampilkan halaman daftar peserta
        redirect('admin/data_kk');
        //}
    }
    //Akhir Fungsi KK

    //Awal Fungsi Penduduk
    function input_penduduk()
    {
        $data['title'] = "Register";
        $data['meta'] = "Registrasi penduduk Baru";
        $data['content'] = 'admin_views/input_penduduk';
        //$data['sidebar']='sidebar';
        //mengambil data agaa untuk dipilihan agama
        $data['agama'] = $this->admin_model->get_tb_agama();
        $data['kk'] = $this->admin_model->get_tb_kk();
        $this->load->view('template', $data);
    }
    function update_penduduk($id_penduduk)
    {
        $data['title'] = "Update Data";
        $data['meta'] = "Registrasi penduduk Baru";
        $data['content'] = 'admin_views/input_penduduk';
        //$data['sidebar']='sidebar';
        $this->db->where('md5(id_penduduk)', $id_penduduk);
        $data['penduduk'] = $this->db->get('tb_penduduk')->row_array();
        //print_r($data['penduduk']);exit();
        //mengambil data agaa untuk dipilihan agama
        $data['agama'] = $this->admin_model->get_tb_agama();
        $data['kk'] = $this->admin_model->get_tb_kk();
        $this->load->view('template', $data);
    }
    function delete_penduduk($id_penduduk)
    {
        $where = array('md5(id_penduduk)' => $id_penduduk);
        $this->admin_model->delete_penduduk($where, 'tb_penduduk');
        redirect('admin/data_penduduk');
    }
    function data_penduduk($page = 0)
    {
        $data['title'] = "daftar penduduk";
        $data['meta'] = "daftar penduduk";
        $config['total_rows'] = $this->admin_model->get_num_rows('tb_penduduk');
        $config['per_page'] = 1;
        $config['base_url'] = site_url('admin/data_penduduk');
        $data['penduduk'] = $this->admin_model->get_penduduk($config['per_page'], $page);
        $this->pagination->initialize($config);
        $data['content'] = 'admin_views/data_penduduk';
        $this->load->view('template', $data);
    }
    function save_penduduk()
    {
        //mengirim post ke model
        /*$this->form_validation->set_rules('nip','NIP','required',array('required'=>'NIP harus diisi'));
        $this->form_validation->set_rules('nama','Nama','required',array('required'=>'Nama harus diisi'));
        $this->form_validation->set_rules('no_rekening','No_rekening','required',array('required'=>'Rekening harus diisi'));
        $this->form_validation->set_rules('email','Email','required|valid_email',array('required'=>'Email harus diisi'));
        $this->form_validation->set_rules('username','Username','required',array('required'=>'Username harus diisi'));
        $this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[20]',array('required'=>'Password harus diisi'));
        if($this->form_validation->run()==FALSE){
            $this->input_profile();
        }else{*/
        if ($_POST['id_penduduk'] != '') {
            //exit();
            $this->admin_model->save_update_penduduk($_POST);
        } else {
            $this->admin_model->save_penduduk($_POST);
        }
        //akses fungsi untuk menampilkan halaman daftar peserta
        redirect('admin/data_penduduk');
        //}
    }
    //Akhir Fungsi Penduduk

    //Awal fungsi kesehatan
    function input_kesehatan()
    {
        $data['title'] = "Register";
        $data['meta'] = "Registrasi penduduk Baru";
        $data['content'] = 'admin_views/input_kesehatan';
        //$data['sidebar']='sidebar';
        //mengambil data agaa untuk dipilihan agama
        $data['penduduk'] = $this->admin_model->get_tb_penduduk();
        $this->load->view('template', $data);
    }
    function update_kesehatan($id_kesehatan)
    {
        $data['title'] = "Update Data";
        $data['meta'] = "Registrasi penduduk Baru";
        $data['content'] = 'admin_views/input_kesehatan';
        //$data['sidebar']='sidebar';
        $this->db->where('md5(id_kesehatan)', $id_kesehatan);
        $data['kesehatan'] = $this->db->get('tb_kesehatan')->row_array();
        //print_r($data['penduduk']);exit();
        //mengambil data agaa untuk dipilihan agama
        $data['penduduk'] = $this->admin_model->get_tb_penduduk();
        $this->load->view('template', $data);
    }
    function delete_kesehatan($id_kesehatan)
    {
        $where = array('md5(id_kesehatan)' => $id_kesehatan);
        $this->admin_model->delete_kesehatan($where, 'tb_kesehatan');
        redirect('admin/data_kesehatan');
    }
    function data_kesehatan($page = 0)
    {
        $data['title'] = "daftar penduduk";
        $data['meta'] = "daftar penduduk";
        $config['total_rows'] = $this->admin_model->get_num_rows('tb_kesehatan');
        $config['per_page'] = 1;
        $config['base_url'] = site_url('admin/data_kesehatan');
        $data['kesehatan'] = $this->admin_model->get_kesehatan($config['per_page'], $page);
        $this->pagination->initialize($config);
        $data['content'] = 'admin_views/data_kesehatan';
        $this->load->view('template', $data);
    }
    function save_kesehatan()
    {
        $this->db->select('id_kk,tahun_lahir');
        $this->db->where('id_penduduk', $_POST['penduduk']);
        $pddk = $this->db->get('tb_penduduk')->row_array();
        $idkk = $pddk['id_kk'];
        $this->db->select('nomor_kk');
        $this->db->where('id_kk', $idkk);
        $kk = $this->db->get('tb_kk')->row_array();
        $no_kk = $kk['nomor_kk'];
        $_POST['nomor_kk'] = $no_kk;
        $_POST['id_kk'] = $idkk;
        $_POST['tahun_lahir'] = $pddk['tahun_lahir'];
        $this->admin_model->save_kesehatan($_POST);
        //akses fungsi untuk menampilkan halaman daftar user
        redirect('admin/data_kesehatan');
    }
    //Akhir pungsi kesehatan

    function input_berita()
    {
        $data['title'] = "berita";
        $data['meta'] = "berita";
        $data['content'] = 'admin_views/input_berita';
        //$data['sidebar']='sidebar';
        $this->load->view('template', $data);
    }
    function save_berita()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required', array('required' => 'Judul harus diisi'));
        $this->form_validation->set_rules('penulis', 'Penulis', 'required', array('required' => 'Nama penulis harus diisi'));
        $this->form_validation->set_rules('tanggal_berita', 'Tanggal', 'required', array('required' => 'Tanggal harus diisi'));
        if ($this->form_validation->run() == FALSE) {
            $this->input_berita();
        } else {
            if ($_POST['id_berita'] != '') {
                //exit();
                $this->admin_model->save_update_berita($_POST);
            } else {
                $this->admin_model->save_berita($_POST);
            }
            //akses fungsi untuk menampilkan halaman daftar peserta
            redirect('admin/daftar_berita');
        }
    }
    function daftar_berita($page = 0)
    {
        $data['title'] = "daftar berita";
        $data['meta'] = "daftar berita";
        $config['total_rows'] = $this->admin_model->get_num_rows('tb_berita');
        $config['per_page'] = 4;
        $config['base_url'] = site_url('admin/daftar_berita');
        $data['berita'] = $this->admin_model->get_berita($config['per_page'], $page);
        $this->pagination->initialize($config);
        $data['content'] = 'admin_views/daftar_berita';
        $this->load->view('template', $data);
    }
    function view()
    {
        $kode = $this->uri->segment(3);
        $data['data'] = $this->admin_model->get_berita_by_kode($kode);
        $data['content'] = 'admin_views/detail_berita';
        $this->load->view('template', $data);
    }
    function update_berita($id_berita)
    {
        $data['title'] = "Update Data";
        $data['meta'] = "Update data berita";
        $data['content'] = 'admin_views/input_berita';
        //$data['sidebar']='sidebar';
        $this->db->where('md5(id_berita)', $id_berita);
        $data['berita'] = $this->db->get('tb_berita')->row_array();
        //print_r($data['pegawai']);exit();
        $this->load->view('template', $data);
    }
    function delete_berita($id_berita)
    {
        $where = array('md5(id_berita)' => $id_berita);
        $this->admin_model->delete_berita($where, 'tb_berita');
        redirect('admin/daftar_berita');
    }
}
