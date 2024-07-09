<a href="<?php echo base_url('kursus/kursus_tambah/'); ?>" class="btn btn-primary">Tambah</a>
<br /><br /><br />
<?php echo $this->session->flashdata('pesan'); ?>
<table class="table table-bordered table-hover table-responsive-sm">
    <thead>
        <tr>
            <th>No</th>
            <th>Kursus</th>
            <th>Kapasitas Kelas</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($data as $admin) : ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $admin['nama_kursus']; ?></td>
                <td><?php echo $admin['kapasitas']; ?></td>
                <td><?php echo $admin['waktu']; ?></td>
                <td>
                    <a href="<?php echo base_url('kursus/kursus_edit/' . $admin['id_kursus']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo base_url('kursus/kursus_hapus/' . $admin['id_kursus']); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php $no++;
        endforeach; ?>
    </tbody>
</table>