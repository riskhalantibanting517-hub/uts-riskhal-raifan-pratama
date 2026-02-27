
<?php
#1 Meng-koneksikan PHP ke MYSQL
include("../koneksi.php"); 

#2 Mengambil value dari form tambah
$nm_penerbit = $_POST['nm_penerbit'];
$al_penerbit = $_POST['al_penerbit']; 

#3 Query Insert(proses tambah data)
$query = "INSERT INTO penerbit (nm_penerbit,al_penerbit) VALUES ('$nm_penerbit', '$al_penerbit')";

$tambah = mysqli_query($koneksi, $query);

#4 Jika berhasil triggernya apa?
if($tambah){
    header("location:index.php");
}else{
    echo "Data gagal ditambah";
}
?> 
