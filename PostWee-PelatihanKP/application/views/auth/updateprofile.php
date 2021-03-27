
    <?php foreach ($users as $user) : ?>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-light border-danger mt-5 p-4">
                    <form action="<?=base_url('auth/');?>prosesUpdateUser/<?=$user['user_id'];?>" method="post">
                    <div class="card-body" style="text-align: center">
                        <input name="username" type="text" class="form-control" value="<?=$user['username']?>" required>
                        <small><?=$user['email']?></small> <br>
                        <small>Member since : <?=date('Y-m-d H:i:s', $user['date_created'])?></small>
                    </div>
                    <div class=""> <center>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?=base_url();?>auth" class="btn btn-secondary">Batal</a>
                    </center></div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
