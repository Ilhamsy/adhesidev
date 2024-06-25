<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Siswa</title>
</head>

<body>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Last Education</th>
                <th>Next Education</th>
                <th>University</th>
                <th>GPA/Nilai</th>
                <th>TOEFL</th>
                <th>No Telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($siswa as $admin) : ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $admin['nama']; ?></td>
                    <td><?php echo $admin['jenis_kelamin']; ?></td>
                    <td><?php echo $admin['alamat']; ?></td>
                    <td><?php echo $admin['tgl_lahir']; ?></td>
                    <td><?php echo $admin['last_education']; ?></td>
                    <td><?php echo $admin['next_education']; ?></td>
                    <td><?php echo $admin['university']; ?></td>
                    <td><?php echo $admin['nilai']; ?></td>
                    <td><?php echo $admin['toefl']; ?></td>
                    <td><?php echo $admin['telepon']; ?></td>
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