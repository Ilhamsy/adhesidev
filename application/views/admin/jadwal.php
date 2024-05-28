<a href="<?= base_url('admin/jadwal_tambah/') ?>" class="btn btn-primary">Tambah</a>
<br /><br /><br />
<?= $this->session->flashdata('pesan') ?>
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Mentor</th>
                  <th>Student</th>
                  <th>Jadwal</th>
                  <th>Course Taken</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                 <tbody>
                 <?php $no=1; foreach($data as $admin):
                $tgl=$admin['jam'];  
                ?>
                 <tr>
                 <script>
                  $(document).ready(function()
                  {
                    $("#button").click(function()
                    {
                      $("#isi1").toggle();
                      $("#isi2").toggle();
                      $("#isi3").toggle();
                      $("#isi4").toggle();
                      //toggle() == untuk mengembalikan keadaan (nampilin apa sembunyiin)
                    });
                  });
                  </script>
                
                 <td><?= $no ?></td>
                 <!-- <td><button id='button'><?= $admin['nama_jabatan'] ?></button> </td> -->
                 <td><div><a href="<?= base_url('admin/jadwal_mentor/'.$admin['id_jabatan']) ?>" class="btn btn-primary"><?= $admin['nama_jabatan'] ?></a></div></td>
                 <td><div id='isi1'><?= $admin['nama'] ?></div></td>
                 <td><div id='isi2'><?= date("d-m-Y, h:i A", strtotime($tgl)) ?></div></td>
                 <td><div id='isi3'><?= $admin['bidang'] ?></div></td>

                 <td><div id='isi4'><a href="<?= base_url('admin/jadwal_edit/'.$admin['id_jadwal']) ?>" class="btn btn-info">Edit</a> <a href="<?= base_url('admin/jadwal_hapus/'.$admin['id_jadwal']) ?>" class="btn btn-danger">Hapus</a></div></td> 
                 </tr>
                  <?php $no++; endforeach; ?>
                 </tbody>
              </table>
              <script>
