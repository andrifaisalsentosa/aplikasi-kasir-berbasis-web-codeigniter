<div class="panel panel-default">
    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Stok Barang</th>
                    <th>Keterangan Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($barang as $row) {
                    ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row->id_barang; ?></td>
                        <td><?php echo $row->nama_barang; ?></td>
                        <td><?php echo $row->harga_barang; ?></td>
                        <td><?php echo $row->stok_barang; ?></td>
                        <td><?php echo $row->keterangan_barang; ?></td>
                        <td>
                            <a href="<?php echo site_url('barang/ubah/' . $row->id_barang) ?>"><i class="glyphicon glyphicon-pencil"></i></a> 
                            <a href="<?php echo site_url('barang/hapus/' . $row->id_barang) ?>"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>

<?php } ?>
            </tbody>
        </table>
    </div>
</div>