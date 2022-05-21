<div class="content">
    <div class="main">
        <div class="page-header">
            <h4 class="page-title">Scan Kehadiran <?= $eventid['nama_event'] ?></h4>
            <div class="breadcrumb">
                <span class="me-1 text-gray"><i class="feather icon-home"></i></span>
                <div class="breadcrumb-item"><a href="index.html"> Home </a></div>
                <div class="breadcrumb-item"><a href="javascript:void(0)"> Scan </a></div>
                <div class="breadcrumb-item"><a href="#"> Kehadiran </a></div>
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
                <h4 class="text-center">Scan Kehadiran <?= $eventid['nama_event'] ?></h4>
                <div class="row">
                    <video id="preview" width="300" height="300"></video>
                    <form id="Form" action="<?= base_url('scan/update_hadir') ?>" method="post">
                        <label for="">ID QR</label>
                        <input type="text" id="qrcode" name="qrcode" class="form-control">
                        <input type="text" id="event_id" name="event_id" value="<?= $eventid['id'] ?>" class="form-control">

                        <button type="submit" class="btn btn-sm btn-success" id="verifikasi" name="verifikasi">Verifikasi</button>
                    </form>
                    <!-- <input type="button" class="btn btn-sm btn-success" name="verifikasi" id="verifikasi" value="Verifikasi"> -->
                    <!-- <a href="javascript:;" class="btn btn-sm btn-success" id="verifikasi">Verifikasi Data Peserta!</a> -->
                </div>

                <script type="text/javascript">
                    let scanner = new Instascan.Scanner({
                        video: document.getElementById('preview')
                    });
                    scanner.addListener('scan', function(content) {
                        // OTW SIMPAN KE DATABASE
                        // alert(content);
                        // $("#qrcode").val(content);
                        // $("#qrcode").val(content);

                        // REDIRECT


                        // AJAX
                        // $('#verifikasi').on("click", function() {
                        //     $.ajax({
                        //         url: "scan/update_hadir.php",
                        //         method: "POST",
                        //         data: {
                        //             event_id: $("#event_id").val(content),
                        //             peserta_event_id: $("#qrcode").val(content),
                        //         }
                        //     }).done(function(res) {
                        //         console.log(res);
                        //         //"Updated data successfully\n";
                        //         //IF ALL IS OK!!
                        //     });
                        // });


                        // MBUHH
                        // $(document).ready(function() {
                        //     $('#verifikasi').click(function() {
                        //         let qrcode = $("#qrcode").val(content);
                        //         let event_id = $("#event_id").val(content);

                        //         if (qrcode == '' || event_id == '') {
                        //             alert("Please fill all fields.");
                        //             return false;
                        //         } else if (qrcode != '' || event_id != '') {
                        //             jQuery.ajax({
                        //                 type: "POST",
                        //                 url: "<?= base_url('index.php/scan/update_hadir') ?>",
                        //                 dataType: 'html',
                        //                 data: {
                        //                     event_id: $("#event_id").val(content),
                        //                     peserta_event_id: $("#qrcode").val(content),
                        //                 },
                        //                 cache: false,
                        //                 success: function(data) {
                        //                     if (res == 1) {
                        //                         alert('Data saved successfully');
                        //                     } else {
                        //                         alert('Data not saved');
                        //                     }
                        //                 },
                        //                 error: function() {
                        //                     alert('data not saved');
                        //                 }
                        //             }).done(function(res) {
                        //                 console.log(res);
                        //                 //"Updated data successfully\n";
                        //                 //IF ALL IS OK!!
                        //             });
                        //         }

                        //     });
                        // });
                        // END MBUH
                        // -----------------------------------------

                        // -----------------------------------------
                        // ISOK ALHAMDULLILLAH DENGAN BUTTON CLICK
                        // COBA NEH
                        // $('#verifikasi').on('click', function(e) {
                        //     e.preventDefault()
                        //     var qrcode = $('#qrcode').val();
                        //     var event_id = $('#event_id').val();
                        //     $.ajax({
                        //         type: "POST",
                        //         url: "<?php echo base_url() ?>index.php/scan/update_hadir",
                        //         data: {
                        //             qrcode: qrcode,
                        //             event_id: event_id,
                        //         },
                        //         success: function(data) {
                        //             $('#qrcode').val(content);
                        //             $('#event_id').val('');
                        //             alert("Alhamdullillah Data Berhasil Masuk")
                        //             data_customer();
                        //         }
                        //     });
                        //     if (alert('Data Telah diverifikasi!')) {} else window.location.reload();

                        //     // confirmation
                        //     // if (confirm('Data Telah diverifikasi! ')) {
                        //     //     window.location.reload();
                        //     // }
                        // });
                        // END NEH
                        // -----------------------------------------


                        // GASS
                        // let input = document.querySelector('#qrcode');
                        // let input2 = $("#qrcode").val(content);
                        // input2.addEventListener('keyup', checkLength);

                        // function checkLength(e) {
                        //     if (e.target.value.length === 32) {
                        //         // $('#Form').submit();
                        //         var qrcode = $('#qrcode').val();
                        //         var event_id = $('#event_id').val();
                        //         $.ajax({
                        //             type: "POST",
                        //             url: "<?php echo base_url() ?>index.php/scan/update_hadir",
                        //             data: {
                        //                 qrcode: qrcode,
                        //                 event_id: event_id,
                        //             },
                        //             success: function(data) {
                        //                 $('#qrcode').val(content);
                        //                 $('#event_id').val('');
                        //                 // alert("Alhamdullillah Data Berhasil Masuk")
                        //                 data_customer();
                        //             }
                        //         });
                        //         if (alert('Data Telah diverifikasi!')) {} else
                        //             // document.forms["Form"].submit();
                        //             window.location.reload();
                        //     }
                        // }


                        $('#qrcode').val(content).keyup(function() {
                            if ($('#qrcode').val(content).value.length == 32) {
                                $('#Form').submit();
                                window.location.reload();
                            }
                        });



                        // GASS




                    });





                    Instascan.Camera.getCameras().then(function(cameras) {

                        if (cameras.length > 0) {
                            scanner.start(cameras[0]);
                        } else {
                            console.error('No Camera Not Found');
                        }

                    }).catch(function(e) {
                        console.error(e);
                    });
                </script>

                <script type="text/javascript" language="javascript">
                    function redirect() {
                        window.location.href = "<?php echo base_url() ?>index.php/scan/update_hadir";
                    }
                </script>
                <hr>
                <div class="row">
                    <div class="col">
                        <h5>Daftar Peserta Hadir</h5>
                    </div>
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