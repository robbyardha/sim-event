<div class="content">
    <div class="main">
        <div class="page-header">
            <h4 class="page-title">Add Users</h4>
            <div class="breadcrumb">
                <span class="me-1 text-gray"><i class="feather icon-home"></i></span>
                <div class="breadcrumb-item"><a href="index.html"> Home </a></div>
                <div class="breadcrumb-item"><a href="javascript:void(0)"> Master </a></div>
                <div class="breadcrumb-item"><a href="javascript:void(0)"> Users </a></div>
                <div class="breadcrumb-item"><a href="#"> Ubah Password </a></div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4>Users</h4>

                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST">
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" name="id" value="<?= $usersid['id'] ?>" id="id">
                                    <label for="newpassword" class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="*******">
                                    <?= form_error('newpassword', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <a href="<?= base_url('users') ?>" class="btn btn-secondary me-2">Batal</a>
                                <button type="submit" class="btn btn-primary">Ubah Password</button>
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