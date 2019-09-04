<?=form_open('dosen/save', array('id'=>'formdosen'), array('method'=>'edit', 'id_dosen'=>$data->id_dosen));?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Form <?=$subjudul?></h3>
        <div class="box-tools pull-right">
            <a href="<?=base_url()?>dosen" class="btn btn-sm btn-flat btn-warning">
                <i class="fa fa-arrow-left"></i> Batal
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input value="<?=$data->nip?>" autofocus="autofocus" onfocus="this.select()" type="number" id="nip" class="form-control" name="nip" placeholder="NIP">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Nama Dosen</label>
                    <input value="<?=$data->nama_dosen?>" type="text" class="form-control" name="nama_dosen" placeholder="Nama Dosen">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="email">Email Dosen</label>
                    <input value="<?=$data->email?>" type="text" class="form-control" name="email" placeholder="Email Dosen">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="matkul">Mata Kuliah</label>
                    <select name="matkul" id="matkul" class="form-control select2" style="width: 100%!important">
                        <option value="" disabled selected>Pilih Mata Kuliah</option>
                        <?php foreach ($matkul as $row) : ?>
                            <option <?=$data->matkul_id===$row->id_matkul?"selected":""?> value="<?=$row->id_matkul?>"><?=$row->nama_matkul?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="help-block"></small>
                </div>
                <div class="form-group pull-right">
                    <button type="reset" class="btn btn-flat btn-default">
                        <i class="fa fa-rotate-left"></i> Reset
                    </button>
                    <button type="submit" id="submit" class="btn btn-flat bg-purple">
                        <i class="fa fa-pencil"></i> Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?=form_close();?>

<script src="<?=base_url()?>assets/dist/js/app/master/dosen/edit.js"></script>