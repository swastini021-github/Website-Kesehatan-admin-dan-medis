<script src="<?php echo base_url() . 'assets/ckeditor/ckeditor.js' ?>"></script>
<script type="text/javascript">
	$(function() {
		CKEDITOR.replace('ckeditor');
	});
</script>
<!-- CKEditor readonly API -->
<br />
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Post Berita</h5>
	</div>

	<div class="panel-body">
		<form action="<?= site_url('admin/save_berita'); ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id_berita" value="<?= (isset($berita['id_berita'])) ? md5($berita['id_berita']) : set_value('id_berita'); ?>">
			<div class="form-group">
				<label class="col-lg-1 control-label">Judul :</label>
				<div class="col-lg-11">
					<input type="text" name="judul" value="<?= (isset($berita['judul_berita'])) ? $berita['judul_berita'] : set_value('judul'); ?>" class="form-control" placeholder="Judul berita">
					<small class="text-danger"><?= form_error('judul'); ?></small>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-1 control-label">Penulis :</label>
				<div class="col-lg-11">
					<input type="text" value="<?= (isset($berita['penulis'])) ? $berita['penulis'] : ''; ?>" name="penulis" class="form-control" placeholder="Penulis berita">
					<small class="text-danger"><?= form_error('penulis'); ?></small>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-1 control-label">Tanggal :</label>
				<div class="col-lg-11">
					<input type="date" value="<?= (isset($berita['tanggal_berita'])) ? $berita['tanggal_berita'] : ''; ?>" name="tanggal_berita" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-1 control-label">Foto :</label>
				<div class="col-lg-11">
					<input type="file" value="<?= (isset($berita['foto'])) ? $berita['foto'] : ''; ?>" name="filefoto" class="file-styled">
					<span class="help-block">format yang diminta : gif, png, jpg,jpeg,bpm.</span>
				</div>
			</div>
			<br />
			<div class="content-group">
				<textarea class="ckeditor form-control" name="berita" rows="4" cols="4">
								  <?= (isset($berita['isi_berita'])) ? $berita['isi_berita'] : ''; ?>
					        </textarea>
			</div>

			<div class="text-right">
				<button type="submit" class="btn bg-teal-400">Post Berita<i class="icon-arrow-right14 position-right"></i></button>
			</div>
		</form>
	</div>
</div>
<!-- /CKEditor readonly API -->