<?php
#start session
session_start();
class database{
    // variabel untuk akses database 
    var $host = "localhost";
    var $uname = "root";
    var $pass = "";
    var $db = "sertifikasi";

    # fungsi menampilkan data
    function tampil_data(){
        $conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
        $data = mysqli_query($conn,"select * from karyawan");
        $hasil = null;
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }
    #fungsi melakukan create atau tambah data
    function input($id,$nama){
        $conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
        mysqli_query($conn,"insert into karyawan values('$id','$nama')");
    }   
    #fungsi menampilkan data yang akan di edit pada form edit
    function edit($id){
        $conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
        $data = mysqli_query($conn,"select * from karyawan where NIK='$id'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }
    #fungsi mengubah/mengedit/update data
    function update($id,$nama){
        $conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
        mysqli_query($conn,"update karyawan set Nama='$nama ' where NIK='$id'");
    } 
    #fungsi menghapus data
    function hapus($id){
        $conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
        mysqli_query($conn,"delete from karyawan where NIK='$id'");
    }
    # fungsi mencari data
    function cari($search) {
        $conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
        $data = mysqli_query($conn,"select * from karyawan where NIK like '%$search%' ");
        return $data;
    }



}

?>