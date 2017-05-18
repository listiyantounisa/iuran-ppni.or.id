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
        <h2>Peserta List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Peserta</th>
		<th>No Ktp</th>
		<th>No Anggota</th>
		<th>Tanggal Terdaftar</th>
		<th>Komisariat</th>
		
            </tr><?php
            foreach ($peserta_data as $peserta)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $peserta->nama_peserta ?></td>
		      <td><?php echo $peserta->no_ktp ?></td>
		      <td><?php echo $peserta->no_anggota ?></td>
		      <td><?php echo $peserta->tanggal_terdaftar ?></td>
		      <td><?php echo $peserta->komisariat ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>