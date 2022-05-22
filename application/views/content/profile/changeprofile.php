<div class="content">
    <div class="main">
        <div class="page-header">
            <h4 class="page-title">Profile</h4>
            <div class="breadcrumb">
                <span class="me-1 text-gray"><i class="feather icon-home"></i></span>
                <div class="breadcrumb-item"><a href="index.html"> Home </a></div>
                <div class="breadcrumb-item"><a href="javascript:void(0)"> Profile </a></div>
                <div class="breadcrumb-item"><a href="#"> Change Profile </a></div>
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
                <h4>Profile</h4>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <?= form_open_multipart('profile/index') ?>
                            <!-- <form method="POST"> -->
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?= $this->session->userdata('user_id') ?>" placeholder="Andre">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" readonly class="form-control" name="username" id="username" value="<?= $user['username'] ?>" placeholder="Andre">
                                <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="<?= $user['email'] ?>" placeholder="Andre">
                                <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $user['nama'] ?>" placeholder="Andre">
                                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-3">
                                <label for="asal" class="form-label">Asal Kota</label>
                                <input type="text" class="form-control" name="asal" id="asal" value="<?= $user['asal'] ?>" placeholder="Sidoarjo">
                                <?= form_error('asal', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-3">
                                <label for="no_tlp" class="form-label">No Tlp</label>
                                <input type="text" class="form-control" name="no_tlp" id="no_tlp" value="<?= $user['no_tlp'] ?>" placeholder="6281246549498">
                                <?= form_error('no_tlp', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Avatar</label>
                                <input type="file" class="dropify" data-height="150" data-allowed-file-extensions="jpeg jpg png" id="image" name="image"></input>
                                <small class="text-muted">File Harus Berupa <strong>JPEG, JPG, dan PNG. MAX 1Mb</strong></small>
                                <?= form_error('image', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Avatar Sekarang</label>
                                <?php if ($user['image'] == NULL) : ?>
                                    <img src="<?= base_url('assets/images/smile.png') ?>" width="255px" class="img-fluid rounded float-start" alt="" srcset="">
                                <?php else : ?>
                                    <img src="<?= base_url('assets/images/avatars/') . $user['image'] ?>" class="img-fluid rounded float-start" alt="" srcset="">
                                <?php endif ?>
                            </div>
                            <br>
                            <br>
                            <br>

                            <div class="mt-5 mb-3">
                                <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary me-2">Batal</a>
                                <button type="submit" class="btn btn-primary">Ubah Profile</button>
                            </div>
                            <?= form_close() ?>
                            <!-- </form> -->
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