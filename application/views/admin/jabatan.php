<a href="<?php echo base_url('admin/jabatan_tambah/'); ?>" class="btn btn-primary">Tambah</a>
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
        <?php $no = 1; foreach ($data as $admin) : ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $admin['nama_jabatan']; ?></td>
                <td><?php echo $admin['Email']; ?></td>
                <td><?php echo $admin['Domisili']; ?></td>
                <td><?php echo $admin['Jumlah_Student']; ?></td>
                <td><?php echo $admin['No_Tlp']; ?></td>
                <td><?php echo $admin['Bidang']; ?></td>
                <td><?php echo ($admin['Status'] == "A") ? "Active" : "Non Active"; ?></td>
                <td>
                    <a href="<?php echo base_url('admin/jabatan_edit/' . $admin['id_jabatan']); ?>" class="btn btn-info">Edit</a>
                    <a href="<?php echo base_url('admin/jabatan_hapus/' . $admin['id_jabatan']); ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php $no++; endforeach; ?>
    </tbody>
</table>