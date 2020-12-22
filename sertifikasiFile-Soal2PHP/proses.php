<?php 

# menyertakan file database sehingga dapat diakses melalui file ini
include 'database.php';
$db = new database();
//mengambil variabel aksi dari file sebelumnya untuk menentukan tindakan
$aksi = $_GET['aksi'];

if($aksi == "tambah"){
   $db->input($_POST['nik'],$_POST['nama']);
   header("location:index.php");
}
elseif($aksi == "hapus"){  
      $db->hapus($_GET['id']);
      header("location:index.php");
  
}
elseif($aksi == "update"){
   $db->update($_POST['id'],$_POST['nama']);
   header("location:index.php");
}
if($aksi == "cari"){
$_SESSION['id'] = $_POST['search'];
header("location:index.php");
}

?>
