<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><?= $subjudul ?></h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-sm-4">
				<button type="button" onclick="bulk_delete()" class="btn btn-flat btn-sm bg-red"><i class="fa fa-trash"></i> Bulk Delete</button>
			</div>
			<div class="form-group col-sm-4 text-center">
				<?php if ($this->ion_auth->is_admin()) : ?>
					<select id="matkul_filter" class="form-control select2" style="width:100% !important">
						<option value="all">Semua Kategori</option>
						<?php foreach ($matkul as $m) : ?>
							<option value="<?= $m->id_matkul ?>"><?= $m->nama_matkul ?></option>
						<?php endforeach; ?>
					</select>
				<?php endif; ?>
				<?php if ($this->ion_auth->in_group('dosen')) : ?>
					<input id="matkul_id" value="<?= $matkul->nama_matkul; ?>" type="text" readonly="readonly" class="form-control">
				<?php endif; ?>
			</div>
			<div class="col-sm-4">
				<div class="pull-right">


					<button type="button" data-toggle="modal" data-target="#add-soal" class="btn bg-purple btn-flat btn-sm"><i class="fa fa-plus"></i> Buat Soal</button>


					<button type="button" onclick="reload_ajax()" class="btn btn-flat btn-sm bg-maroon"><i class="fa fa-refresh"></i> Reload</button>
				</div>
			</div>
		</div>
	</div>
	<?= form_open('soal/delete', array('id' => 'bulk')) ?>
	<div class="table-responsive px-4 pb-3" style="border: 0">
		<table id="soal" class="w-100 table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="text-center">
						<input type="checkbox" class="select_all">
					</th>
					<th width="25">No.</th>
					<th>Petugas</th>
					<th>Jenis Tes</th>
					<th>Soal</th>
					<th>Tgl Dibuat</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th class="text-center">
						<input type="checkbox" class="select_all">
					</th>
					<th width="25">No.</th>
					<th>Petugas</th>
					<th>Jenis Tes</th>
					<th>Soal</th>
					<th>Tgl Dibuat</th>
					<th class="text-center">Aksi</th>
				</tr>
			</tfoot>
		</table>
	</div>
	<?= form_close(); ?>
</div>

<div class="modal fade" id="add-soal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
				<h4 class="modal-title">Buat Soal</h4>
			</div>

			<?= form_open('soal', 'class="form" id="tambah"'); ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="banyak">Pilih jenis tes yang akan di buat</label>
					<select id="jenis-tes" name="pilih" class="form-control select2" style="width:100% !important" required>
						<option value="" disabled selected>-- Pilihan Jenis Tes --</option>
						<?php foreach ($dropdown as $d) : ?>
							<option value="<?= $d->id_matkul . ':' . $d->jurusan_id . ':' . $d->tipesoal_id . ':' . $d->id_dosen ?>"><?= $d->nama_matkul . ' - ' . $d->nama_jurusan ?></option>
						<?php endforeach ?>
					</select>

					<input type="hidden" name="id_matkul" id="inputmatkul" class="form-control">
					<input type="hidden" name="id_jurusan" id="inputjurusan" class="form-control">
					<input type="hidden" name="id_tipesoal" id="inputtipesoal" class="form-control">
					<input type="hidden" name="id_dosen" id="inputdosen" class="form-control">
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Buat Soal</button>
			</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<script src="<?= base_url() ?>assets/dist/js/app/soal/data.js"></script>

<?php if ($this->ion_auth->is_admin()) : ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#matkul_filter').on('change', function() {
				let id_matkul = $(this).val();
				let src = '<?= base_url() ?>soal/data';
				let url;

				if (id_matkul !== 'all') {
					let src2 = src + '/' + id_matkul;
					url = $(this).prop('checked') === true ? src : src2;
				} else {
					url = src;
				}
				table.ajax.url(url).load();
			});
			$('#jenis-tes').on('change', function() {
				let ids = $(this).val().split(':');
				id_matkul = ids[0];
				id_jurusan = ids[1];
				id_tipesoal = ids[2];
				id_dosen = ids[3];
				$("#inputmatkul").val(id_matkul);
				$("#inputjurusan").val(id_jurusan);
				$("#inputtipesoal").val(id_tipesoal);
				$("#inputdosen").val(id_dosen);

				// ajax 
				$.ajax({
					url: base_url + 'soal',
					data: $('form#tambah').serialize(),
					type: "POST",
					success: function(respon) {
						if (respon.status) {
							$('form#tambah').attr("action", respon.slug);
						} else {
							Swal({
								title: "Gagal",
								text: "Slug tidak ditemukan",
								type: "error"
							});
						}
					},
					error: function() {
						Swal({
							title: "Gagal",
							text: "Slug tidak ditemukan",
							type: "error"
						});
					}
				});

				// akhir ajax				
			});
		});
	</script>
<?php endif; ?>
<?php if ($this->ion_auth->in_group('dosen')) : ?>
	<script type="text/javascript">
		$(document).ready(function() {
			let id_matkul = '<?= $matkul->matkul_id ?>';
			let id_dosen = '<?= $matkul->id_dosen ?>';
			let src = '<?= base_url() ?>soal/data';
			let url = src + '/' + id_matkul + '/' + id_dosen;
			table.ajax.url(url).load();
		});
	</script>
<?php endif; ?>