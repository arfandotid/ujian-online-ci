<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?=$subjudul?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <button type="button" onclick="bulk_delete()" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash"></i> Bulk Delete</button>
        <div class="pull-right">
            <a href="<?=base_url('ujian/add')?>" class="btn bg-purple btn-sm btn-flat"><i class="fa fa-file-text-o"></i> Ujian Baru</a>
            <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-flat bg-maroon"><i class="fa fa-refresh"></i> Reload</button>
        </div>
    </div>
	<?=form_open('ujian/delete', array('id'=>'bulk'))?>
    <div class="table-responsive px-4 pb-3" style="border: 0">
        <table id="ujian" class="w-100 table table-striped table-bordered table-hover">
        <thead>
            <tr>
				<th class="text-center">
					<input type="checkbox" class="select_all">
				</th>
                <th>No.</th>
                <th>Nama Ujian</th>
                <th>Mata Kuliah</th>
                <th>Jumlah Soal</th>
                <th>Waktu</th>
                <th>Acak Soal</th>
				<th	class="text-center">Token</th>
				<th class="text-center">Aksi</th>
            </tr>        
        </thead>
        <tfoot>
            <tr>
				<th class="text-center">
					<input type="checkbox" class="select_all">
				</th>
                <th>No.</th>
                <th>Nama Ujian</th>
                <th>Mata Kuliah</th>
                <th>Jumlah Soal</th>
                <th>Waktu</th>
                <th>Acak Soal</th>                
				<th	class="text-center">Token</th>
				<th class="text-center">Aksi</th>
            </tr>
        </tfoot>
        </table>
    </div>
	<?=form_close();?>
</div>

<script type="text/javascript">
	var id_dosen = '<?=$dosen->id_dosen?>';
</script>

<script src="<?=base_url()?>assets/dist/js/app/ujian/data.js"></script>