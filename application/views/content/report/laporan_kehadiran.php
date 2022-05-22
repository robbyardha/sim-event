<h2>
    <center>Laporan Kehadiran Event <?= $eventid['nama_event'] ?></center>

</h2>
<hr />
<div class="table-responsive">

    <br>
    <br>
    <table class="table table-bordered mb-0" width="100%" style="text-align:center;border:1px;border-style:solid;" border="1px">
        <tr>
            <th style="width: 3%;">No</th>
            <th style="width: 25%;">Nama Event</th>
            <th style="width: 25%;">Nama Peserta</th>
            <th style="width: 25%;">Asal</th>
            <th style="width: 25%;">No Tlp</th>
            <th style="width: 25%;">Waktu Kehadiran</th>
            <th style="width: 25%;">Status</th>

        </tr>
        <?php $n = 1 ?>
        <?php foreach ($joinhadirevent as $je) : ?>
            <tr>
                <td><?= $n++ ?></td>
                <td><?= $je['nama_event'] ?> </td>
                <td><?= $je['nama'] ?> </td>
                <td><?= $je['asal'] ?> </td>
                <td><?= $je['no_tlp'] ?> </td>
                <td><?= $je['waktu_kehadiran'] ?> </td>
                <td><?= $je['status_kehadiran'] ?> </td>

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