<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Form <?= $judul ?></h3>
        <div class="box-tools pull-right">
            <a href="<?= base_url('peserta') ?>" class="btn btn-sm btn-flat btn-warning">
                <i class="fa fa-arrow-left"></i> Batal
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <?= form_open('peserta/save', array('id' => 'mahasiswa'), array('method' => 'add')) ?>
                <div class="form-group">
                    <label for="nim">NIK</label>
                    <input autofocus="autofocus" onfocus="this.select()" placeholder="NIK" type="text" name="nim" class="form-control">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input placeholder="Nama" type="text" name="nama" class="form-control">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input placeholder="Email" type="email" name="email" class="form-control">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="text" name="tanggal_lahir" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="dd/mm/yyyy">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input placeholder="Tempat Lahir" type="text" name="tempat_lahir" class="form-control">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control select2">
                        <option value="">-- Pilih --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input placeholder="Alamat" type="text" name="alamat" class="form-control">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="pendidikan">Pendidikan</label>
                    <input placeholder="Pendidikan" type="text" name="pendidikan" class="form-control">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input placeholder="Pekerjaan" type="text" name="pekerjaan" class="form-control">
                    <small class="help-block"></small>
                </div>

                <div class="form-group">
                    <label for="jurusan">Kategori</label>
                    <select id="jurusan" name="jurusan" class="form-control select2">
                        <option value="" disabled selected>-- Pilih --</option>
                    </select>
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="kelas">Ruang</label>
                    <select id="kelas" name="kelas" class="form-control select2">
                        <option value="">-- Pilih --</option>
                    </select>
                    <small class="help-block"></small>
                </div>
                <div class="form-group pull-right">
                    <button type="reset" class="btn btn-flat btn-default"><i class="fa fa-rotate-left"></i> Reset</button>
                    <button type="submit" id="submit" class="btn btn-flat bg-purple"><i class="fa fa-save"></i> Simpan</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/dist/js/app/master/peserta/add.js"></script>