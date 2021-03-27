<main class="bg-light vh-100">
    <div class="container">
        <div class="row">
        <div class="col d-flex justify-content-center align-self-center" style="text-align:center; color:white;">
                <div class="mt-5 col-8">
                    <h1 style="">POST WEE</h1>
                    <h3 style="padding-top:15px">Post Me Post You</h3>
                    <p style="padding-top:30px">Lets post everything. Share story and be lovely.</p>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div class="card bg-light border-primary mt-5 col-8">
                    <div class="card-body">
                        <form action="" method="post">
                            <h2>Login</h2>
                            <hr>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="pl-3 text-danger">', '</small>'); ?>
                                <?= $this->session->flashdata('message'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                                <?= form_error('password', '<small class="pl-3 text-danger">', '</small>'); ?>
                                <?= $this->session->flashdata('message2'); ?>
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <button type="submit" class="btn btn-primary">Masuk</button>
                        </form>
                        <small>Belum punya akun? <a href="<?=base_url('auth/')?>register" class="font-weight-bold">Daftar</a></small>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</main>
