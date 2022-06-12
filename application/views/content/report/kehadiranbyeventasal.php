<div class="content">
    <div class="main">
        <div class="page-header">
            <h4 class="page-title">Report Kehadiran By Asal Event <?= $eventid['nama_event'] ?></h4>
            <div class="breadcrumb">
                <span class="me-1 text-gray"><i class="feather icon-home"></i></span>
                <div class="breadcrumb-item"><a href="index.html"> Home </a></div>
                <div class="breadcrumb-item"><a href="javascript:void(0)"> Report </a></div>
                <div class="breadcrumb-item"><a href="#"> Kehadiran By Asal Event </a></div>
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
                <div class="row mb-3">
                    <h5>Pilih Data Untuk Memfilter</h5>
                    <form action="" method="get">
                        <label for="selectasal">Pilih Asal</label>
                        <select name="selectasal" id="selectasal" class="form-control select2" id="">
                            <option value="">-- PILIH ASAL --</option>
                            <?php foreach ($getpesertaasal as $asal) : ?>
                                <option value="<?= $asal['asal'] ?>" <?php if ($this->input->get('selectasal') == $asal['asal']) {
                                                                            echo "selected";
                                                                        } ?>><?= $asal['asal'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="mt-1 mb-2">
                            <button class="btn btn-sm btn-primary mt-2 mb-2 float-end" type="submit">Lihat Data</button>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col">
                        <?php
                        $idevent = $eventid['id']
                        ?>
                        <a class="btn btn-sm btn-danger mb-1 ms-2 me-1 float-end" href="<?= base_url("report/exportpdfasalevent/") . $eventid['id'] . "?selectasal=" . $this->input->get('selectasal') ?>">Export PDF</a>
                        <h5>Daftar Peserta Hadir Event <?= $eventid['nama_event'] ?> Asal: <?= $this->input->get('selectasal') ?></h5>
                    </div>
                </div>
                <div class="mt-4">
                    <?php if ($this->input->get('selectasal') == '') : ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Maaf Silahkan pilih asal</strong>
                        </div>
                    <?php else : ?>
                        <table id="data-table" class="table data-table-report">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Peserta</th>
                                    <th>Nama</th>
                                    <th>Asal</th>
                                    <th>No Tlp</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                <?php foreach ($pesertaasal as $pes) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $pes['uuid'] ?></td>
                                        <td><?= $pes['nama'] ?></td>
                                        <td><?= $pes['asal'] ?> </td>
                                        <td><?= $pes['no_tlp'] ?></td>
                                        <td>
                                            <?php $n = "Kosong" ?>
                                            <?php foreach ($showselect as $jh) : ?>
                                                <?php if ($pes['uuid'] === $jh['peserta_event_id']) : ?>
                                                    <?= $jh['status_kehadiran'] ?>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </td>
                                    </tr>

                                    <!-- MODAL HAPUS EVENT -->


                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>ID Peserta</th>
                                    <th>Nama</th>
                                    <th>Asal</th>
                                    <th>No Tlp</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                        </table>
                    <?php endif ?>
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