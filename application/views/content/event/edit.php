<div class="content">
    <div class="main">
        <div class="page-header">
            <h4 class="page-title">Edit Event</h4>
            <div class="breadcrumb">
                <span class="me-1 text-gray"><i class="feather icon-home"></i></span>
                <div class="breadcrumb-item"><a href="index.html"> Home </a></div>
                <div class="breadcrumb-item"><a href="javascript:void(0)"> Master </a></div>
                <div class="breadcrumb-item"><a href="javascript:void(0)"> Event </a></div>
                <div class="breadcrumb-item"><a href="#"> Edit </a></div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4>Event</h4>

                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="nama_event" class="form-label">Nama Event</label>
                                    <input type="hidden" class="form-control" id="id" name="id" placeholder="Wisuda" value="<?= $event['id'] ?>">
                                    <input type="text" class="form-control" id="nama_event" name="nama_event" placeholder="Wisuda" value="<?= $event['nama_event'] ?>">
                                    <?= form_error('nama_event', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi_event">Deskripsi Event</label>
                                    <textarea name="deskripsi_event" id="deskripsi_event" cols="30" rows="3" class="form-control" placeholder="Wisuda adalah kegiatan yang sakral"><?= $event['deskripsi_event'] ?></textarea>
                                    <?= form_error('deskripsi_event', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_awal" class="form-label">Tanggal Awal Event</label>
                                    <input type="text" class="form-control flatpickr" name="tanggal_awal" id="tanggal_awal" value="<?= $event['tanggal_awal'] ?>" placeholder="2022-05-24">
                                    <?= form_error('tanggal_awal', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_akhir" class="form-label">Tanggal Akhir Event</label>
                                    <input type="text" class="form-control flatpickr" name="tanggal_akhir" id="tanggal_akhir" value="<?= $event['tanggal_akhir'] ?>" placeholder="2022-05-24">
                                    <?= form_error('tanggal_akhir', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="waktu_mulai" class="form-label">Waktu Mulai Event</label>
                                    <input type="text" class="form-control timepickr" name="waktu_mulai" id="waktu_mulai" value="<?= $event['waktu_mulai'] ?>" placeholder="05:00:00">
                                    <?= form_error('waktu_mulai', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="waktu_berakhir" class="form-label">Waktu Akhir Event</label>
                                    <input type="text" class="form-control timepickr" name="waktu_berakhir" id="waktu_berakhir" value="<?= $event['waktu_berakhir'] ?>" placeholder="05:00:00">
                                    <?= form_error('waktu_berakhir', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="penyelenggara" class="form-label">Penyelenggara</label>
                                    <input type="text" class="form-control" name="penyelenggara" id="penyelenggara" value="<?= $event['penyelenggara'] ?>" placeholder="Ardhacodes">
                                    <?= form_error('penyelenggara', '<small class="text-danger">', '</small>') ?>

                                </div>
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
<!-- Content END -->

<!-- <script>
    $('#range').daterangepicker({
        "startDate": "05/13/2022",
        "endDate": "05/19/2022"
    }, function(start, end, label) {
        console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
    });

    var today = new Date();

    var date = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
    alert(date);
    $('#tgl').data('daterangepicker').setStartDate('03/01/2014');
</script> -->