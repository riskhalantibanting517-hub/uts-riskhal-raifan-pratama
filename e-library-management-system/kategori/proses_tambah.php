
<?php
#1 Meng-koneksikan PHP ke MYSQL
include("../koneksi.php"); 

#2 Mengambil value dari form tambah
$nm_ktg = $_POST['nm_ktg'];

#3 Query Insert(proses tambah data)
$query = "INSERT INTO kategori (nm_ktg) VALUES ('$nm_ktg')";

$tambah = mysqli_query($koneksi, $query);

#4 Jika berhasil triggernya apa?
if($tambah){
    header("location:index.php");
}else{
    echo "Data gagal ditambah";
}
?> 
