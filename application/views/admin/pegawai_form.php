<table class="table table-striped">
    <form action="" method="POST" enctype="multipart/form-data">
        <tr>
            <th>Nama</th>
            <td>
                <input type="text" name="nama" value="<?php echo $nama?>" class="form-control" required>
            </td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>
                <select class="form-control" name="jenis_kelamin" required>
                    <option value="L" <?php echo ($jenis_kelamin == 'L')? 'elected' : '';?>>Laki-Laki</option>
                    <option value="P" <?php echo ($jenis_kelamin == 'P')? 'elected' : '';?>>Perempuan</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>
                <input type="text" name="alamat" value="<?php echo $alamat?>" class="form-control" required>
            </td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>
                <input type="date" name="tgl_lahir" value="<?php echo $tgl_lahir?>" class="form-control" required>
            </td>
        </tr>
        <tr>
            <th>Last Education</th>
            <td>
                <select class="form-control" name="last_education" required>
                    <option value="SMA" <?php echo ($last_education == 'SMA')? 'elected' : '';?>>SMA</option>
                    <option value="S1" <?php echo ($last_education == 'S1')? 'elected' : '';?>>S1</option>
                    <option value="S2" <?php echo ($last_education == 'S2')? 'elected' : '';?>>S2</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>Next Education</th>
            <td>
                <select class="form-control" name="next_education" required>
                    <option value="S1" <?php echo ($next_education == 'S1')? 'elected' : '';?>>S1</option>
                    <option value="S2" <?php echo ($next_education == 'S2')? 'elected' : '';?>>S2</option>
                    <option value="S3" <?php echo ($next_education == 'S3')? 'elected' : '';?>>S3</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>University</th>
            <td>
                <input type="text" name="university" value="<?php echo $university?>" class="form-control" required>
            </td>
        </tr>
        <tr>
            <th>GPA/Nilai</th>
            <td>
                <input type="text" name="nilai" value="<?php echo $nilai?>" class="form-control" required>
            </td>
        </tr>
        <tr>
            <th>TOEFL/IELTS</th>
            <td>
                <input type="text" name="toefl" value="<?php echo $toefl?>" class="form-control" required>
            </td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td>
                <input type="text" name="no_tlp" value="<?php echo $no_tlp?>" class="form-control" required>
            </td>
        </tr>
        <?php
        $url = isset($_SERVER['HTTP_REFERER'])? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
       ?>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="kirim" value="Submit" class="btn btn-primary">
                &nbsp;&nbsp;<a href="<?php echo $url?>" class="btn btn-danger">Batal</a>
            </td>
        </tr>
    </form>
</table>

<?php
if ($aksi == "edit") {
    // edit action code here
}
?>