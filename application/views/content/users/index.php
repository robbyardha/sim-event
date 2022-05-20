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
                <h4>Data Master Users</h4>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-sm btn-primary mb-1 ms-2 me-1 float-end" href="<?= base_url('users/tambah') ?>">Tambah</a>
                        <a class="btn btn-sm btn-success mb-1 ms-2 me-1 float-end" href="<?= base_url('users/import') ?>">Import</a>

                    </div>
                </div>
                <div class="mt-4">
                    <table id="data-table" class="table data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($users as $u) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $u['email'] ?></td>
                                    <td><?= $u['username'] ?></td>
                                    <td><?= $u['nama'] ?></td>
                                    <td>

                                        <a href="<?= base_url('users/edit/') ?><?= $u['id'] ?>" class="btn btn-sm btn-success">Edit</a>
                                        <a href="<?= base_url('users/ubahpassword/') ?><?= $u['id'] ?>" class="btn btn-sm btn-info">Update Password</a>
                                        <a data-bs-toggle="modal" data-bs-target="#hapus_users<?= $u['id']; ?>" class="btn btn-sm btn-danger">Hapus</a>

                                    </td>
                                </tr>

                                <!-- MODAL HAPUS EVENT -->
                                <div class="modal fade" id="hapus_users<?= $u['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Users</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form class="form-horizontal" method="POST" action="<?= base_url('users/hapus')  ?>">
                                                <div class="modal-body">
                                                    <div class="modal-body">
                                                        <p>Anda yakin akan menghapus <b><?= $u['nama']; ?></b></p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="id" value="<?= $u['id']; ?>">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


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