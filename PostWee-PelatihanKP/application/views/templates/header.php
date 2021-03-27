<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <title><?=$judul;?></title>
    <style>
        body {
            background: radial-gradient(circle at top left, rgb(25, 25, 131), rgb(247, 132, 208));    
        }
    </style>
</head>
<body>
<div class="container">
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <form action="<?=base_url()?>post/" method="post">
                <input type="hidden" value="" name="keyword">
                <button class="navbar-brand btn" type="submit" name="submit">Home</button>
            </form>
            <button class="navbar-toggler navbar-toggler-right dropdown-toggle" type="button" id="navbardrop" data-toggle="collapse" data-target="#navnav" aria-controls="navnav" aria-expanded="false" >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navnav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?=base_url()?>auth/">My Profile</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="<?=base_url()?>post" method="post">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
                    <button class="btn btn-outline-info my-2 my-sm-0 nav-item" type="submit" name="submit">Search</button>
                </form>
                <?php if (logged_in()) : ?>
                    <a class="btn btn-outline-secondary my-2 my-sm-0 mx-3" href="<?= base_url('auth/'); ?>logout ">Logout</a>
                <?php else : ?>
                    <a class="btn btn-warning my-2 my-sm-0 mx-3" href="<?= base_url('auth/'); ?>">Login</a>
                <?php endif; ?>

            </div>
        </div>
        </nav>
    </div>
