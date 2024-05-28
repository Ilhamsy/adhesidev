<a href="<?php echo base_url('admin/jadwal_tambah/');?>" class="btn btn-primary">Tambah</a>
<br /><br /><br />
<?php echo $this->session->flashdata('pesan');?>
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
        <?php $no = 1; foreach ($data as $admin) :?>
            <?php $tgl = $admin['jam'];?>
            <tr>
                <td><?php echo $no;?></td>
                <td>
                    <div>
                        <a href="<?php echo base_url('admin/jadwal_mentor/'. $admin['id_jabatan']);?>" class="btn btn-primary">
                            <?php echo $admin['nama_jabatan'];?>
                        </a>
                    </div>
                </td>
                <td>
                    <div id='isi1'>
                        <?php echo $admin['nama'];?>
                    </div>
                </td>
                <td>
                    <div id='isi2'>
                        <?php echo date("d-m-Y, h:i A", strtotime($tgl));?>
                    </div>
                </td>
                <td>
                    <div id='isi3'>
                        <?php echo $admin['bidang'];?>
                    </div>
                </td>

                <td>
                    <div id='isi4'>
                        <a href="<?php echo base_url('admin/jadwal_edit/'. $admin['id_jadwal']);?>" class="btn btn-info">Edit</a>
                        <a href="<?php echo base_url('admin/jadwal_hapus/'. $admin['id_jadwal']);?>" class="btn btn-danger">Hapus</a>
                    </div>
                </td>
            </tr>
            <?php $no++; endforeach;?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $("#button").click(function() {
            $("#isi1").toggle();
            $("#isi2").toggle();
            $("#isi3").toggle();
            $("#isi4").toggle();
            //toggle() == untuk mengembalikan keadaan (nampilin apa sembunyiin)
        });
    });
</script>