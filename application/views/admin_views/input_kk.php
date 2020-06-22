<div class="content">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6 tile">
            <h1>
                <p align="center">INPUT KARTU KELUARGA</p>
            </h1>
            <hr />
            <div class="panel panel-flat">
                <form action="<?= site_url('admin/save_kk'); ?>" method="POST">
                    <div class="panel-body">
                        <input type="hidden" name="id_kk" value="<?= (isset($kk['id_kk'])) ? md5($kk['id_kk']) : ''; ?>">
                        <div class="form-group">
                            <label for="nomor_kk">Nomor KK :</label>
                            <input type="text" name="nomor_kk" value="<?= (isset($kk['nomor_kk'])) ? $kk['nomor_kk'] : set_value('nomor_kk'); ?>" class="form-control" placeholder="Nomor Kartu Keluarga">
                            <small class=" text-danger"><?= form_error('nomor_kk'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nik">Nik :</label>
                            <input type="text" value="<?= (isset($kk['nik'])) ? $kk['nik'] : set_value('nik'); ?>" name="nik" class="form-control" placeholder="NIK Kepala Keluarga">
                            <small class="text-danger"><?= form_error('nik'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama :</label>
                            <input type="text" name="nama" value="<?= (isset($kk['nama'])) ? $kk['nama'] : set_value('nama'); ?>" class="form-control" placeholder="Nama Lengkap">
                            <small class="text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jum_anggota">Jumlah Anggota Keluarga :</label>
                            <input type="number" name="jum_anggota" value="<?= (isset($kk['jum_anggota'])) ? $kk['jum_anggota'] : set_value('jum_anggota'); ?>" class="form-control" placeholder="jumlah anggota">
                            <small class="text-danger"><?= form_error('jum_anggota'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="anjing">Anjing :</label>
                            <input type="number" name="anjing" value="<?= (isset($kk['anjing'])) ? $kk['anjing'] : set_value('anjing'); ?>" class="form-control" placeholder="Jumlah Anjing">
                            <small class="text-danger"><?= form_error('anjing'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kucing">Kucing :</label>
                            <input type="number" name="kucing" value="<?= (isset($kk['kucing'])) ? $kk['kucing'] : set_value('kucing'); ?>" class="form-control" placeholder="Jumlah Kucing">
                            <small class="text-danger"><?= form_error('kucing'); ?></small>
                        </div>
                        <div class="text-right">
                            <input class="btn btn-primary" type="submit" class="save" name="Simpan" value="Simpan" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</div>