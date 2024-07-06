<h4 style="text-align: center;">Daftar Kursus</h4>
<table style="border:1px solid #000; padding:6px;">
    <tr style="background-color: aqua; text-align:center">
        <th style="border:1px solid #000; padding:6px;">No.</th>
        <th style="border:1px solid #000; padding:6px;">Nama Kursus</th>
        <th style="border:1px solid #000; padding:6px;">Kapasitas</th>
        <th style="border:1px solid #000; padding:6px;">Waktu</th>
    </tr>
    <?php $i = 1;
    foreach ($kursus as $s) : ?>
        <tr>
            <td style="border:1px solid #000; padding:6px;"><?php echo $i; ?></td>
            <td style="border:1px solid #000; padding:6px;"><?php echo $s['nama_kursus']; ?></td>
            <td style="border:1px solid #000; padding:6px;"><?php echo $s['kapasitas']; ?></td>
            <td style="border:1px solid #000; padding:6px;"><?php echo $s['waktu']; ?></td>
        </tr>
    <?php $i++;
    endforeach; ?>
</table>