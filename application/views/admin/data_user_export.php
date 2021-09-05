<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data_user.xls");
?>
<style> 
    td {
        text-align: center;
        mso-number-format:\@;
    }
</style>
<table border="1">
    <thead>
        <tr>
            <th class="text-left" style="background-color:#808080;">No</th>
            <th style="background-color:#808080;">Jenjang</th>
            <th style="background-color:#808080;">Nama Madrasah</th>
            <th style="background-color:#808080;">Kecamatan</th>
            <th style="background-color:#808080;">Status</th>
            <th style="background-color:#808080;">NSM</th>
            <th style="background-color:#808080;">NPSN</th>
            <th style="background-color:#808080;">Password</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $no=0;
                foreach ($users as $row) : 
            $no++;
        ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row->jenjang ?></td>
                <td><?= $row->nama_madrasah ?></td>
                <td><?= $row->code_kec ?></td>
                <td><?= $row->status ?></td>
                <td><?= $row->nsm ?></td>
                <td><?= $row->npsn ?></td>
                <td><?= $row->password ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>