<div class="content">
    <div class="main">
        <div class="page-header">
            <h4 class="page-title">Event</h4>
            <div class="breadcrumb">
                <span class="me-1 text-gray"><i class="feather icon-home"></i></span>
                <div class="breadcrumb-item"><a href="index.html"> Home </a></div>
                <div class="breadcrumb-item"><a href="javascript:void(0)"> Master </a></div>
                <div class="breadcrumb-item"><a href="#"> Event </a></div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <?php if ($this->session->flashdata('message')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Telah berhasil <strong><?= $this->session->flashdata('message') ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <h4>Data Master Event</h4>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-sm btn-primary mb-1 ms-2 me-1 float-end" href="<?= base_url('event/tambah') ?>">Tambah</a>

                    </div>
                </div>
                <div class="mt-4">
                    <table id="data-table" class="table data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Event</th>
                                <th>Tanggal Event</th>
                                <th>Waktu Event</th>
                                <th>Penyelenggara</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($event as $ev) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $ev['nama_event'] ?></td>
                                    <td><?= $ev['tanggal_awal'] ?> - <?= $ev['tanggal_akhir'] ?></td>
                                    <td><?= $ev['waktu_mulai'] ?> - <?= $ev['waktu_berakhir'] ?></td>
                                    <td><?= $ev['penyelenggara'] ?></td>
                                    <td><a href="" class="btn btn-sm btn-success">Edit</a> <a href="" class="btn btn-sm btn-danger">Hapus</a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Event</th>
                                <th>Tanggal Event</th>
                                <th>Waktu Event</th>
                                <th>Penyelenggara</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="code-example">

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