<a href="<?= base_url('admin/pegawai_tambah/') ?>" class="btn btn-primary">Tambah</a>
<br /><br /><br />
<?= $this->session->flashdata('pesan') ?>
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
      <th>TOEFL/IELTS</th>
      <th>No Telepon</th>
      <th>Aksi</th>
    </tr>
    </thead>
     <tbody>
     <?php $no=1; foreach($data as $admin): 
      $tgl=$admin['tgl_lahir'];
      ?>
     <tr>
     <td><?= $no ?></td>
     <td><?= $admin['nama'] ?></td> 
     <td><?php if($admin['jenis_kelamin'] == "L"){ echo "Laki-Laki";}else{ echo "Perempuan";} ?></td>
     <td><?= $admin['alamat'] ?></td>
     <td><?= date("d-m-Y", strtotime($tgl)) ?></td>
     <td><?php if($admin['last_education'] == "SMA"){ echo "SMA";}else if($admin['last_education'] == "S1"){ echo "S1";}else{ echo "S2";} ?></td>
     <td><?php if($admin['next_education'] == "S1"){ echo "S1";}else if($admin['next_education'] == "S2"){ echo "S2";}else{ echo "S3";} ?></td>
     <td><?= $admin['university'] ?></td>
     <td><?= $admin['nilai'] ?></td>
     <td><?= $admin['toefl'] ?></td>
     <td><?= $admin['no_tlp'] ?></td>
     <td><a href="<?= base_url('admin/pegawai_edit/'.$admin['id_pegawai']) ?>" class="btn btn-info">Edit</a> <a href="<?= base_url('admin/pegawai_hapus/'.$admin['id_pegawai']) ?>" class="btn btn-danger">Hapus</a></td> 
     </tr>
     <?php $no++; endforeach; ?>
     </tbody>
   </table>

 
 