<div class="content">
    <div class="table-responsive tile">
        <h1 class="alert alert-dismissible alert-info">
            <p align="center">Data Kartu Keluarga Desa Tejakula</p>
        </h1>
        <table class=" table table-dordered table-striped table-hover">
            <thead>
                <tr class="bg-teal-700">
                    <th>
                        <center>No</center>
                    </th>
                    <th>
                        <center>Nomor KK</center>
                    </th>
                    <th>
                        <center>NIK</center>
                    </th>
                    <th>
                        <center>Kepala Keluarga</center>
                    </th>
                    <th>
                        <center>Jumlah Anggota Keluarga</center>
                    </th>
                    <th>
                        <center>Jumlah Anjing</center>
                    </th>
                    <th>
                        <center>Jumlah Kucing</center>
                    </th>
                    <th>
                        <center>Aksi</center>
                    </th>
                </tr>
            </thead>
            <?php $i = 1;
            foreach ($kk as $val) { ?>
                <tr>
                    <td>
                        <center><?php echo $i++; ?> </center>
                    </td>
                    <td>
                        <center><?= $val['nomor_kk']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['nik_kk']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['nama']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['jum_anggota']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['anjing']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['kucing']; ?></center>
                    </td>
                    <td>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <a class="btn btn-outline-primary col-lg-6" href="<?= site_url('admin/update_kk/' . md5($val['id_kk'])) ?>">update</a>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-outline-danger col-lg-6" href="<?= site_url('admin/delete_kk/' . md5($val['id_kk'])) ?>"> delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>

            <div class="row">
                <div class="col-md-3">
                    <form action="<?= base_url('admin/data_kk'); ?>" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search" name="keyword" autocomplete="off" autofocus>
                            <div class="input-group-append">
                                <input class="btn btn-primary" type="submit" name="simpan">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </table>
        <?php echo $this->pagination->create_links(); ?>
        <a href="<?= site_url('admin/input_kk') ?>" class="btn btn-lg btn btn-primary right-block">Tambah kk</a>
    </div>