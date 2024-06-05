<a href="<?php echo base_url('admin/tentor_tambah/'); ?>" class="btn btn-primary">Tambah</a>
<br /><br /><br />
<?php echo $this->session->flashdata('pesan'); ?>
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
        <?php $no = 1;
        foreach ($data as $admin) : ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $admin['nama']; ?></td>
                <td><?php echo $admin['email']; ?></td>
                <td><?php echo $admin['alamat']; ?></td>
                <td><?php echo $admin['jml_siswa']; ?></td>
                <td><?php echo $admin['telepon']; ?></td>
                <td><?php echo $admin['bidang']; ?></td>
                <td><?php echo ($admin['status'] == "A") ? "Active" : "Non Active"; ?></td>
                <td>
                    <a href="<?php echo base_url('admin/tentor_edit/' . $admin['id_tentor']); ?>" class="btn btn-info">Edit</a>
                    <a href="<?php echo base_url('admin/tentor_hapus/' . $admin['id_tentor']); ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php $no++;
        endforeach; ?>
    </tbody>
</table>