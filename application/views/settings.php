<div class="box box-danger box-solid">
    <div class="box-header">
        <h3 class="box-title">
            Kosongkan Table
        </h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <p>
            Semua data akan dihapus kecuali akun admin.
        </p>
        <button type="button" id="truncate" class="btn btn-danger btn-flat">
            <i class="fa fa-trash"></i> Kosongkan Table
        </button>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){

        $('#truncate').on('click', function(e){
            e.preventDefault();
            
            Swal({
                text: "Kosongkan Table",
                title: "Anda yakin?",
                type: "question",
                showCancelButton: true,
                cancelButtonColor: '#dd4b39'
            }).then((result) => {
                if(result.value){
                    $(this).attr('disabled', 'disabled').text('Proses...');
                    var jqxhr = $.getJSON('<?=base_url()?>settings/truncate', function(response){
                        if(response.status){
                            Swal({
                                title: "Berhasil",
                                text: "Semua table sudah dikosongkan, kecuali akun Admin pada table user.",
                                type: "success",
                            });
                        }
                    });
                    
                    jqxhr.done(function() {
                        console.log( "ajax complete" );
                        $('#truncate').removeAttr('disabled').html('<i class="fa fa-trash"></i> Kosongkan Table');
                    });

                }
            });
            
        });
        
    });
</script>