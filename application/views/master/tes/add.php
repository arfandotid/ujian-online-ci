<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Form <?= $judul ?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-offset-3 col-sm-6">
                <div class="my-2">
                    <div class="form-horizontal form-inline">
                        <a href="<?= base_url('tes') ?>" class="btn btn-default btn-xs">
                            <i class="fa fa-arrow-left"></i> Batal
                        </a>
                        <div class="pull-right">
                            <span> Jumlah : </span><label for=""><?= $banyak ?></label>
                        </div>
                    </div>
                </div>
                <?= form_open('tes/save', array('id' => 'matkul'), array('mode' => 'add')) ?>
                <table id="form-table" class="table text-center table-condensed">
                    <thead>
                        <tr>
                            <th># No</th>
                            <th>Jenis Tes</th>
                            <th>Tipe Soal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i <= $banyak; $i++) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td>
                                    <div class="form-group">
                                        <input autofocus="autofocus" onfocus="this.select()" autocomplete="off" type="text" name="nama_matkul[<?= $i ?>]" class="form-control">
                                        <span class="d-none">DON'T DELETE THIS</span>
                                        <small class="help-block text-right"></small>
                                    </div>
                                </td>
                                <td width="200">
                                    <div class="form-group">
                                        <select required="required" name="tipesoal_id[<?= $i ?>]" class="form-control input-sm select2" style="width: 100%!important">
                                            <option value="" disabled selected>-- Pilih --</option>
                                            <?php foreach ($tipesoal as $t) : ?>
                                                <option value="<?= $t->id_tipesoal ?>"><?= $t->nama_tipesoal ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="help-block text-right"></small>
                                    </div>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
                <button id="submit" type="submit" class="mb-4 btn btn-block btn-flat bg-purple">
                    <i class="fa fa-save"></i> Simpan
                </button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var inputs = '';
    var banyak = '<?= $banyak; ?>';
</script>

<script src="<?= base_url() ?>assets/dist/js/app/master/tes/add.js"></script>