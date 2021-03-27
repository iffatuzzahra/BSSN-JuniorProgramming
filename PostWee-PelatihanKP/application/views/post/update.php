<?php foreach ($posts as $post) : ?>
    <div class="card " style="margin-top: 20px;">
        <div class="card-header"><h6>Ubah Post</h6></div>
        <div class="card-body">
            <form action="<?=base_url();?>post/prosesUpdate/<?=$post['post_id'];?>" method="post">
                <div class="form-group" >
                    <input name="post_item" type="text" class="form-control" id="exampleInputEmail1" value="<?=$post['post_item'];?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="<?=base_url();?>post" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
<?php endforeach; ?>
    
