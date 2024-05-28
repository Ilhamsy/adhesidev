<table class="table table-striped">
<form action="" method="POST" enctype="multipart/form-data"> 
 
<tr>
	<th>Nama</th>
	<td>
	<input type="text" name="nama" value="<?= $nama ?>" class="form-control" required="">
	</td>
</tr>
<tr>
	<th>Jenis Kelamin</th>
	<td>
		<select class="form-control" name="jenis_kelamin" required="">
	                          <option value="L">Laki-Laki</option>
	                          <option value="P">Perempuan</option>
        </select>
	</td>
</tr>
<tr>
	<th>Alamat</th>
	<td>
		<input type="text" name="alamat" value="<?= $alamat ?>" class="form-control" required="">
	</td>
</tr>
<tr>
	<th>Tanggal Lahir</th>
	<td>
		<input type="date" name="tgl_lahir" value="<?= $tgl_lahir ?>" class="form-control" required="">
	</td>
</tr>


<tr>
	<th>Last Education</th>
	<td>
		<select class="form-control" name="last_education" required="">
	                          <option value="SMA">SMA</option>
	                          <option value="S1">S1</option>
							  <option value="S2">S2</option>
        </select>
	</td>
</tr>
<tr>
	<th>Next Education</th>
	<td>
		<select class="form-control" name="next_education" required="">
	                          <option value="S1">S1</option>
	                          <option value="S2">S2</option>
							  <option value="S3">S3</option>
        </select>
	</td>
</tr>

<tr>
	<th>University</th>
	<td>
		<input type="text" name="university" value="<?= $university ?>" class="form-control" required="">
	</td>
</tr>
<tr>
	<th>GPA/Nilai</th>
	<td>
		<input type="text" name="nilai" value="<?= $nilai ?>" class="form-control" required="">
	</td>
</tr>
<tr>
	<th>TOEFL/IELTS</th>
	<td>
		<input type="text" name="toefl" value="<?= $toefl ?>" class="form-control" required="">
	</td>
</tr>
<tr>
	<th>Phone Number</th>
	<td>
		<input type="text" name="no_tlp" value="<?= $no_tlp ?>" class="form-control" required="">
	</td>
</tr>
<?php 
$url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : ''; 
?>
<tr>
	<td></td><td>
		<input type="submit" name="kirim" value="Submit" class="btn btn-primary"> &nbsp;&nbsp;<a href="<?=$url?>" class="btn btn-danger">Batal</a>
	</td>
</tr>
</table>
<?php 
	if($aksi == "edit"):
?>	
<?php 
	endif; 
?>