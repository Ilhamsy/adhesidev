<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Tentor</title>
</head>

<body>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat Domisili</th>
                <th>Jumlah Student</th>
                <th>No Telepon</th>
                <th>Bidang Ahli</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($tentor as $admin) : ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $admin['nama_tentor']; ?></td>
                    <td><?php echo $admin['email']; ?></td>
                    <td><?php echo $admin['alamat']; ?></td>
                    <td><?php echo $admin['jml_siswa']; ?></td>
                    <td><?php echo $admin['telepon']; ?></td>
                    <td><?php echo $admin['bidang']; ?></td>
                    <td><?php if ($admin['status'] == "A") {
                            echo "Active";
                        } else {
                            echo "Non Active";
                        } ?></td>
                </tr>
            <?php $no++;
            endforeach; ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>