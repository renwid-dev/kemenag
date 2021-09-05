<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=kelembagaan.xls");
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
            <th style="background-color:#808080;">Alamat</th>
            <th style="background-color:#808080;">Nomor Siop</th>
            <th style="background-color:#808080;">Tanggal Siop</th>
            <th style="background-color:#808080;">Masa Berlaku Siop</th>
            <th style="background-color:#808080;">Akreditasi</th>
            <th style="background-color:#808080;">Nilai Akreditasi</th>
            <th style="background-color:#808080;">Nomor Akreditasi</th>
            <th style="background-color:#808080;">Masa Berlaku Akreditasi</th>
            <th style="background-color:#808080;">Nama Kamad</th>
            <th style="background-color:#808080;">NIP Kamad</th>
            <th style="background-color:#808080;">No. HP Kamad</th>
            <th style="background-color:#808080;">Nama OP1</th>
            <th style="background-color:#808080;">NIP OP1</th>
            <th style="background-color:#808080;">No. HP OP1</th>
            <th style="background-color:#808080;">Nama OP2</th>
            <th style="background-color:#808080;">NIP OP2</th>
            <th style="background-color:#808080;">No. HP OP2</th>
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
                <td><?= $row->kecamatan ?></td>
                <td><?= $row->status ?></td>
                <td><?= $row->nsm ?></td>
                <td><?= $row->npsn ?></td>
                <td><?= $row->alamat ?></td>
                <td><?= $row->nomor_siop ?></td>
                <td><?= $row->tanggal_siop ?></td>
                <td><?= $row->type_masa_siop == 'date' ? $row->tgl_masa_siop : $row->type_masa_siop  ?></td>
                <td><?= $row->akreditasi ?></td>
                <td><?= $row->nilai_akreditasi ?></td>
                <td><?= $row->nomor_akreditasi ?></td>
                <td><?= $row->masa_akreditasi ?></td>
                <td><?= $row->nama_kamad ?></td>
                <td><?= $row->nip_kamad ?></td>
                <td><?= $row->no_hp_kamad ?></td>
                <td><?= $row->nama_op1 ?></td>
                <td><?= $row->nip_op1 ?></td>
                <td><?= $row->no_hp_op1 ?></td>
                <td><?= $row->nama_op2 ?></td>
                <td><?= $row->nip_op2 ?></td>
                <td><?= $row->no_hp_op2 ?></td>
                <td><?= $row->password ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>