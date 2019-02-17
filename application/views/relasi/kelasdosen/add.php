<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Form <?=$judul?></h3>
        <div class="box-tools pull-right">
            <a href="<?=base_url()?>kelasdosen" class="btn btn-warning btn-flat btn-sm">
                <i class="fa fa-arrow-left"></i> Batal
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="alert bg-purple">
                    <h4><i class="fa fa-info-circle"></i> Informasi</h4>
                    Jika kolom dosen kosong, berikut ini kemungkinan penyebabnya :
                    <br><br>
                    <ol class="pl-4">
                        <li>Anda belum menambahkan master data dosen (Master dosen kosong/belum ada data sama sekali).</li>
                        <li>Dosen sudah ditambahkan, jadi anda tidak perlu tambah lagi. Anda hanya perlu mengedit data kelas dosen nya saja.</li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-4">
                <?=form_open('kelasdosen/save', array('id'=>'kelasdosen'), array('method'=>'add'))?>
                <div class="form-group">
                    <label>Dosen</label>
                    <select name="dosen_id" class="form-control select2" style="width: 100%!important">
                        <option value="" disabled selected></option>
                        <?php foreach ($dosen as $d) : ?>
                            <option value="<?=$d->id_dosen?>"><?=$d->nama_dosen?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="help-block text-right"></small>
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <select id="kelas" multiple="multiple" name="kelas_id[]" class="form-control select2" style="width: 100%!important">
                        <?php foreach ($kelas as $k) : ?>
                            <option value="<?=$k->id_kelas?>"><?=$k->nama_kelas?> - <?=$k->nama_jurusan?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="help-block text-right"></small>
                </div>
                <div class="form-group pull-right">
                    <button type="reset" class="btn btn-flat btn-default">
                        <i class="fa fa-rotate-left"></i> Reset
                    </button>
                    <button id="submit" type="submit" class="btn btn-flat bg-purple">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</div>

<script src="<?=base_url()?>assets/dist/js/app/relasi/kelasdosen/add.js"></script>