<?php
class admin_model extends CI_Model
{
    function get_tb_agama()
    {
        $data = $this->db->get('tb_agama')->result_array();
        return $data;
    }
    function get_tb_kk()
    {
        $data = $this->db->get('tb_kk')->result_array();
        return $data;
    }
    function get_tb_penduduk()
    {
        $data = $this->db->get('tb_penduduk')->result_array();
        return $data;
    }
    function get_tb_user()
    {
        $data = $this->db->get('tb_puser')->result_array();
        return $data;
    }
    function get_tb_kategoriuser()
    {
        $data = $this->db->get('tb_kategoriuser')->result_array();
        return $data;
    }
    function get_tb_kesehatan()
    {
        $data = $this->db->get('tb_kesehatan')->result_array();
        return $data;
    }
    function get_num_rows($table)
    {
        $data = $this->db->get($table)->num_rows();
        return $data;
    }
    function get_numj_rows()
    {
        $this->db->join('tb_kategoriuser', 'tb_kategoriuser.id_kategoriuser=tb_user.id_kategoriuser');
        $data = $this->db->get('tb_user')->num_rows();
        return $data;
    }

    //awal fungsi user
    function get_user($limit, $page)
    {
        //mengurutkan data dari data terbaru
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $page);
        $this->db->join('tb_kategoriuser', 'tb_kategoriuser.id_kategoriuser=tb_user.id_kategoriuser');
        $data = $this->db->get('tb_user')->result_array();
        return $data;
    }
    function save_user($post)
    {
        $konfigurasi = array(
            'allowed_types' => 'jpg|jpeg|gif|png|bmp',
            'upload_path' => realpath('./media/images'),
            'max_zise'
        );
        $this->load->library('upload', $konfigurasi);
        $this->upload->do_upload();
        //menampung post yang dikirim oleh controller untuk disimpan dalam array sesuai field dalam tabel
        $data = array(
            //'sesuai field tabel'=>'sesuai name input dalam form'
            //'id_berita'=>$post['id_berita'],
            'nama_user' => $post['nama_user'],
            'jenis_kelamin' => $post['jk'],
            'email' => $post['email'],
            'id_kategoriuser' => $post['kategoriuser'],
            'username' => $post['username'],
            'password' => md5($post['password']),
            'foto' => $_FILES['userfile']['name']
        );
        //menyimpan data ke tabel
        $this->db->insert('tb_user', $data);
    }
    function save_update_user($post)
    {
        /*$konfigurasi= array(
            'allowed_types'=>'jpg|jpeg|gif|png|bmp',
            'upload_path' => realpath('./media/images'),
            'max_zise'
        );
        $this->load->library('upload',$konfigurasi);
        $this->upload->do_upload();*/
        //menampung post yang dikirim oleh controller untuk disimpan dalam array sesuai field dalam tabel
        $data = array(
            //'sesuai field tabel'=>'sesuai name input dalam form'
            //'id_berita'=>$post['id_berita'],
            'nama_user' => $post['nama_user'],
            'jenis_kelamin' => $post['jk'],
            'email' => $post['email'],
            'id_kategoriuser' => $post['kategoriuser'],
            'username' => $post['username'],
            'password' => md5($post['password']),
            //'foto' => $_FILES['userfile']['name']
        );
        //menyimpan data ke tabel
        $this->db->where('md5(id)', $post['id']);
        $this->db->update('tb_user', $data);
    }
    function delete_user($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    //Akhir Fungsi User

    //Awal Fungsi KK
    function get_kk($limit, $page)
    {
        //mengurutkan data dari data terbaru
        $this->db->order_by('id_kk', 'desc');
        $this->db->limit($limit, $page);
        $data = $this->db->get('tb_kk')->result_array();
        return $data;
    }
    function save_kk($post)
    {
        //menampung post yang dikirim oleh controller untuk disimpan dalam array sesuai field dalam tabel
        $data = array(
            //'sesuai field tabel'=>'sesuai name input dalam form'
            //'id_berita'=>$post['id_berita'],
            'nomor_kk' => $post['nomor_kk'],
            'nik_kk' => $post['nik'],
            'nama' => $post['nama'],
            'jum_anggota' => $post['jum_anggota'],
            'anjing' => $post['anjing'],
            'kucing' => $post['kucing']
        );
        //menyimpan data ke tabel
        $this->db->insert('tb_kk', $data);
    }
    function save_update_kk($post)
    {
        //menampung post yang dikirim oleh controller untuk disimpan dalam array sesuai field dalam tabel
        $data = array(
            //'sesuai field tabel'=>'sesuai name input dalam form'
            //'id_berita'=>$post['id_berita'],
            'nomor_kk' => $post['nomor_kk'],
            'nik' => $post['nik'],
            'nama' => $post['nama'],
            'jum_anggota' => $post['jum_anggota'],
            'anjing' => $post['anjing'],
            'kucing' => $post['kucing']
        );
        //menyimpan data ke tabel
        $this->db->where('md5(id_kk)', $post['id_kk']);
        $this->db->update('tb_kk', $data);
    }
    function delete_kk($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    //Akhir Fungsi KK

    //Awal Fungsi Penduduk
    function get_penduduk($limit, $page)
    {
        //mengurutkan data dari data terbaru
        $this->db->order_by('id_penduduk', 'desc');
        $this->db->limit($limit, $page);
        $this->db->join('tb_agama', 'tb_agama.id_agama=tb_penduduk.id_agama');
        $this->db->join('tb_kk', 'tb_kk.id_kk=tb_penduduk.id_kk');
        $data = $this->db->get('tb_penduduk')->result_array();
        return $data;
    }
    function save_penduduk($post)
    {
        $data = array(
            //'sesuai field tabel'=>'sesuai name input dalam form'
            'nik' => $post['nik'],
            'id_agama' => $post['agama'],
            'jk' => $post['jk'],
            'nama_penduduk' => $post['nama'],
            'id_kk' => $post['kepala_keluarga'],
            'tgl_lahir' => $post['tgl_lahir'],
            'tempat_lahir' => $post['tempat_lahir'],
            'status_kk' => $post['status_kk'],
            'alamat' => $post['alamat'],
            'pekerjaan' => $post['pekerjaan'],
            'no_hp' => $post['no_hp'],
        );
        //menyimpan data ke tabel
        $this->db->insert('tb_penduduk', $data);
    }
    function save_update_penduduk($post)
    {
        $data = array(
            //'sesuai field tabel'=>'sesuai name input dalam form'
            'nik' => $post['nik'],
            'nama_penduduk' => $post['nama_penduduk'],
            'id_kk' => $post['kepala_keluarga'],
            'id_kk' => $post['kepala_keluarga'],
            'tgl_lahir' => $post['tgl_lahir'],
            'tempat_lahir' => $post['tempat_lahir'],
            'status_kk' => $post['status_kk'],
            'alamat' => $post['alamat'],
            'pekerjaan' => $post['pekerjaan'],
            'no_hp' => $post['no_hp'],
        );
        //menyimpan data ke tabel
        $this->db->where('md5(id_penduduk)', $post['id_penduduk']);
        $this->db->update('tb_penduduk', $data);
    }
    function delete_penduduk($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    //Akhir Fungsi Penduduk

    //Awal Fungsi Kesehatan
    function get_kesehatan($limit, $page)
    {
        //mengurutkan data dari data terbaru
        $this->db->order_by('id_kesehatan', 'desc');
        $this->db->limit($limit, $page);
        $this->db->join('tb_penduduk', 'tb_penduduk.id_penduduk=tb_kesehatan.id_penduduk');
        $this->db->join('tb_kk', 'tb_kk.id_kk=tb_kesehatan.id_kk');
        $data = $this->db->get('tb_kesehatan')->result_array();
        return $data;
    }

    function save_kesehatan($post)
    {
        //menampung post yang dikirim oleh controller untuk disimpan dalam array sesuai field dalam tabel
        $data = array(
            //'sesuai field tabel'=>'sesuai name input dalam form'
            //'id_berita'=>$post['id_berita'],
            'id_kk' => $post['id_kk'],
            'id_penduduk' => $post['penduduk'],
            'bulan' => $post['bulan'],
            'tanggal_cek' => $post['tgl_cek'],
            'umur' => $post['tahun'] - $post['tahun_lahir'],
            'tinggi_badan' => $post['tinggi_badan'],
            'berat_badan' => $post['berat_badan'],
            'tensi' => $post['tensi'],
            'kadar_gula' => $post['kadar_gula'],
            'alergi' => $post['alergi'],
            'rabun' => $post['rabun'],
        );
        //menyimpan data ke tabel
        $this->db->insert('tb_kesehatan', $data);
    }
    //Akhir Fungsi Kesehatan


    function get_tb_berita()
    {
        $data = $this->db->get('tb_berita')->result_array();
        return $data;
    }

    function get_berita($limit, $page)
    {
        //mengurutkan data dari data terbaru
        $this->db->order_by('id_berita', 'desc');
        $this->db->limit($limit, $page);
        $data = $this->db->get('tb_berita')->result_array();
        return $data;
    }
    function save_berita($post)
    {
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png|bmp',
            'upload_path' => realpath('./media1/images/'),

        );
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        //menampung post yang dikirim oleh controller untuk disimpan dalam array sesuai field dalam tabel
        $data = array(
            //'sesuai field tabel'=>'sesuai name input dalam form'
            //'id_berita'=>$post['id_berita'],
            'judul_berita' => $post['judul'],
            'isi_berita' => $post['berita'],
            'penulis' => $post['penulis'],
            'tanggal_berita' => $post['tanggal_berita'],
            'foto' => $_FILES['filefoto']['name']
        );
        //menyimpan data ke tabel
        $this->db->insert('tb_berita', $data);
    }
    function save_update_berita($post)
    {
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png|bmp',
            'upload_path' => realpath('./media1/images'),

        );
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        //menampung post yang dikirim oleh controller untuk disimpan dalam array sesuai field dalam tabel
        $data = array(
            //'sesuai field tabel'=>'sesuai name input dalam form'
            //'id_berita'=>$post['id_berita'],
            'judul_berita' => $post['judul'],
            'isi_berita' => $post['berita'],
            'penulis' => $post['penulis'],
            'tanggal_berita' => $post['tanggal_berita'],
            'foto' => $_FILES['filefoto']['name']
        );
        //menyimpan data ke tabel
        $this->db->where('md5(id_berita)', $post['id_berita']);
        $this->db->update('tb_berita', $data);
    }
    function delete_berita($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function get_berita_by_kode($kode)
    {
        $hsl = $this->db->query("SELECT * FROM tb_berita WHERE id_berita='$kode'");
        return $hsl;
    }
}
