<table class="table table-responsive">
    <form action="" method="POST">
        <tr>
            <th>Nama Tentor</th>
            <td>
                <input type="text" name="nama_tentor" class="form-control" value="<?php echo $nama_tentor; ?>" required>
            </td>
        </tr>
        <tr>
            <th>Email Tentor</th>
            <td>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
            </td>
        </tr>
        <tr>
            <th>Alamat Tentor</th>
            <td>
                <input type="text" name="alamat" class="form-control" value="<?php echo $alamat; ?>" required>
            </td>
        </tr>
        <tr>
            <th>Jumlah Siswa</th>
            <td>
                <input type="number" name="jml_siswa" class="form-control" value="<?php echo $jml_siswa; ?>" required>
            </td>
        </tr>
        <tr>
            <th>No Telepon</th>
            <td>
                <input type="tel" name="telepon" class="form-control" value="<?php echo $telepon; ?>" required>
            </td>
        </tr>
        <tr>
            <th>Bidang Ahli</th>
            <td>
                <input type="text" name="bidang" class="form-control" value="<?php echo $bidang; ?>" required>
            </td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <select class="form-control" name="status" required>
                    <option value=<?php echo ($status == 1) ? '1' : '0'; ?> <?php echo ($status == 1) ? 'selected' : ''; ?>>Active</option>
                    <option value=<?php echo ($status == 0) ? '0' : '1'; ?> <?php echo ($status == 0) ? 'selected' : ''; ?>>Non Active</option>
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