<form action="" method="POST">
  <table class="table table-striped">
    <tr>
      <th>Username</th>
      <td><input type="text" name="username" class="form-control" value="<?= $username ?>" required=""></td>
    </tr>
    <tr>
      <th>Password</th>
      <td><input type="password" name="password" class="form-control" value="" placeholder="password baru" required=""></td>
    </tr>
    <tr>
      <th>Nama</th>
      <td><input type="text" name="nama" class="form-control" value="<?= $nama ?>" required=""></td>
    </tr>
    <tr>
      <th>Hak-Akses</th>
      <td>
        <select class="form-control" name="level" required="">
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <a href="<?php echo base_url('admin/user_admin_edit'); ?>" class="btn btn-info">Simpan</a>
        <a href="<?php echo base_url('admin'); ?>" class="btn btn-danger">Batal</a>
      </td>
    </tr>
  </table>
</form>