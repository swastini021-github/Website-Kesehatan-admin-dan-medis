<?php
class back_model extends CI_Model{
    function get_tb_pegawai(){
        $data=$this->db->get('tb_pegawai')->result_array();
        return $data;
    }
    function get_tb_golongan(){
        $data=$this->db->get('tb_golongan')->result_array();
        return $data;
    }
    function get_tb_agama(){
        $data=$this->db->get('tb_agama')->result_array();
        return $data;
    }
    function get_tb_jabatan(){
        $data=$this->db->get('tb_jabatan')->result_array();
        return $data;
    }
    function get_tb_kategoriuser(){
        $data=$this->db->get('tb_kategoriuser')->result_array();
        return $data;
    }
    function get_tb_registrasi(){
        $data=$this->db->get('tb_registrasi')->result_array();
        return $data;
    }
    function get_num_rows(){
        $this->db->join('tb_agama','tb_agama.id_agama=tb_pegawai.id_agama');
        $this->db->join('tb_jabatan','tb_jabatan.id_jabatan=tb_pegawai.id_jabatan');
        $this->db->join('tb_golongan','tb_golongan.id_golongan=tb_pegawai.id_golongan');
        $data=$this->db->get('tb_pegawai')->num_rows();
        return $data; 
    }
    /*function get_pegawai($limit,$page){
        //mengurutkan data dari data terbaru
        $this->db->order_by('id_pembelian','desc');
        $this->db->limit($limit, $page);
        $this->db->join('tb_produsen','tb_produsen.id_produsen=tb_pembelian.id_produsen');
        $this->db->join('tb_barang','tb_barang.id_barang=tb_pembelian.id_barang');
        $data=$this->db->get('tb_pembelian')->result_array();
        return $data; 
    }*/
    function get_pegawai($limit,$page){
        //mengurutkan data dari data terbaru
        $this->db->order_by('id_pegawai','desc');
        $this->db->limit($limit, $page);
        $this->db->join('tb_agama','tb_agama.id_agama=tb_pegawai.id_agama');
        $this->db->join('tb_jabatan','tb_jabatan.id_jabatan=tb_pegawai.id_jabatan');
        $this->db->join('tb_golongan','tb_golongan.id_golongan=tb_pegawai.id_golongan');
        $this->db->join('tb_kategoriuser','tb_kategoriuser.id_kategoriuser=tb_pegawai.id_kategoriuser');
        $data=$this->db->get('tb_pegawai')->result_array();
        return $data; 
    }
    function save_pegawai($post){
        $konfigurasi= array(
            'allowed_types'=>'jpg|jpeg|gif|png|bmp',
            'upload_path' => realpath('./media/images'),
            'max_zise'
        );
        $this->load->library('upload',$konfigurasi);
        $this->upload->do_upload();
        //menampung post yang dikirim oleh controller untuk disimpan dalam array sesuai field dalam tabel
        $data=array(
        //'sesuai field tabel'=>'sesuai name input dalam form'
        //'id_berita'=>$post['id_berita'],
        'nip'=>$post['nip'],
       'nama_pegawai'=>$post['nama'],
        'jenis_kelamin'=>$post['jk'],
        'id_agama'=>$post['agama'],
        'id_golongan'=>$post['golongan'],
        'id_jabatan'=>$post['jabatan'],
        'email'=>$post['email'],
        'no_rekening'=>$post['no_rekening'],
        'id_kategoriuser'=>$post['kategoriuser'],
        'username'=>$post['username'],
        'password'=>md5($post['password']),
        'foto' => $_FILES['userfile']['name']
        );
        //menyimpan data ke tabel
        $this->db->insert('tb_pegawai',$data);
    } 
    function save_update_pegawai($post){
        /*$konfigurasi= array(
            'allowed_types'=>'jpg|jpeg|gif|png|bmp',
            'upload_path' => realpath('./media/images'),
            'max_zise'
        );
        $this->load->library('upload',$konfigurasi);
        $this->upload->do_upload();*/
        //menampung post yang dikirim oleh controller untuk disimpan dalam array sesuai field dalam tabel
        $data=array(
        //'sesuai field tabel'=>'sesuai name input dalam form'
        //'id_berita'=>$post['id_berita'],
        'nip'=>$post['nip'],
       'nama_pegawai'=>$post['nama'],
        'jenis_kelamin'=>$post['jk'],
        'id_agama'=>$post['agama'],
        'id_golongan'=>$post['golongan'],
        'id_jabatan'=>$post['jabatan'],
        'email'=>$post['email'],
        'no_rekening'=>$post['no_rekening'],
        'id_kategoriuser'=>$post['kategoriuser'],
        'username'=>$post['username'],
        'password'=>md5($post['password']),
        //'foto' => $_FILES['userfile']['name']
        );
        //menyimpan data ke tabel
        $this->db->where('md5(id_pegawai)',$post['id_pegawai']);
        $this->db->update('tb_pegawai',$data);
    } 
    function delete_pegawai($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    function get_user($limit,$page){
        //mengurutkan data dari data terbaru
        $this->db->order_by('id','desc');
        $this->db->limit($limit, $page);
        $this->db->join('tb_kategoriuser','tb_kategoriuser.id_kategoriuser=tb_registrasi.id_kategoriuser');
        $data=$this->db->get('tb_registrasi')->result_array();
        return $data; 
    }

    function save_user($post){
        //menampung post yang dikirim oleh controller untuk disimpan dalam array sesuai field dalam tabel
        $data=array(
        //'sesuai field tabel'=>'sesuai name input dalam form'
        //'id_berita'=>$post['id_berita'],
        'nama'=>$post['nama'],
       'jk'=>$post['jk'],
        'id_kategoriuser'=>$post['kategoriuser'],
        'username'=>$post['username'],
        'password'=>$post['password'],
        );
        //menyimpan data ke tabel
        $this->db->insert('tb_registrasi',$data);
    }

    function get_jabatan($limit,$page){
        //mengurutkan data dari data terbaru
        $this->db->order_by('id_jabatan','desc');
        $this->db->limit($limit, $page);
        $data=$this->db->get('tb_jabatan')->result_array();
        return $data; 
    }

    function save_jabatan($post){
        //menampung post yang dikirim oleh controller untuk disimpan dalam array sesuai field dalam tabel
        $data=array(
        //'sesuai field tabel'=>'sesuai name input dalam form'
        //'id_berita'=>$post['id_berita'],
        'nama_jabatan'=>$post['nama'],
       'tunjangan_fungtional'=>$post['tunjangan_fungtional'],
        );
        //menyimpan data ke tabel
        $this->db->insert('tb_jabatan',$data);
    }

    function get_golongan($limit,$page){
        //mengurutkan data dari data terbaru
        $this->db->order_by('id_golongan','desc');
        $this->db->limit($limit, $page);
        $data=$this->db->get('tb_golongan')->result_array();
        return $data; 
    }

    function save_golongan($post){
        //menampung post yang dikirim oleh controller untuk disimpan dalam array sesuai field dalam tabel
        $data=array(
        //'sesuai field tabel'=>'sesuai name input dalam form'
        //'id_berita'=>$post['id_berita'],
        'nama_golongan'=>$post['nama'],
       'gaji_pokok'=>$post['gaji_pokok'],
        );
        //menyimpan data ke tabel
        $this->db->insert('tb_golongan',$data);
    }
    
}?>