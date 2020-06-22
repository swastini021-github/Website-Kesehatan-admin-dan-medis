<?php
class model_tugas extends CI_Model{
    function get_tb_bid($limit,$page){
        $this->db->limit($limit,$page);
        $data=$this->db->get('tb_bid')->result();
        return $data;
    }
    function get_tb_dosen($limit,$page){
        $this->db->limit($limit,$page);
        $data=$this->db->get('tb_dosen')->result();
        return $data;
    }
    function get_tb_inti($limit,$page){
        $this->db->limit($limit,$page);
        $data=$this->db->get('tb_inti')->result();
        return $data;
    }
    function get_tb_prodi(){
        $data=$this->db->get('tb_prodi')->result();
        return $data;
    }
    function get_agama(){
        $data=$this->db->get('tb_agama')->result_array();
        return $data;
    }
    function get_numj_rows($table){
        $data=$this->db->get($table)->num_rows();
        return $data;
    }
    function duatable(){
        $this->db->select('*');
        $this->db->from('tb_inti');
        $this->db->join('tb_prodi','tb_prodi.kode_prodi=tb_inti.kode_prodi');
        $this->db->join('tb_agama','tb_agama.id_agama=tb_inti.id_agama');
        $query = $this->db->get();
        return $query->result();
    }
    function get_user($limit,$page){
        //mengurutkan data dari data terbaru
        $this->db->order_by('id','desc');
        $this->db->limit($limit, $page);
        $this->db->join('tb_agama','tb_agama.id_agama=tb_registrasi.id_agama');
        $data=$this->db->get('tb_registrasi')->result_array();
        return $data; 
    }
       
    function get_num_rows(){
        $this->db->join('tb_agama','tb_agama.id_agama=tb_registrasi.id_agama');
        $data=$this->db->get('tb_registrasi')->num_rows();
        return $data; 
    }
    
    function save_register($post){
        //menampung post yang dikirim oleh controller untuk disimpan dalam array sesuai field dalam tabel
        $data=array(
        //'sesuai field tabel'=>'sesuai name input dalam form'
        'nama'=>$post['nama'],
       'jk'=>$post['jk'],
        'id_agama'=>$post['agama'],
        'biografi'=>$post['biografi'],
        'username'=>$post['username'],
        'email'=>$post['email'],
        //simpan password dalam md5
        'password'=>md5($post['password'])
        );
        //menyimpan data ke tabel
        $this->db->insert('tb_registrasi',$data);
    }
//Tugas UTS Pemrograman Web
    function get_tb_berita(){
        $data=$this->db->get('tb_berita')->result_array();
        return $data;
    }
    function get_tb_kategoriberita(){
        $data=$this->db->get('tb_kategoriberita')->result_array();
        return $data;
    }
    function get_berita($limit,$page){
        //mengurutkan data dari data terbaru
        $this->db->order_by('id_berita','desc');
        $this->db->limit($limit, $page);
        $this->db->join('tb_kategoriberita','tb_kategoriberita.id_kategoriberita=tb_berita.id_kategoriberita');
        $data=$this->db->get('tb_berita')->result_array();
        return $data; 
    }
       
    function save_berita($post){
        //menampung post yang dikirim oleh controller untuk disimpan dalam array sesuai field dalam tabel
        $data=array(
        //'sesuai field tabel'=>'sesuai name input dalam form'
        //'id_berita'=>$post['id_berita'],
       'id_kategoriberita'=>$post['nama_kategori'],
        'judul'=>$post['judul'],
        'penulis'=>$post['penulis'],
        'waktu_buat'=>$post['waktu_buat'],
        );
        //menyimpan data ke tabel
        $this->db->insert('tb_berita',$data);
    }  
}
?>