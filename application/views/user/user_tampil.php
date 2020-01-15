<div class="panel panel-default">
    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Username</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($user as $row) {
                    ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->telepon; ?></td>
                        <td><?php echo $row->username; ?></td>
                        <td><?php echo $row->tanggal; ?></td>
                        <td>
                            <a href="<?php echo site_url('user/ubah/' . $row->id_user) ?>"><i class="glyphicon glyphicon-pencil"></i></a> 
                            <a href="<?php echo site_url('user/hapus/' . $row->id_user) ?>"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>

<?php } ?>
            </tbody>
        </table>
    </div>
</div>