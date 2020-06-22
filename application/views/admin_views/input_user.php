<div class="content">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6 tile">
            <h1>
                <p align="center">BUAT AKUN USER</p>
            </h1>
            <hr />
            <div class="panel panel-flat">
                <form action="<?= site_url('admin/save_user'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="panel-body">
                        <input type="hidden" name="id" value="<?= (isset($user['id'])) ? md5($user['id']) : ''; ?>">
                        <div class="form-group">
                            <label for="nama_user">Nama User :</label>
                            <input type="text" name="nama_user" value="<?= (isset($user['nama_user'])) ? $user['nama_user'] : set_value('nama_user'); ?>" class="form-control">
                            <small class="text-danger"><?= form_error('nama_user'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin :</label>
                            <select name="jk" class="form-control">
                                <option type="radio" <?= (isset($user['jenis_kelamin']) && $user['jenis_kelamin'] == 'L') ? 'selected' : ''; ?> value="L">Laki-laki
                                </option>
                                <option type="radio" <?= (isset($user['jenis_kelamin']) && $user['jenis_kelamin'] == 'P') ? 'selected' : ''; ?> value="P">Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Email :</label>
                            <input type="email" value="<?= (isset($user['email'])) ? $user['email'] : set_value('email'); ?>" name="email" class="form-control" placeholder="Email.....">
                            <small class="text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kategoriuser">Kategori User :</label>
                            <select class="form-control" name="kategoriuser">
                                <?php
                                //menampilkan data kategori user dalam list
                                foreach ($kategoriuser as $val) { ?>
                                    <option <?= (isset($user['id_kategoriuser']) && $user['id_kategoriuser'] == $val['id_kategoriuser']) ? 'selected' : ''; ?> value="<?= $val['id_kategoriuser']; ?>"><?= $val['nama_kategoriuser']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Username :</label>
                            <input type="username" name="username" value="<?= (isset($user['username'])) ? $user['username'] : set_value('username'); ?>" class="form-control" placeholder="Username.....">
                            <small class="text-danger"><?= form_error('username'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password :</label>
                            <input type="password" name="password" value="<?= (isset($user['password'])) ? $user['password'] : set_value('password'); ?>" class="form-control" placeholder="Password.....">
                            <small class="text-danger"><?= form_error('password'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto :</label>
                            <input type="file" name="userfile" class="form-control">
                        </div>
                        <div class="text-right">
                            <input type="submit" class="save btn btn-primary" name="Simpan" value="Simpan" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</div>