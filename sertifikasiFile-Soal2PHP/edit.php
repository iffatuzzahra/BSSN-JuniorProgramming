<?php 
# menyertakan file database sehingga dapat diakses melalui file ini 
include 'database.php';
$db = new database();
?>

<h1>CRUD</h1>
<!--Form edit data-->
<form action="proses.php?aksi=update" method="post">
<?php
foreach($db->edit($_GET['id']) as $d){
?>
<table>
    <tr>
        <td>Nomor Induk </td>
        <td>
            <input type="hidden" name="id" value="<?php echo $d['NIK'] ?>">
            <label ><?php echo $d['NIK'] ?></label>
        </td>
    </tr>
    <tr>
        <td>Nama</td>
        <td><input type="text" name="nama" value="<?php echo $d['Nama'] ?>"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Simpan"></td>
    </tr>
</table>
<?php } ?>
</form>
<a href="index.php"><button>Batal</button></a>
