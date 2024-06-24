<a href="<?php echo base_url('jadwal/jadwal_tambah/'); ?>" class="btn btn-primary">Tambah</a>
<br /><br /><br />
<?php echo $this->session->flashdata('pesan'); ?>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Tentor</th>
            <th>Siswa</th>
            <th>Jadwal</th>
            <th>Kursus Yang Diambil</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($data as $admin) : ?>
            <?php $tgl = $admin['jam']; ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td>
                    <div>
                        <a href="<?php echo base_url('jadwal/jadwal_tentor/' . $admin['id_tentor']); ?>" class="btn btn-primary">
                            <?php echo $admin['nama_tentor']; ?>
                        </a>
                    </div>
                </td>
                <td>
                    <div id='isi1'>
                        <?php echo $admin['nama']; ?>
                    </div>
                </td>
                <td>
                    <div id='isi2'>
                        <?php echo date("d-m-Y, h:i A", strtotime($tgl)); ?>
                    </div>
                </td>
                <td>
                    <div id='isi3'>
                        <?php echo $admin['bidang']; ?>
                    </div>
                </td>

                <td>
                    <div id='isi4'>
                        <a href="<?php echo base_url('jadwal/jadwal_edit/' . $admin['id_jadwal']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url('jadwal/jadwal_hapus/' . $admin['id_jadwal']); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
            </tr>
        <?php $no++;
        endforeach; ?>
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