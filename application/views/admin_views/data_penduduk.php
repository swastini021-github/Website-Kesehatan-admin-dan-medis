<div class="content">
    <div class="table-responsive tile">
        <h1 class="alert alert-dismissible alert-info">
            <p align="center">Data Penduduk Desa Tejakula</p>
        </h1>
        <table class=" table table-dordered table-striped table-hover">
            <thead>
                <tr class="bg-teal-700">
                    <th>
                        <center>No</center>
                    </th>
                    <th>
                        <center>Nomor kk</center>
                    </th>
                    <th>
                        <center>Status KK</center>
                    </th>
                    <th>
                        <center>NIK</center>
                    </th>
                    <th>
                        <center>Nama Penduduk</center>
                    </th>
                    <th>
                        <center>Agama</center>
                    </th>
                    <th>
                        <center>Jenis Kelamin</center>
                    </th>
                    <th>
                        <center>Tanggal Lahir</center>
                    </th>
                    <th>
                        <center>Alamat</center>
                    </th>
                    <th>
                        <center>Pekerjaan</center>
                    </th>
                    <th>
                        <center>No.HP.</center>
                    </th>
                    <th>
                        <center>Kepala Keluarga</center>
                    </th>
                    <th>
                        <center>Aksi</center>
                    </th>
                </tr>
            </thead>
            <?php $i = 1;
            foreach ($penduduk as $val) { ?>
                <tr>
                    <td>
                        <center><?php echo $i++; ?> </center>
                    </td>
                    <td>
                        <center><?= $val['nomor_kk']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['status_kk']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['nik']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['nama_penduduk']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['agama']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['jk']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['tgl_lahir']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['alamat']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['pekerjaan']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['no_hp']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['nama']; ?></center>
                    </td>
                    <td>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <a class="btn btn-outline-primary col-lg-8" href="<?= site_url('admin/update_penduduk/' . md5($val['id_penduduk'])) ?>">update</a>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-outline-danger col-lg-8" href="<?= site_url('admin/delete_penduduk/' . md5($val['id_penduduk'])) ?>"> delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <?php echo $this->pagination->create_links(); ?>
        <a href="<?= site_url('admin/input_penduduk') ?>" class="btn btn-lg btn btn-primary right-block">Tambah penduduk</a>
    </div>
</div>