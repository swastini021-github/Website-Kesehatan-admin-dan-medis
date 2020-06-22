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
                        <center>Nama User</center>
                    </th>
                    <th>
                        <center>Jenis Kelamin</center>
                    </th>
                    <th>
                        <center>Email</center>
                    </th>
                    <th>
                        <center>Kategori User</center>
                    </th>
                    <th>
                        <center>Username</center>
                    </th>
                    <th>
                        <center>Password</center>
                    </th>
                    <th>
                        <center>Foto</center>
                    </th>
                    <th>
                        <center>Aksi</center>
                    </th>

                </tr>
            </thead>
            <?php $no = 1;
            foreach ($user as $val) { ?>
                <tr>
                    <td>
                        <center><?php echo $no++; ?></center>
                    </td>
                    <td>
                        <center><?= $val['nama_user']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['jenis_kelamin']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['email']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['nama_kategoriuser']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['username']; ?></center>
                    </td>
                    <td>
                        <center><?= $val['password']; ?></center>
                    </td>
                    <td><img width='100' src="<?= base_url('media/images/' . $val['foto']); ?>"></td>
                    <td>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <a class="btn btn-outline-primary col-lg-6" href="<?= site_url('admin/update_user/' . md5($val['id'])) ?>"><i class="icon-pencil3"></i>update</a>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-outline-danger col-lg-6" href="<?= site_url('admin/delete_user/' . md5($val['id'])) ?>"><i class="icon-trash-alt"></i>delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <?php echo $this->pagination->create_links(); ?>
        <a href="<?= site_url('admin/input_user') ?>" class="btn btn-lg btn btn-primary right-block">Tambah User</a>
    </div>
</div>