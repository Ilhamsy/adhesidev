<table class="table table-responsive">
    <form action="" method="POST">
        <tr>
            <th>Nama Mentor</th>
            <td>
                <input type="text" name="nama_jabatan" class="form-control" value="<?php echo $nama_jabatan;?>" required>
            </td>
        </tr>
        <tr>
            <th>Email Mentor</th>
            <td>
                <input type="email" name="Email" class="form-control" value="<?php echo $Email;?>" required>
            </td>
        </tr>
        <tr>
            <th>Alamat Mentor</th>
            <td>
                <input type="text" name="Domisili" class="form-control" value="<?php echo $Domisili;?>" required>
            </td>
        </tr>
        <tr>
            <th>Jumlah Student</th>
            <td>
                <input type="number" name="Jumlah_Student" class="form-control" value="<?php echo $Jumlah_Student;?>" required>
            </td>
        </tr>
        <tr>
            <th>No Telepon</th>
            <td>
                <input type="tel" name="No_Tlp" class="form-control" value="<?php echo $No_Tlp;?>" required>
            </td>
        </tr>
        <tr>
            <th>Bidang Ahli</th>
            <td>
                <input type="text" name="Bidang" class="form-control" value="<?php echo $Bidang;?>" required>
            </td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <select class="form-control" name="Status" required>
                    <option value="A" <?php echo ($Status == 'A')? 'elected' : '';?>>Active</option>
                    <option value="NA" <?php echo ($Status == 'NA')? 'elected' : '';?>>Non Active</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <th>
                <input type="submit" name="kirim" value="Submit" class="btn btn-primary">
            </th>
        </tr>
    </form>
</table>