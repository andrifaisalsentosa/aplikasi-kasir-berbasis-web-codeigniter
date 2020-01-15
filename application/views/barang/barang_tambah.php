<?php echo validation_errors(); ?>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" id="form_transaksi" role="form" method="POST" action="<?php echo site_url('barang/tambah') ?>">
            <div class="form-group">
                <label class="control-label col-md-3">Kode Barang :</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="kode">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Nama Barang :</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="nama">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Harga Barang :</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="harga">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Stok Barang :</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="stok">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Keterangan Barang :</label>
                <div class="col-md-8">
                    <textarea class="form-control" name="keterangan"></textarea>
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