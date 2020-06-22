<div class="content tile">
    <h1>
        <p align="center">INPUT DATA PENDUDUK</p>
    </h1>
    <hr />
    <form action="<?= site_url('medis/save_penduduk'); ?>" method="POST">
        <input type="hidden" name="id_penduduk" value="<?= (isset($penduduk['id_penduduk'])) ? md5($penduduk['id_penduduk']) : ''; ?>">
        <div class="row">
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="nik">NIK :</label>
                    <input type="text" name="nik" value="<?= (isset($penduduk['nik'])) ? $penduduk['nik'] : set_value('nik'); ?>" class="form-control">
                    <small class="text-danger"><?= form_error('nik'); ?></small>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Penduduk :</label>
                    <input type="text" name="nama" value="<?= (isset($penduduk['nama_penduduk'])) ? $penduduk['nama_penduduk'] : set_value('nama'); ?>" class="form-control" placeholder="Nama Penduduk">
                    <small class="text-danger"><?= form_error('nama'); ?></small>
                </div>
                <div class="form-group">
                    <label for="kepala_keluarga">Nomor KK :</label>
                    <select class="form-control" name="kepala_keluarga">
                        <?php
                        //menampilkan data kategori user dalam list
                        foreach ($kk as $val) { ?>
                            <option value="<?= $val['id_kk']; ?>"><?= $val['nomor_kk']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status_kk">Status KK :</label>
                    <select name="status_kk" class="form-control">
                        <option type="radio" <?= (isset($penduduk['status_kk']) && $penduduk['status_kk'] == 'Anak') ? 'selected' : ''; ?> value="Anak">Anak
                        </option>
                        <option type="radio" <?= (isset($penduduk['status_kk']) && $penduduk['status_kk'] == 'Ibu') ? 'selected' : ''; ?> value="Ibu">Ibu
                        </option>
                        <option type="radio" <?= (isset($penduduk['status_kk']) && $penduduk['status_kk'] == 'Ayah') ? 'selected' : ''; ?> value="Ayah">Ayah
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kategoriuser">Agama :</label>
                    <select class="form-control" name="agama">
                        <?php
                        //menampilkan data kategori user dalam list
                        foreach ($agama as $val) { ?>
                            <option <?= (isset($penduduk['id_agama']) && $penduduk['id_agama'] == $val['id_agama']) ? 'selected' : ''; ?> value="<?= $val['id_agama']; ?>"><?= $val['agama']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin :</label>
                    <select name="jk" class="form-control">
                        <option type="radio" <?= (isset($penduduk['jk']) && $penduduk['jk'] == 'L') ? 'selected' : ''; ?> value="L">Laki-laki
                        </option>
                        <option type="radio" <?= (isset($penduduk['jk']) && $penduduk['jk'] == 'P') ? 'selected' : ''; ?> value="P">Perempuan
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="tahun_lahir">Tahun Lahir :</label>
                    <input type="year" name="tahun_lahir" value="<?= (isset($penduduk['tahun_lahir'])) ? $penduduk['tahun_lahir'] : set_value('tahun_lahir'); ?>" class="form-control" placeholder="Tahun">
                    <small class="text-danger"><?= form_error('tahun_lahir'); ?></small>
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir :</label>
                    <input type="date" name="tgl_lahir" value="<?= (isset($penduduk['tgl_lahir'])) ? $penduduk['tgl_lahir'] : set_value('tgl_lahir'); ?>" class="form-control" placeholder="tanggal lahir">
                    <small class="text-danger"><?= form_error('tgl_lahir'); ?></small>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir :</label>
                    <input type="text" name="tempat_lahir" value="<?= (isset($penduduk['tempat_lahir'])) ? $penduduk['tempat_lahir'] : set_value('tempat_lahir'); ?>" class="form-control" placeholder="tempat_lahir">
                    <small class="text-danger"><?= form_error('tempat_lahir'); ?></small>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat :</label>
                    <input type="text" name="alamat" value="<?= (isset($penduduk['alamat'])) ? $penduduk['alamat'] : set_value('alamat'); ?>" class="form-control" placeholder="alamat.....">
                    <small class="text-danger"><?= form_error('alamat'); ?></small>
                </div>
                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan :</label>
                    <input type="text" name="pekerjaan" value="<?= (isset($penduduk['pekerjaan'])) ? $penduduk['pekerjaan'] : set_value('pekerjaan'); ?>" class="form-control" placeholder="pekerjaan.....">
                    <small class="text-danger"><?= form_error('pekerjaan'); ?></small>
                </div>
                <div class="form-group">
                    <label for="no_hp">No.HP. :</label>
                    <input type="text" name="no_hp" value="<?= (isset($penduduk['no_hp'])) ? $penduduk['no_hp'] : set_value('no_hp'); ?>" class="form-control" placeholder="Nomor HP......">
                    <small class="text-danger"><?= form_error('no_hp'); ?></small>
                </div>
                <div class="text-right">
                    <input class="btn btn-primary" type="submit" class="save" name="Simpan" value="Simpan" />
                </div>
            </div>

        </div>
</div>
</div>
</form>
</div>