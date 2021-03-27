<div class="" style="margin-top:24px">
    <?php foreach ($users as $user) : ?>
        <div class="card border-primary mb-3">
            <div class="card-body">
                <div class="card-title">
                    <h5>Halo <?=$user['username']?></h5>
                </div>
                <div class="col">
                    <form action="<?=base_url();?>post/prosesTambah" method="post" class="">
                        <input type="hidden" name="user_id" value="<?=$user['user_id']?>">
                        <input class="form-group form-control row" type="text" placeholder="Bagikan ceritamu hari ini..." name="isi">
                        <button type="submit" class="btn btn-primary">Post</button>
                        <hr>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach?>