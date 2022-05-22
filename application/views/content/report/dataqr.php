<div class="content">
    <div class="main">
        <div class="page-header">
            <h4 class="page-title">Data QR Code Peserta</h4>
            <div class="breadcrumb">
                <span class="me-1 text-gray"><i class="feather icon-home"></i></span>
                <div class="breadcrumb-item"><a href="index.html"> Home </a></div>
                <div class="breadcrumb-item"><a href="javascript:void(0)"> Report </a></div>
                <div class="breadcrumb-item"><a href="#"> Data QRCode </a></div>
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
                <div class="row">
                    <div class="col">
                        <a class="btn btn-sm btn-danger mb-1 ms-2 me-1 float-end" href="<?= base_url('report/exportpdfqr') ?>">Export PDF</a>
                        <h5>Daftar Data QRCode Peserta</h5>
                    </div>
                </div>
                <div class="mt-4">
                    <table id="data-table" class="table data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Event</th>
                                <th>Nama</th>
                                <th>Asal</th>
                                <th>No Tlp</th>
                                <th>QR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($joinwithevent as $pes) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $pes['nama_event'] ?></td>
                                    <td><?= $pes['nama'] ?></td>
                                    <td><?= $pes['asal'] ?> </td>
                                    <td><?= $pes['no_tlp'] ?></td>
                                    <td>
                                        <img width="55" src="<?= base_url('assets/dataqr/') . $pes['qr_img'] ?>" alt="" srcset="">
                                    </td>
                                </tr>

                                <!-- MODAL HAPUS EVENT -->


                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Event</th>
                                <th>Nama</th>
                                <th>Asal</th>
                                <th>No Tlp</th>
                                <th>QR</th>
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