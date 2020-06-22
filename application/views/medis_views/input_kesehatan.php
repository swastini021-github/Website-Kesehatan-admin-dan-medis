<form action="<?= site_url('medis/save_kesehatan'); ?>" method="POST">
    <input type="hidden" name="id_kesehatan" value="<?= (isset($kesehatan['id_kesehatan'])) ? md5($kesehatan['id_kesehatan']) : ''; ?>">
    <div class="row tile">
        <div class="col-md-6">
            <h3 class="tile-title">INPUT DATA KESEHATAN KESEHATAN</h3>
            <div class="tile-body">
                <input type="hidden" name="id_kesehatan" value="<?= (isset($kesehatan['id_kesehatan'])) ? md5($kesehatan['id_kesehatan']) : ''; ?>">
                <div class="form-group">
                    <label for="tahun">Tahun :</label>
                    <input type="text" name="tahun" value="<?= (isset($kesehatan['tahun'])) ? $kesehatan['tahun'] : set_value('tahun'); ?>" class="form-control" placeholder="Tahun">
                    <small class="text-danger"><?= form_error('tahun'); ?></small>
                </div>
                <div class="form-group">
                    <label for="bulan">bulan :</label>
                    <input type="text" name="bulan" value="<?= (isset($kesehatan['bulan'])) ? $kesehatan['bulan'] : set_value('bulan'); ?>" class="form-control" placeholder="Bulan">
                    <small class="text-danger"><?= form_error('bulan'); ?></small>
                </div>
                <div class="form-group">
                    <label for="tgl_cek">Tanggal :</label>
                    <input type="date" name="tgl_cek" value="<?= (isset($kesehatan['tgl_cek'])) ? $kesehatan['tgl_cek'] : set_value('tgl_cek'); ?>" class="form-control" placeholder="Tanggal">
                    <small class="text-danger"><?= form_error('tgl_cek'); ?></small>
                </div>
                <div class="form-group">
                    <label for="kategoriuser">NIK:</label>
                    <select class="form-control" name="penduduk">
                        <?php
                        //menampilkan data kategori user dalam list
                        foreach ($penduduk as $val) { ?>
                            <option <?= (isset($kesehatan['id_penduduk']) && $kesehatan['id_penduduk'] == $val['id_penduduk']) ? 'selected' : ''; ?> value="<?= $val['id_penduduk']; ?>"><?= $val['nik']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Hasil Tes Kesehatan</h3>
                <div class="tile-body">
                    <div class="form-group">
                        <label for="tinggi_badan">Tinggi Badan (cm) :</label>
                        <input type="number" name="tinggi_badan" value="<?= (isset($kesehatan['tinggi_badan'])) ? $kesehatan['tinggi_badan'] : set_value('tinggi_badan'); ?>" class="form-control" placeholder="Tahun">
                        <small class="text-danger"><?= form_error('tinggi_badan'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="berat_badan">Berat Badan (kg) :</label>
                        <input type="number" name="berat_badan" value="<?= (isset($kesehatan['berat_badan'])) ? $kesehatan['berat_badan'] : set_value('berat_badan'); ?>" class="form-control" placeholder="berat_badan">
                        <small class="text-danger"><?= form_error('berat_badan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="tensi">Tensi (mmHg):</label>
                        <input type="number" name="tensi" value="<?= (isset($kesehatan['tensi'])) ? $kesehatan['tensi'] : set_value('tensi'); ?>" class="form-control" placeholder="Tensi">
                        <small class="text-danger"><?= form_error('tensi'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="kadar_gula">Kadar Gula (mg/dL) :</label>
                        <input type="number" name="kadar_gula" value="<?= (isset($kesehatan['kadar_gula'])) ? $kesehatan['kadar_gula'] : set_value('kadar_gula'); ?>" class="form-control" placeholder="Kadar Gula">
                        <small class="text-danger"><?= form_error('kadar_gula'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="alergi">Alergi :</label>
                        <input type="text" name="alergi" value="<?= (isset($penduduk['alergi'])) ? $penduduk['alergi'] : set_value('alergi'); ?>" class="form-control" placeholder="Alergi">
                        <small class="text-danger"><?= form_error('alergi'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="rabun">Rabun :</label>
                        <input type="text" name="rabun" value="<?= (isset($kesehatan['rabun'])) ? $kesehatan['rabun'] : set_value('rabun'); ?>" class="form-control" placeholder="Rabun Jauh/Rabun Dekat/Normal">
                        <small class="text-danger"><?= form_error('rabun'); ?></small>
                    </div>
                    <div class=" text-right">
                        <input class="btn btn-primary" type="submit" class="save" name="Simpan" value="Simpan" />
                    </div>
                </div>
            </div>
        </div>
        <div class="clearix"></div>
    </div>
</form>