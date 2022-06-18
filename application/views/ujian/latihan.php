<div class="callout callout-info">
    <h4>Peraturan Ujian!</h4>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime minus dolores accusantium fugiat debitis modi voluptates non consequuntur nemo expedita nihil laudantium commodi voluptatum voluptatem molestiae consectetur incidunt animi, qui exercitationem? Nisi illo, magnam perferendis commodi consequuntur impedit, et nihil excepturi quas iste cum sunt debitis odio beatae placeat nemo..</p>
</div>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Konfirmasi Data</h3>
    </div>
    <div class="box-body">
        <span id="id_ujian" data-key="<?= $encrypted_id ?>"></span>
        <div class="row">
            <div class="col-sm-6">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td><?= $mhs->nama ?></td>
                    </tr>
                    <tr>
                        <th>Petugas</th>
                        <td><?= $ujian->nama_dosen ?></td>
                    </tr>
                    <tr>
                        <th>ruang/kategori</th>
                        <td><?= $mhs->nama_kelas ?> / <?= $mhs->nama_jurusan ?></td>
                    </tr>
                    <tr>
                        <th>Nama Ujian</th>
                        <td><?= $ujian->nama_ujian ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah Soal</th>
                        <td><?= $ujian->jumlah_soal ?></td>
                    </tr>
                    <tr>
                        <th>Waktu</th>
                        <td><?= $ujian->waktu ?> Menit</td>
                    </tr>
                    <tr>
                        <th>Terlambat</th>
                        <td>
                            <?= strftime('%d %B %Y', strtotime($ujian->terlambat)) ?>
                            <?= date('H:i:s', strtotime($ujian->terlambat)) ?>
                        </td>
                    </tr>

                    <input autocomplete="off" id="token" placeholder="Token" type="hidden" class="input-sm form-control" value="<?= $ujian->token ?>">
                </table>
            </div>
            <div class="col-sm-6">
                <div class="box box-solid">
                    <div class="box-body pb-0">
                        <div class="callout callout-info">
                            <p>
                                Waktu boleh mengerjakan ujian adalah saat tombol "MULAI" berwarna hijau.
                            </p>
                        </div>
                        <?php
                        $mulai = strtotime($ujian->tgl_mulai);
                        $terlambat = strtotime($ujian->terlambat);
                        $now = time();
                        if ($mulai > $now) :
                        ?>
                            <div class="callout callout-success">
                                <strong><i class="fa fa-clock-o"></i> Ujian akan dimulai pada</strong>
                                <br>
                                <span class="countdown" data-time="<?= date('Y-m-d H:i:s', strtotime($ujian->tgl_mulai)) ?>">00 Hari, 00 Jam, 00 Menit, 00 Detik</strong><br />
                            </div>
                        <?php elseif ($terlambat > $now) : ?>
                            <button id="btncek" data-id="<?= $ujian->id_ujian ?>" class="btn btn-success btn-lg mb-4">
                                <i class="fa fa-pencil"></i> Mulai
                            </button>
                            <div class="callout callout-danger">
                                <i class="fa fa-clock-o"></i> <strong class="countdown" data-time="<?= date('Y-m-d H:i:s', strtotime($ujian->terlambat)) ?>">00 Hari, 00 Jam, 00 Menit, 00 Detik</strong><br />
                                Batas waktu menekan tombol mulai.
                            </div>
                        <?php else : ?>
                            <div class="callout callout-danger">
                                Waktu untuk menekan tombol <strong>"MULAI"</strong> sudah habis.<br />
                                Silahkan hubungi petugas anda untuk bisa mengikuti ujian pengganti.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/dist/js/app/ujian/token.js"></script>