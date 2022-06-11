<div class="content">
    <div class="main">
        <div class="page-header">
            <h4 class="page-title">Activity</h4>
            <div class="breadcrumb">
                <span class="me-1 text-gray"><i class="feather icon-home"></i></span>
                <div class="breadcrumb-item"><a href="index.html"> Home </a></div>
                <div class="breadcrumb-item"><a href="javascript:void(0)"> Activity </a></div>
                <div class="breadcrumb-item"><a href="#"> My Activity </a></div>
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
                <h4>Data Partisipasi Pada Event</h4>

                <div class="mt-4">
                    <table id="data-table" class="table data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Event</th>
                                <th>Pelaksanaan</th>
                                <th>Waktu</th>
                                <th>Penyelenggara</th>
                                <th>QR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($activityjoineventpeserta as $activity) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $activity['nama_event'] ?></td>
                                    <td><?= date("d F Y", strtotime($activity['tanggal_awal'])) ?> - <?= date("d F Y", strtotime($activity['tanggal_akhir'])) ?> </td>
                                    <td><?= $activity['waktu_mulai'] ?> - <?= $activity['waktu_berakhir'] ?></td>
                                    <td><?= $activity['penyelenggara'] ?></td>
                                    <td>
                                        <!-- <img width="155" src="<?= base_url('assets/dataqr/') . $activity['qr_img'] ?> " alt="" srcset=""> -->
                                        <!-- <a class="btn btn-primary btn-md" href="#qrshow">Lihat QR</a> -->
                                        <div class="imageQR " id="qrshow">
                                            <a href="<?= base_url("assets/dataqr/")  ?><?= $activity['qr_img'] ?> " title="My QR <?= $activity['qr_img'] ?>">
                                                <img class="img-fluid" src="<?= base_url('assets/dataqr/') . $activity['qr_img'] ?> " alt="My QR <?= $activity['qr_img'] ?>" />
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Event</th>
                                <th>Pelaksanaan</th>
                                <th>Waktu</th>
                                <th>Penyelenggara</th>
                                <th>QR</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="code-example">

                </div>
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
                <h4>Data Kehadiran Pada Event</h4>
                <div class="mt-4">
                    <table id="data-table" class="table data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Event</th>
                                <th>ID Peserta</th>
                                <th>Waktu Hadir</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($activityhadirpeserta as $u) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $u['nama_event'] ?></td>
                                    <td><?= $u['peserta_event_id'] ?></td>
                                    <td><?= $u['waktu_kehadiran'] ?></td>
                                    <td><?= $u['status_kehadiran'] ?></td>

                                </tr>


                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Event</th>
                                <th>ID Peserta</th>
                                <th>Waktu Hadir</th>
                                <th>Status</th>
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