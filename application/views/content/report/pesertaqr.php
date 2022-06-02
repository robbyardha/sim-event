<h2>
    <center>Data QRCode Peserta</center>

</h2>
<hr />
<div class="table-responsive">

    <br>
    <br>
    <table class="table table-bordered mb-0" width="100%" style="text-align:center;border:1px;border-style:solid;" border="1px">
        <tr>
            <th style="width: 3%;">No</th>
            <th style="width: 5%;">Nama Event</th>
            <th style="width: 5%;">Nama Peserta</th>
            <th style="width: 5%;">Asal</th>
            <th style="width: 5%;">No Tlp</th>
            <th style="width: 10%;">QR</th>

        </tr>
        <?php $n = 1 ?>
        <?php foreach ($joinwithevent as $je) : ?>
            <tr>
                <td><?= $n++ ?></td>
                <td><?= $je['nama_event'] ?> </td>
                <td><?= $je['nama'] ?> </td>
                <td><?= $je['asal'] ?> </td>
                <td><?= $je['no_tlp'] ?> </td>
                <td>
                    <img width="225" src="<?= base_url('/assets/dataqr/') . $je['qr_img'] ?>" alt="" srcset="">

                </td>

            </tr>
        <?php endforeach ?>
    </table>
</div>



<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-radius: 1px;
        border-width: 1px;
        border-style: solid;
        border-collapse: collapse;
    }
</style>