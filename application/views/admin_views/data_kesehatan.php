<div class="content">
    <div class="table-responsive tile">
        <h1 class="alert alert-dismissible alert-info">
            <p align="center">Data Kesehatan Penduduk Desa Tejakula</p>
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
                        <center>NIK</center>
                    </th>
                    <th>
                        <center>Nama Penduduk</center>
                    </th>
                    <th>
                        <center>Jenis Kelamin</center>
                    </th>
                    <th>
                        <center>Golongan Darah</center>
                    </th>
                    <th>
                        <center>Umur</center>
                    </th>
                    <th>
                        <center>Tinggi Badan</center>
                    </th>
                    <th>
                        <center>Berat badan</center>
                    </th>
                    <th>
                        <center>Tensi</center>
                    </th>
                    <th>
                        <center>Kadar Gula</center>
                    </th>
                    <th>
                        <center>alergi</center>
                    </th>
                    <th>
                        <center>Rabun</center>
                    </th>
                    <th>
                        <center>Aksi</center>
                    </th>

                </tr>
            </thead>
            <?php $i = 1;
            foreach ($kesehatan as $val) { ?>
                <tr>
                    <td>
                        <center><?php echo $i++; ?> </center>
                    </td>
                    <td>
                        <center><?= $val['nomor_kk']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['nik']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['nama_penduduk']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['jk']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['gol_darah']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['umur']; ?> th </center>
                    </td>
                    <td>
                        <center><?= $val['tinggi_badan']; ?> cm </center>
                    </td>
                    <td>
                        <center><?= $val['berat_badan']; ?> kg </center>
                    </td>
                    <td>
                        <center><?= $val['tensi']; ?> mmHg</center>
                    </td>
                    <td>
                        <center><?= $val['kadar_gula']; ?> mg/dL </center>
                    </td>
                    <td>
                        <center><?= $val['alergi']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['rabun']; ?></center>
                    </td>
                    <td>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <a class="btn btn-outline-primary col-lg-8" href="<?= site_url('admin/update_kesehatan/' . md5($val['id_kesehatan'])) ?>"><i class="icon-pencil3"></i>update</a>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-outline-danger col-lg-8" href="<?= site_url('admin/delete_kesehatan/' . md5($val['id_kesehatan'])) ?>"><i class="icon-trash-alt"></i>delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <?php echo $this->pagination->create_links(); ?>
        <a href="<?= site_url('admin/input_kesehatan') ?>" class="btn btn-lg btn btn-primary right-block">Tambah Data Kesehatan</a>
    </div>
</div>