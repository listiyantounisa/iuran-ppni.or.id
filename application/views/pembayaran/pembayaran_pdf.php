<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Pembayaran List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Peserta</th>
		<th>Tahun Pembayaran</th>
		<th>Iuran Anggota</th>
		<th>Uang Pangkal</th>
		<th>Cetak Kta</th>
		<th>Icn</th>
		<th>Rekomendasi</th>
		<th>Kontribusi Gedung</th>
		<th>Status Transfer Dpw</th>
		<th>Status Transfer Dpp</th>
		
            </tr><?php
            foreach ($pembayaran_data as $pembayaran)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pembayaran->id_peserta ?></td>
		      <td><?php echo $pembayaran->tahun_pembayaran ?></td>
		      <td><?php echo $pembayaran->iuran_anggota ?></td>
		      <td><?php echo $pembayaran->uang_pangkal ?></td>
		      <td><?php echo $pembayaran->cetak_kta ?></td>
		      <td><?php echo $pembayaran->icn ?></td>
		      <td><?php echo $pembayaran->rekomendasi ?></td>
		      <td><?php echo $pembayaran->kontribusi_gedung ?></td>
		      <td><?php echo $pembayaran->status_transfer_dpw ?></td>
		      <td><?php echo $pembayaran->status_transfer_dpp ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>