<h4 style="text-align: center;">Daftar Tentor</h4>
<table style="border:1px solid #000; padding:6px;">
    <tr style="background-color: aqua; text-align:center">
        <th style="border:1px solid #000; padding:6px;">No.</th>
        <th style="border:1px solid #000; padding:6px;">Nama</th>
        <th style="border:1px solid #000; padding:6px;">Email</th>
        <th style="border:1px solid #000; padding:6px;">Telepon</th>
        <th style="border:1px solid #000; padding:6px;">Bidang</th>
        <th style="border:1px solid #000; padding:6px;">Status</th>
    </tr>
    <?php $i = 1;
    foreach ($tentor as $s) : ?>
        <tr>
            <td style="border:1px solid #000; padding:6px;"><?php echo $i; ?></td>
            <td style="border:1px solid #000; padding:6px;"><?php echo $s['nama_tentor']; ?></td>
            <td style="border:1px solid #000; padding:6px;"><?php echo $s['email']; ?></td>
            <td style="border:1px solid #000; padding:6px;"><?php echo $s['telepon']; ?></td>
            <td style="border:1px solid #000; padding:6px;"><?php echo $s['bidang']; ?></td>
            <td style="border:1px solid #000; padding:6px;"><?php echo $s['status']; ?></td>
        </tr>
    <?php $i++;
    endforeach; ?>
</table>