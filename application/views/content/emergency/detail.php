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
                <?= $this->session->flashdata('notifdanger') ?>
                <?php if ($this->session->flashdata('message')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Telah berhasil <strong><?= $this->session->flashdata('message') ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <div class="container">
                    <h4>Data Kehadiran Darurat <?= $eventid['nama_event'] ?></h4>
                    <div class="row">
                    </div>
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST">
                                    <div class="mb-3">
                                        <label for="event_id" class="form-label">Pilih Event</label>

                                        <select class="form-select select2" name="event_id" id="event_id">
                                            <?php foreach ($event as $ev) : ?>
                                                <?php if ($this->uri->segment(3) == $ev['id']) : ?>
                                                    <option value="<?= $ev['id'] ?>" selected><?= $ev['nama_event'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $ev['id'] ?>"><?= $ev['nama_event'] ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                        <?= form_error('event_id', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pilihpeserta" class="form-label">Pilih Peserta</label>
                                        <select class="form-select select2" name="pilihpeserta" id="pilihpeserta">
                                            <option value="">-- PILIH PESERTA --</option>
                                            <?php foreach ($peserta as $us) : ?>
                                                <option value="<?= $us['uuid'] ?>"><?= $us['nama'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <?= form_error('pilihpeserta', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <div class="mb-3">
                                        <label for="uuid" class="form-label">User Id</label>
                                        <input type="text" readonly class="form-control" name="uuid" id="uuid" value="">
                                        <?= form_error('uuid', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" readonly class="form-control" name="nama" id="nama" value="">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <script>
                                        // function getUserID() {
                                        //     var e = document.getElementById("nama");
                                        //     e.addEventListener("change", function() {
                                        //         var val = 7000000;
                                        //         document.getElementById("users_id").value = val;
                                        //     })
                                        // };

                                        // function getIDUser() {
                                        //     var id = $("#nama").val();
                                        //     $.ajax({
                                        //         url: 'auto_proses.php',
                                        //         data: "id=" + id,
                                        //     }).success(function(data) {
                                        //         var json = data,
                                        //             obj = JSON.parse(json);
                                        //         $('#nama').val(obj.nama);
                                        //         $('#email').val(obj.email);

                                        //     })
                                        // }

                                        // ISOKKK

                                        // $(document).ready(function() {
                                        //     $('#nama').change(function() {
                                        //         var id = $("#nama").val();
                                        //         $.ajax({
                                        //             url: '<?= base_url() ?>index.php/Peserta/getUsersDetail',
                                        //             type: 'get',
                                        //             data: {
                                        //                 "id": id,
                                        //                 "nama": id,
                                        //             },
                                        //             success: function(result) {
                                        //                 $("#users_id").val(result);
                                        //                 $("#namanew").val(result);

                                        //             }
                                        //         });
                                        //     });
                                        // })

                                        // END
                                        $(document).ready(function() {
                                            $('#pilihpeserta').change(function() {
                                                var id = $("#pilihpeserta").val();
                                                // var uuid = $("#pilihpeserta").val();
                                                var nama = $("#pilihpeserta option:selected").text();
                                                $.ajax({
                                                    url: '<?= base_url() ?>index.php/Scan/getPesertaDetail',
                                                    type: 'get',
                                                    data: {
                                                        "id": id,
                                                        // "uuid": uuid,
                                                        "nama": nama,
                                                    },
                                                    dataType: "json",
                                                    // success: function(result) {
                                                    //     $("#users_id").val(result);
                                                    //     $("#nama").val(result);

                                                    // }
                                                    success: function(result) {

                                                        // jq_json_obj = new Object(result).toString; //Convert the JSON object to jQuery-compatible
                                                        jq_json_obj = new Object(result); //Convert the JSON object to jQuery-compatible
                                                        // jq_json_obj = $.parseJSON(result); //Convert the JSON object to jQuery-compatible

                                                        if (typeof jq_json_obj == 'object') { //Test if variable is a [JSON] object
                                                            jq_obj = eval(jq_json_obj);

                                                            //Convert back to an array
                                                            jq_array = [];
                                                            for (elem in jq_obj) {
                                                                jq_array.push(jq_obj[elem]);
                                                            }
                                                            console.log(jq_array);
                                                            $("#uuid").val(jq_array[0]);
                                                            $("#nama").val(jq_array[1]);

                                                        } else {
                                                            console.log("Error occurred!");
                                                        }
                                                    }
                                                });
                                            });
                                        })
                                    </script>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select select2" name="status" id="status">
                                            <option value="HADIR" selected>HADIR</option>
                                            <option value="TIDAK HADIR">TIDAK HADIR</option>
                                        </select>
                                        <?= form_error('status', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <a href="<?= base_url('scan') ?>" class="btn btn-secondary me-2">Batal</a>
                                    <button type="submit" class="btn btn-primary">Hadir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="code-example">
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="card">
            <div class="card-body">
                <?php if ($this->session->flashdata('message')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data Telah berhasil <strong><?= $this->session->flashdata('message') ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <div class="container">
                    <h4>Data Kehadiran Darurat <?= $eventid['nama_event'] ?></h4>
                    <div class="row">
                    </div>
                    <div class="mt-4">
                        <table id="data-table" class="table data-table">
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
                                <?php foreach ($joinhadirevent as $pes) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $pes['uuid'] ?></td>
                                        <td><?= $pes['nama'] ?></td>
                                        <td><?= $pes['asal'] ?> </td>
                                        <td><?= $pes['no_tlp'] ?></td>
                                        <td><?= $pes['status_kehadiran'] ?></td>
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
                    </div>
                    <div class="code-example">
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