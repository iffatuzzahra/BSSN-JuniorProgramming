
    <div class="">
        <?php if (isset($posts)) : ?>
            <?php foreach ($posts as $post) : ?>
                <div class="card bg-light border-primary mb-3">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="text-truncate"><?=$post['username']?>
                            <small class="text-muted font-italic">Di post pada:<?=date('Y-m-d H:i:s', $post['date_created'])?></small>
                            <?php if($_SESSION['user_id'] == $post['user_id']) : ?>
                                <a href="<?=base_url()?>post/hapus/<?=$post['post_id']?>" class="" style="float:right; margin-right: 5px;" onclick="return confirm('Yakin ingin menghapus Post?')"><small>Hapus </small></a>
                                <a href="<?=base_url()?>post/update/<?=$post['post_id']?>" class="" style="float:right; margin-right: 10px;"><small>Edit</small>
                                </a> 
                                <?php endif; ?>
                            </h5>
                            <hr>
                        </div>
                        <p class="card-text"> 
                            <?=$post['post_item']?>
                        </p>
                        <hr><small>
                        <p>Comments</p>
                        <div class="col">
                            <?php foreach ($comments as $comment) : ?>
                                <?php if ($comment['post_id'] == $post['post_id']) : ?>
                                <hr>
                                <div>
                                    <h6 class="text-truncate"><?=$comment['username']?> <small class="text-muted font-italic">Di post pada:<?=date('Y-m-d H:i:s', $comment['date_created'])?></small>
                                    </h6>
                                    <p class=""> 
                                        <?=$comment['comment_item']?>
                                        <?php if($_SESSION['user_id'] == $comment['user_id']) : ?>
                                            <a href="<?=base_url()?>post/hapusKomentar/<?=$comment['comment_id']?>" style="float:right" onclick="return confirm('Yakin ingin menghapus Komentar?')">Hapus</a>
                                        <?php endif; ?>
                                    </p>
                                    
                                </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        
                            <form action="<?=base_url();?>post/prosesTambahKomentar" method="post" class="">
                                <input type="hidden" name="user_id" value="<?=$_SESSION['user_id']?>">
                                <input type="hidden" name="post_id" value="<?=$post['post_id']?>">
                                <input class="form-group form-control row" type="text" placeholder="Berikan komentar..." name="komentar">
                                <button type="submit" class="btn btn-primary">Post</button>
                                <hr>
                            </form>
                        </div>
                        </small>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
     <!--<div class="" style="">
        <?#=$this->pagination->create_links(); ?>
    </div>-->
</div>
