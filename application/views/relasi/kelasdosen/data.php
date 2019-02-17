<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Relasi <?=$subjudul?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="mt-2 mb-3">
            <a href="<?=base_url('kelasdosen/add')?>" class="btn btn-sm btn-flat bg-purple"><i class="fa fa-plus"></i> Tambah Data</a>
            <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-flat btn-default"><i class="fa fa-refresh"></i> Reload</button>
			<div class="pull-right">
				<button onclick="bulk_delete()" class="btn btn-sm btn-flat btn-danger" type="button"><i class="fa fa-trash"></i> Delete</button>
			</div>
        </div>
		<?=form_open('',array('id'=>'bulk'))?>
        <table id="kelasdosen" class="w-100 table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIP</th>
                    <th>Dosen</th>
                    <th>Kelas</th>
					<th class="text-center">Edit</th>
					<th class="text-center">
						<input type="checkbox" class="select_all">
					</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No.</th>
                    <th>NIP</th>
                    <th>Dosen</th>
                    <th>Kelas</th>
					<th class="text-center">Edit</th>
					<th class="text-center">
						<input type="checkbox" class="select_all">
					</th>
                </tr>
            </tfoot>
        </table>
		<?=form_close()?>
    </div>
</div>

<script src="<?=base_url()?>assets/dist/js/app/relasi/kelasdosen/data.js"></script>