<div class="content">
    <div class="main">
        <div class="page-header">
            <h4 class="page-title">Edit Peserta</h4>
            <div class="breadcrumb">
                <span class="me-1 text-gray"><i class="feather icon-home"></i></span>
                <div class="breadcrumb-item"><a href="index.html"> Home </a></div>
                <div class="breadcrumb-item"><a href="javascript:void(0)"> Master </a></div>
                <div class="breadcrumb-item"><a href="javascript:void(0)"> Peserta </a></div>
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
                                <input type="hidden" class="form-control" id="id" name="id" placeholder="Wisuda" value="<?= $pesertajoinevent[0]['id'] ?>">
                                <?php //var_dump($event);die; 
                                ?>
                                <div class="mb-3">
                                    <label for="event_id" class="form-label">Pilih Event</label>

                                    <select class="form-select select2" name="event_id" id="event_id">
                                        <?php foreach ($event as $ev) : ?>
                                            <option value="<?= $ev['id'] ?>" <?php if ($pesertajoinevent[0]['event_id'] == $ev['id']) {
                                                                                    echo 'selected';
                                                                                } ?>><?= $ev['nama_event'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('event_id', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Andre" value="<?= $pesertajoinevent[0]['nama'] ?>">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="asal" class="form-label">Asal Kota</label>
                                    <input type="text" class="form-control" name="asal" id="asal" placeholder="Sidoarjo" value="<?= $pesertajoinevent[0]['asal'] ?>">
                                    <?= form_error('asal', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="no_tlp" class="form-label">No Tlp</label>
                                    <input type="text" class="form-control" name="no_tlp" id="no_tlp" placeholder="6281246549498" value="<?= $pesertajoinevent[0]['no_tlp'] ?>">
                                    <?= form_error('no_tlp', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <a href="<?= base_url('peserta') ?>" class="btn btn-secondary me-2">Batal</a>
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