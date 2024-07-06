<h4 style="text-align: center;">Daftar Siswa</h4>
<table style="border:1px solid #000; padding:6px;">
    <tr style="background-color: aqua; text-align:center">
        <th style="border:1px solid #000; padding:6px; width:6%;">No.</th>
        <th style="border:1px solid #000; padding:6px;">Nama</th>
        <th style="border:1px solid #000; padding:6px;">Jenis Kelamin</th>
        <th style="border:1px solid #000; padding:6px;">Tgl Lahir</th>
        <th style="border:1px solid #000; padding:6px;">Next Education</th>
        <th style="border:1px solid #000; padding:6px;">Universitas</th>
        <th style="border:1px solid #000; padding:6px; width:20%">No. Telepon</th>
    </tr>
    <?php $i = 1;
    foreach ($siswa as $s) : ?>
        <tr>
            <td style="border:1px solid #000; padding:6px;"><?php echo $i; ?></td>
            <td style="border:1px solid #000; padding:6px;"><?php echo $s['nama']; ?></td>
            <td style="border:1px solid #000; padding:6px;"><?php echo $s['jenis_kelamin']; ?></td>
            <td style="border:1px solid #000; padding:6px;"><?php echo $s['tgl_lahir']; ?></td>
            <td style="border:1px solid #000; padding:6px;"><?php echo $s['next_education']; ?></td>
            <td style="border:1px solid #000; padding:6px;"><?php echo $s['university']; ?></td>
            <td style="border:1px solid #000; padding:6px;"><?php echo $s['telepon']; ?></td>
        </tr>
    <?php $i++;
    endforeach; ?>
</table>