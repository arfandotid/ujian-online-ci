<?= form_open('petugas/save', array('id' => 'formdosen'), array('method' => 'add')); ?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Form <?= $subjudul ?></h3>
        <div class="box-tools pull-right">
            <a href="<?= base_url() ?>petugas" class="btn btn-sm btn-flat btn-warning">
                <i class="fa fa-arrow-left"></i> Batal
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="form-group">
                    <label for="nip">NIK</label>
                    <input autofocus="autofocus" onfocus="this.select()" type="number" id="nip" class="form-control" name="nip" placeholder="NIK">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Nama</label>
                    <input type="text" class="form-control" name="nama_dosen" placeholder="Nama">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="matkul">Jenis Tes</label>
                    <select name="matkul" id="matkul" class="form-control select2" style="width: 100%!important">
                        <option value="" disabled selected>Pilih Jenis Tes</option>
                        <?php foreach ($matkul as $row) : ?>
                            <option value="<?= $row->id_matkul ?>"><?= $row->nama_matkul ?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="help-block"></small>
                </div>
                <div class="form-group pull-right">
                    <button type="reset" class="btn btn-flat btn-default">
                        <i class="fa fa-rotate-left"></i> Reset
                    </button>
                    <button type="submit" id="submit" class="btn btn-flat bg-purple">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>

<script src="<?= base_url() ?>assets/dist/js/app/master/petugas/add.js"></script>