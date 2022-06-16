<div class="row">
	<div class="col-sm-12">    
		<?=form_open_multipart('soal/savekraepelin', array('id'=>'formsoal'), array('method'=>'add'));?>
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><?=$subjudul?></h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
			<div class="mt-2 mb-3">
			<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-flat bg-purple"><i class="fa fa-plus"></i> Tambah Data</button>                <div class="row">
					<div class="col-sm-12">
					</div>
					<div class="col-sm-8 col-sm-offset-2">
						<div class="form-group col-sm-12">
							<input type="hidden" name="dosen_id" value="<?=$dosen->id_dosen;?>">
							<input type="hidden" name="matkul_id" value="<?=$dosen->matkul_id;?>">
						</div>						
						<div class="form-group pull-right">
							<a href="<?=base_url('soal')?>" class="btn btn-flat btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
							<button type="submit" id="submit" class="btn btn-flat bg-success"><i class="fa fa-save"></i> Generate</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?=form_close();?>
	</div>
</div>
<div class="modal fade" id="myModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
				<h4 class="modal-title">Tambah Kategori</h4>
			</div>
			<?= form_open('soal/add', array('id', 'tambah')); ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="banyak">Jumlah baris</label>
					<input value="1" minlength="1" maxlength="50" min="1" max="50" id="banyakinput" type="number" autocomplete="off" required="required" name="baris" class="form-control">
					<small class="help-block">Max. 50</small>
				</div>
				<div class="form-group">
					<label for="banyak">Jumlah Kolom</label>
					<input value="1" minlength="1" maxlength="50" min="1" max="50" id="banyakinput" type="number" autocomplete="off" required="required" name="kolom" class="form-control">
					<small class="help-block">Max. 50</small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" name="input">Generate</button>
			</div>
			<?= form_close(); ?>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>