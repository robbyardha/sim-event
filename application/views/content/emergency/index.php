<div class="content">
    <div class="main">
        <div class="page-header">
            <h4 class="page-title">Kehadiran Darurat</h4>
            <div class="breadcrumb">
                <span class="me-1 text-gray"><i class="feather icon-home"></i></span>
                <div class="breadcrumb-item"><a href="index.html"> Home </a></div>
                <div class="breadcrumb-item"><a href="#"> Kehadiran Darurat </a></div>
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
                <h4>Pilih Event Untuk Input Peserta Kehadiran Darurat</h4>
                <p>Pilih Event Input Nama Peserta untuk melakukan <b>Kehadiran Darurat</b></p>
                <div class="container">
                    <div class="row">
                        <form method="POST" class="row g-3">
                            <div class="col-10">
                                <label for="keyword" class="visually-hidden">Password</label>
                                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Keyword">
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-success mb-3">Search</button>
                            </div>
                        </form>
                    </div>

                    <div class="row justify-content-md-center">
                        <?php foreach ($event as $ev) : ?>
                            <div class="card bg-info text-dark ms-2 me-2 " style="width: 18rem;">
                                <img src="<?= base_url('assets/images/woroworo.png') ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $ev['nama_event'] ?></h5>
                                    <p class="card-text"><?= $ev['deskripsi_event'] ?></p>
                                    <p class="card-text"><?= date("d F Y", strtotime($ev['tanggal_awal'])) ?> - <?= date("d F Y", strtotime($ev['tanggal_akhir'])) ?></p>
                                    <p class="card-text"><?= $ev['waktu_mulai'] ?> - <?= $ev['waktu_berakhir'] ?></p>
                                    <p class="card-text"><?= $ev['penyelenggara'] ?></p>
                                    <a href="<?= base_url('scan/emergencydetail/')  . $ev['id'] ?>" class="btn btn-warning">SCAN KEHADIRAN</a>
                                </div>
                            </div>
                        <?php endforeach ?>



                        <div class="mt-4">

                        </div>
                        <div class="code-example">

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