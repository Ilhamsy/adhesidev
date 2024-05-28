<a href="<?= base_url('admin/jabatan_tambah/') ?>" class="btn btn-primary">Tambah</a>
<br /><br /><br />
<?= $this->session->flashdata('pesan') ?>
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Alamat Domisili</th>
                  <th>Jumlah Student</th>
                  <th>No Telepon</th>
                  <th>Bidang Ahli</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                 <tbody>
                 <?php $no=1; foreach($data as $admin): ?>
                 <tr>
                 <td><?= $no ?></td>
                 <td><?= $admin['nama_jabatan'] ?></td> 
                 <td><?= $admin['Email'] ?></td>
                 <td><?= $admin['Domisili'] ?></td>
                 <td><?= $admin['Jumlah_Student'] ?></td>
                 <td><?= $admin['No_Tlp'] ?></td>
                 <td><?= $admin['Bidang'] ?></td>
                 <td><?php if($admin['Status'] == "A"){ echo "Active";}else{ echo "Non Active";} ?></td>

                
                 <td><a href="<?= base_url('admin/jabatan_edit/'.$admin['id_jabatan']) ?>" class="btn btn-info">Edit</a> <a href="<?= base_url('admin/jabatan_hapus/'.$admin['id_jabatan']) ?>" class="btn btn-danger">Hapus</a></td> 
                 </tr>

                 <?php $no++; endforeach; ?>
                 
                 </tbody>
              </table>


 
 
 