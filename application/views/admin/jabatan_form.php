<table class="table table-reposive">
	<form action="" method="POST">
	<tr><th>Nama Mentor</th><td><input type="text" name="nama_jabatan" class="form-control" value="<?= $nama_jabatan ?>" required=""></td></tr>
	<tr><th>Email Mentor</th><td><input type="text" name="Email" class="form-control" value="<?= $Email ?>" required=""></td></tr>
	<tr><th>Alamat Mentor</th><td><input type="text" name="Domisili" class="form-control" value="<?= $Domisili ?>" required=""></td></tr>
	<tr><th>Jumlah Student</th><td><input type="text" name="Jumlah_Student" class="form-control" value="<?= $Jumlah_Student ?>" required=""></td></tr>
	<tr><th>No Telepon</th><td><input type="text" name="No_Tlp" class="form-control" value="<?= $No_Tlp ?>" required=""></td></tr>
	<tr><th>Bidang Ahli</th><td><input type="text" name="Bidang" class="form-control" value="<?= $Bidang ?>" required=""></td></tr>
	<tr><th>Status</th><td><select class="form-control" name="Status" required="">
	                          <option value="A">Active</option>
	                          <option value="NA">Non Active</option>
                              </select></td></tr>
    <tr><td></td><th><input type="submit" name="kirim" value="Submit" class="btn btn-primary"></th></tr>
    </form>	 
</table>
 
 