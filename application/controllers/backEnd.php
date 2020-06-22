<?php
defined('BASEPATH')OR exit ('No direct script acess allowed');
class backEnd extends CI_Controller{
    function __construct(){
        parent :: __construct();  $this->load->model('back_model');
        //$this->load->model('model_tugas','',TRUE);
        $this->load->helper(array('form','url'));
    }
    
    function index(){
        $data['title']="Latihan HTML";
        $data['meta']="ini adalah produk untuk Latihan HTML";
        $data['content']='home';
        //$data['sidebar']='sidebar';
        $this->load->view('template',$data);
    }
    function input_profile(){
        $data['title']="Register";
        $data['meta']="Registrasi Pegawai Baru";
        $data['content']='inputprofile_pegawai';
        //$data['sidebar']='sidebar';
        //mengambil data agaa untuk dipilihan agama
        $data['kategoriuser']=$this->back_model->get_tb_kategoriuser();
        $data['agama']=$this->back_model->get_tb_agama();
        $data['golongan']=$this->back_model->get_tb_golongan();
        $data['jabatan']=$this->back_model->get_tb_jabatan();
        $this->load->view('back_template',$data);
    }
    function data_pegawai($page=0){
        $data['title']="daftar Pegawai";
        $data['meta']="daftar Pegawai"; 
        $config['total_rows']=$this->back_model->get_num_rows();
        $config['per_page']=1;
        $config['base_url']=site_url('backEnd/data_pegawai');
         // Membuat Style pagination untuk BootStrap v4
         $config['first_link']       = 'First';
         $config['last_link']        = 'Last';
         $config['next_link']        = 'Next';
         $config['prev_link']        = 'Prev';
         $config['full_tag_open']    = '<div class="pagging text-left"><nav><ul class="pagination justify-content-center">';
         $config['full_tag_close']   = '</ul></nav></div>';
         $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
         $config['num_tag_close']    = '</span></li>';
         $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
         $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
         $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
         $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['prev_tagl_close']  = '</span>Next</li>';
         $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
         $config['first_tagl_close'] = '</span></li>';
         $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['last_tagl_close']  = '</span></li>';
        $data['pegawai']=$this->back_model->get_pegawai($config['per_page'],$page); 
        $this->pagination->initialize($config);
        $data['content']='data_pegawai';
        $this->load->view('back_template',$data);
    }
    function save_pegawai(){
        //mengirim post ke model
        $this->form_validation->set_rules('nip','NIP','required',array('required'=>'NIP harus diisi'));
        $this->form_validation->set_rules('nama','Nama','required',array('required'=>'Nama harus diisi'));
        $this->form_validation->set_rules('no_rekening','No_rekening','required',array('required'=>'Rekening harus diisi'));
        $this->form_validation->set_rules('email','Email','required|valid_email',array('required'=>'Email harus diisi'));
        $this->form_validation->set_rules('username','Username','required',array('required'=>'Username harus diisi'));
        $this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[20]',array('required'=>'Password harus diisi'));
        if($this->form_validation->run()==FALSE){
            $this->input_profile();
        }else{
            if($_POST['id_pegawai']!=''){
                //exit();
                $this->back_model->save_update_pegawai($_POST);
            }else{
                $this->back_model->save_pegawai($_POST);
            }
            //akses fungsi untuk menampilkan halaman daftar peserta
            redirect('backEnd/data_pegawai');
        }
    }
    function update_pegawai($id_pegawai){
        $data['title']="Update Data";
        $data['meta']="Registrasi Pegawai Baru";
        $data['content']='inputprofile_pegawai';
        //$data['sidebar']='sidebar';
        $this->db->where('md5(id_pegawai)',$id_pegawai);
        $data['pegawai']=$this->db->get('tb_pegawai')->row_array();
        //print_r($data['pegawai']);exit();
        //mengambil data agaa untuk dipilihan agama
        $data['agama']=$this->back_model->get_tb_agama();
        $data['golongan']=$this->back_model->get_tb_golongan();
        $data['jabatan']=$this->back_model->get_tb_jabatan();
        $this->load->view('back_template',$data);
    }
    function delete_pegawai($id_pegawai){
        $where = array('md5(id_pegawai)'=>$id_pegawai);
        $this->back_model->delete_pegawai($where, 'tb_pegawai');
        redirect('backEnd/data_pegawai');
    }
    function buat_akun(){
        $data['title']="Register";
        $data['meta']="Buat Akun Pegawai";
        $data['content']='buat_akun';
        $data['content1']='daftar_user';
        //$data['sidebar']='sidebar';
        //mengambil data agaa untuk dipilihan agama
        $data['kategoriuser']=$this->back_model->get_tb_kategoriuser();
        $this->load->view('back_template',$data);
    }
    function save_user(){
        //mengirim post ke model
        $this->back_model->save_user($_POST);
        //akses fungsi untuk menampilkan halaman daftar user
        redirect('backEnd/daftar_user');
    }
    function daftar_user($page=0){
        $data['title']="daftar user";
        $data['meta']="daftar user"; 
        $config['total_rows']=$this->back_model->get_num_rows();
        $config['per_page']=10;
        $config['base_url']=site_url('back_model/daftar_user');
        $data['users']=$this->back_model->get_user($config['per_page'],$page); 
        $this->pagination->initialize($config);
        $data['content']='daftar_user';
        $this->load->view('back_template',$data);
    }
    function input_jabatan($page=0){
        $data['title']="Register";
        $data['meta']="Buat Akun Pegawai";
        $data['content']='input_jabatan';
        //daftar jabatan yang ada di undiksha
        $config['total_rows']=$this->back_model->get_num_rows();
        $config['per_page']=10;
        $config['base_url']=site_url('back_model/input_jabatan');
        $data['jabatan']=$this->back_model->get_jabatan($config['per_page'],$page); 
        $this->pagination->initialize($config);
        $this->load->view('back_template',$data);
    }
    function save_jabatan(){
        //mengirim post ke model
        $this->back_model->save_jabatan($_POST);
        //akses fungsi untuk menampilkan halaman daftar user
        redirect('backEnd/input_jabatan');
        
    }
    function input_golongan($page=0){
        $data['title']="Input Golongan";
        $data['meta']="Input Golongan";
        $data['content']='input_golongan';
        //daftar golongan pegawai undiksha
        $config['total_rows']=$this->back_model->get_num_rows();
        $config['per_page']=1;
        $config['base_url']=site_url('backEnd/input_golongan');
        $data['golongan']=$this->back_model->get_golongan($config['per_page'],$page); 
        $this->pagination->initialize($config);
        $this->load->view('back_template',$data);
    }
    function save_golongan(){
        //mengirim post ke model
        $this->form_validation->set_rules('nama','Nama','required',array('required'=>'Golongan harus diisi'));
        $this->form_validation->set_rules('gaji_pokok','Gaji_pokok','required|number',array('required'=>'Gaji pokok harus diisi'));
        if($this->form_validation->run()==FALSE){
            $this->input_golongan();
        }else{
            $this->back_model->save_golongan($_POST);
            //akses fungsi untuk menampilkan halaman daftar user
            redirect('backEnd/input_golongan');
        }
        
    }
}?>