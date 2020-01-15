<?php echo validation_errors(); ?>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" id="form_transaksi" role="form" method="POST" action="<?php echo site_url('barang/ubah/'.$barang->id_barang) ?>">
            <div class="form-group">
                <label class="control-label col-md-3">Kode Barang :</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="kode" value="<?php echo $barang->id_barang ?>" readonly="readonly">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Nama Barang :</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="nama" value="<?php echo $barang->nama_barang ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Harga Barang :</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="harga" value="<?php echo $barang->harga_barang ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Stok Barang :</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="stok" value="<?php echo $barang->stok_barang ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Keterangan Barang :</label>
                <div class="col-md-8">
                    <textarea class="form-control" name="keterangan"><?php echo $barang->keterangan_barang ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3"></label>
                <div class="col-md-8">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
            </div>
        </form>
    </div>
</div>