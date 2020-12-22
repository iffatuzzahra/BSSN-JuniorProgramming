
<?php 
# menyertakan file database sehingga dapat diakses melalui file ini
include 'database.php';
$db = new database();
?>
<h1>CRUD</h1>
<!-- Link untuk menambah data (read) dan mengakhiri session-->
<a href="input.php">Input Data</a>
<a href="killsession.php">View All Data</a>

<!--Form untuk melakukan pencarian berdasarkan nomor induk karyawan-->
<form action="proses.php?aksi=cari" method="post">
    <input type="text" name="search" placeholder="cari nomor induk">
    <input type="submit" value="cari">
</form>

<!--Tabel menampilkan data karyawan-->
<table border="1">
    <tr>
        <th>No.</th>
        <th>Nomor induk karyawan</th>
        <th>Nama karyawan</th>
    </tr>
    <?php
    $no = 1;
    # mengecek apakah pencarian dilakukan berdasarkan id
    if (!empty($_SESSION['id'])) {
        $id = $_SESSION['id'];
        if($db->cari($id) == null){
            die();
        }
        foreach($db->cari($id) as $x){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $x['NIK']; ?></td>
                <td><?php echo $x['Nama']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $x['NIK']; ?>&aksi=edit">Edit</a>
                    <a href="javascript:confirm_del('proses.php?id=<?php echo $x['NIK']; ?>&aksi=hapus')">Hapus</a>
                                
                </td>
            </tr>
            <?php 
        }
    } else {

        if($db->tampil_data() == null){
            die();
        }
        foreach($db->tampil_data() as $x){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $x['NIK']; ?></td>
            <td><?php echo $x['Nama']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $x['NIK']; ?>&aksi=edit">Edit</a>
                <a href="javascript:confirm_del('proses.php?id=<?php echo $x['NIK']; ?>&aksi=hapus')">Hapus</a>            
            </td>
        </tr>
        <?php 
        }
    }  
    ?>
</table>
<!--Fungsi konfirmasi penghapusan-->
<script> 
    function confirm_del(delUrl) {
        if (confirm("Yakin ingin menghapus?")){
            document.location = delUrl;
        }
    }
</script>