<?php foreach ($users as $user) : ?>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card bg-light border-danger mt-5">
                <div class="card-body" style="text-align: center">
                    <h2><?=$user['username']?></h2>
                    <h4><?=$user['email']?></h4>
                    <small>Member since : <?=date('Y-m-d H:i:s', $user['date_created'])?></small>
                </div>
                <div class=""> <center>
                    <a class="btn btn-outline-danger mx-2 my-2" href="<?= base_url('auth/'); ?>updateUser/<?=$user['user_id']?> "><small>Ganti Nama Lengkap</small></a>
                    <a class="btn btn-outline-danger mx-2 my-2" href="<?= base_url('auth/'); ?>hapusUser/<?=$user['user_id']?> " onclick="return confirm('Yakin ingin menghapus Akun?')"><small>Hapus Akun Saya</small></a>
                </center></div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
