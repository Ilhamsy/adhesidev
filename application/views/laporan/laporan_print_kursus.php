<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Kursus</title>
</head>

<body>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kursus</th>
                <th>Kapasitas Kelas</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($kursus as $admin) : ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $admin['nama_kursus']; ?></td>
                    <td><?php echo $admin['kapasitas']; ?></td>
                    <td><?php echo $admin['waktu']; ?></td>
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