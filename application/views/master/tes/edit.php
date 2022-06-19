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
                            <span> Jumlah : </span><label for=""><?= count($matkul) ?></label>
                        </div>
                    </div>
                </div>
                <?= form_open('tes/save', array('id' => 'matkul'), array('mode' => 'edit')) ?>
                <table id="form-table" class="table text-center table-condensed">
                    <thead>
                        <tr>
                            <th># No</th>
                            <th>Tes</th>
                            <th>Tipe Soal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($matkul as $row) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td>
                                    <div class="form-group">
                                        <?= form_hidden('id_matkul[' . $no . ']', $row->id_matkul) ?>
                                        <input autofocus="autofocus" onfocus="this.select()" autocomplete="off" value="<?= $row->nama_matkul ?>" type="text" name="nama_matkul[<?= $no ?>]" class="input-md form-control">
                                        <small class="help-block text-right"></small>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select required="required" name="tipesoal_id[<?= $no ?>]" class="input-sm form-control select2" style="width: 100%!important">
                                            <option value="" disabled>-- Pilih --</option>
                                            <?php foreach ($tipesoal as $j) : ?>
                                                <option <?= $row->tipesoal_id == $j->id_tipesoal ? "selected='selected'" : "" ?> value="<?= $j->id_tipesoal ?>"><?= $j->nama_tipesoal ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="help-block text-right"></small>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
                <button type="submit" class="mb-4 btn btn-block btn-flat bg-purple">
                    <i class="fa fa-save"></i> Simpan Perubahan
                </button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/dist/js/app/master/tes/edit.js"></script>