<?php echo validation_errors(); ?>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" id="form_transaksi" role="form" method="POST" action="<?php echo site_url('user/ubah/'.$user->id_user) ?>">
    
            <div class="form-group">
                <label class="control-label col-md-3">Nama :</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="nama" value="<?php echo $user->nama ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Email :</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="email" value="<?php echo $user->email ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Telepon :</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="telepon" value="<?php echo $user->telepon ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Username :</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="username" value="<?php echo $user->username ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Password :</label>
                <div class="col-md-8">
                    <input type="password" class="form-control" name="password">
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