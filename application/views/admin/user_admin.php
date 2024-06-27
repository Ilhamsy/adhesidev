<?php echo $this->session->flashdata('pesan'); ?>

<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Hak Akses</th>
            <th>Log Akses</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($data->result_array() as $admin) : ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $admin['username']; ?></td>
                <td><?php echo $admin['nama']; ?></td>
                <td><?php echo ucfirst($admin['level']); ?></td>
                <td><?php echo $admin['log']; ?></td>
                <td>
                    <a href="<?php echo base_url('admin/user_admin_edit/' . $admin['id_admin']); ?>" class="btn btn-info">Edit</a>
                </td>
            </tr>
        <?php $no++;
        endforeach; ?>
    </tbody>
</table>