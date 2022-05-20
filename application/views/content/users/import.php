<div class="content">
    <div class="main">
        <div class="page-header">
            <h4 class="page-title">Users</h4>
            <div class="breadcrumb">
                <span class="me-1 text-gray"><i class="feather icon-home"></i></span>
                <div class="breadcrumb-item"><a href="index.html"> Home </a></div>
                <div class="breadcrumb-item"><a href="javascript:void(0)"> Master </a></div>
                <div class="breadcrumb-item"><a href="#"> Users </a></div>
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
                <h4>Import Data Master Users</h4>
                <div class="row">
                    <div class="col">
                        <p>Masukkan data berupa file excel sesuai dengan format</p>
                        <a href="<?= base_url('users/downloadFormat') ?>" class="btn btn-success btn-md me-1"><i class="fa fa-file-excel-o pr-1"></i>Download File Format Excel</a>
                    </div>
                </div>
                <div class="mt-4">
                    <?php echo form_open_multipart('users/import', array('name' => 'spreadsheet')); ?>
                    <br>
                    <input type="file" class="dropify" data-height="300" data-allowed-file-extensions="xls xlsx csv" name="upload_file"></input>
                    <br>
                    <div class="pt-1 d-flex justify-content-end">
                        <a href="<?= base_url('users') ?>" class="btn btn-secondary me-2">Batal</a>
                        <input type="submit" class="btn btn-success btn-raised" name="import"></input>
                    </div>
                    <?php echo form_close(); ?>
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