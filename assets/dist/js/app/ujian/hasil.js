var table;

$(document).ready(function () {

    ajaxcsrf();

    table = $("#hasil").DataTable({
        initComplete: function () {
            var api = this.api();
            $('#hasil_filter input')
                .off('.DT')
                .on('keyup.DT', function (e) {
                    api.search(this.value).draw();
                });
        },
        oLanguage: {
            sProcessing: "loading..."
        },
        processing: true,
        serverSide: true,
        ajax: {
            "url": base_url + "hasilujian/data",
            "type": "POST",
        },
        columns: [
            {
                "data": "id_ujian",
                "orderable": false,
                "searchable": false
            },
            { "data": 'nama_ujian' },
            { "data": 'nama_matkul' },
            { "data": 'nama_dosen' },
            { "data": 'jumlah_soal' },
            { "data": 'waktu' },
            { "data": 'tgl_mulai' },
            {
                "orderable": false,
                "searchable": false
            },
        ],
        columnDefs: [
            {
                "targets": 7,
                "data": "id_ujian",
                "render": function (data, type, row, meta) {
                    return `
                    <div class="text-center">
                        <a class="btn btn-xs bg-maroon" href="${base_url}hasilujian/detail/${data}" >
                            <i class="fa fa-search"></i> Lihat Hasil
                        </a>
                    </div>
                    `;
                }
            },
        ],
        order: [
            [1, 'asc']
        ],
        rowId: function (a) {
            return a;
        },
        rowCallback: function (row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        }
    });
});