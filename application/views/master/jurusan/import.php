<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?=$subjudul?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
	</div>
    <div class="box-body">
        <div class="row text-center">
            <div class="col-sm-offset-3 col-sm-6">
                <div class="alert bg-purple">
                    <strong>Catatan!</strong> untuk import data dari file excel, silahkan download templatenya terlebih dahulu. 
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="" class="btn-default btn">Download Template Import Excel</a>
        </div>
        <br>
        <?= form_open() ;?>
        <div class="row">
                <label for="file" class="col-sm-offset-1 col-sm-3 text-right">Pilih File</label>
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="file" name="file" id="file">
                    </div>
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-sm btn-primary">Upload</button>
                </div>
            </div>
        <?= form_close() ;?>
    </div>
</div>