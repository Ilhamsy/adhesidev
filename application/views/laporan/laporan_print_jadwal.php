<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Jadwal</title>
</head>

<body>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tentor</th>
                <th>Siswa</th>
                <th>Jadwal</th>
                <th>Kursus Yang Diambil</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($jadwal as $admin) : ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td>
                        <div>
                            <?php echo $admin['nama_tentor']; ?>
                        </div>
                    </td>
                    <td>
                        <div>
                            <?php echo $admin['nama']; ?>
                        </div>
                    </td>
                    <td>
                        <div>
                            <?php echo $admin['waktu']; ?>
                        </div>
                    </td>
                    <td>
                        <div>
                            <?php echo $admin['nama_kursus']; ?>
                        </div>
                    </td>
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