<main class="bg-light vh-100">
    <div class="container">
        <div class="row ">
            <div class="col d-flex justify-content-center align-self-center" style="text-align:center; color:white;">
                <div class="mt-5 col-8">
                    <h1 style="">POST WEE</h1>
                    <h3 style="padding-top:15px">Post Me Post You</h3>
                    <p style="padding-top:30px">Lets post everything. Share story and be lovely.</p>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div class="card bg-light border-primary mt-5 col-8 " >
                    <div class="card-body">
                        <form action="" method="post">
                            <h2>Register</h2>
                            <hr>
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?= set_value('name'); ?>">
                                <?= form_error('name', '<small class="pl-3 text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="pl-3 text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    <?= form_error('password', '<small class="pl-3 text-danger">', '</small>'); ?>
                                </div>
                                <div class="col">
                                    <label for="password">Konfirmasi Password</label>
                                    <input type="password" name="password_confirm" class="form-control" id="password">
                                    <?= form_error('password_confirm', '<small class="pl-3 text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </form>
                        <small>Sudah punya akun? <a href="<?=base_url('auth/')?>" class="font-weight-bold">Masuk</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
