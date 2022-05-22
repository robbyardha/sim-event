<div class="content">
    <div class="main">
        <div class="page-header">
            <h4 class="page-title">Profile</h4>
            <div class="breadcrumb">
                <span class="me-1 text-gray"><i class="feather icon-home"></i></span>
                <div class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"> Home </a></div>
                <div class="breadcrumb-item"><a href="javascript:void(0)"> Profile </a></div>
                <div class="breadcrumb-item"><a href="#"> Change Password </a></div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <?= $this->session->flashdata('message') ?>
                <h4>Profile Change Password</h4>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST">
                                <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?= $this->session->userdata('user_id') ?>" placeholder="Andre">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" readonly class="form-control" name="username" id="username" value="<?= $user['username'] ?>" placeholder="Andre">
                                    <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="oldpassword" class="form-label">Password Lama</label>
                                    <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="***********">
                                    <?= form_error('oldpassword', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="newpass" class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" name="newpass" id="newpass" placeholder="***********">
                                    <?= form_error('newpass', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="mb-3">
                                    <label for="confirmpass" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="confirmpass" id="confirmpass" placeholder="***********">
                                    <?= form_error('confirmpass', '<small class="text-danger">', '</small>') ?>
                                </div>


                                <div class="mt-5 mb-3">
                                    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary me-2">Batal</a>
                                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                                </div>
                            </form>
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