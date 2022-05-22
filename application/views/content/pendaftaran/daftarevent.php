<div class="content">
    <div class="main">
        <div class="page-header">
            <h4 class="page-title">Join Event <?= $eventid['nama_event'] ?></h4>
            <div class="breadcrumb">
                <span class="me-1 text-gray"><i class="feather icon-home"></i></span>
                <div class="breadcrumb-item"><a href="index.html"> Home </a></div>
                <div class="breadcrumb-item"><a href="javascript:void(0)"> Pendaftaran </a></div>
                <div class="breadcrumb-item"><a href="#"> Join Event </a></div>
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
                    <form id="Form" action="<?= base_url('pendaftaran/daftarevent/') . $eventid['id'] ?>" method="post">

                        <input type="hidden" id="event_id" name="event_id" value="<?= $eventid['id'] ?>" class="form-control">
                        <input type="hidden" id="nama_event" name="nama_event" value="<?= $eventid['nama_event'] ?>" class="form-control">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control mb-2" value="<?= $this->session->userdata('nama') ?>">
                        <label for="asal">Asal</label>
                        <input type="text" id="asal" name="asal" class="form-control mb-2" value="<?= $this->session->userdata('asal') ?>">
                        <label for="no_tlp">No Telephone</label>
                        <input type="text" id="no_tlp" name="no_tlp" class="form-control mb-2" value="<?= $this->session->userdata('no_tlp') ?>">

                        <button type="submit" class="btn btn-sm btn-success mt-2" id="daftar" name="daftar">Daftar</button>
                    </form>
                    <!-- <input type="button" class="btn btn-sm btn-success" name="verifikasi" id="verifikasi" value="Verifikasi"> -->
                    <!-- <a href="javascript:;" class="btn btn-sm btn-success" id="verifikasi">Verifikasi Data Peserta!</a> -->
                </div>


                <hr>

            </div>
        </div>
    </div>

</div>