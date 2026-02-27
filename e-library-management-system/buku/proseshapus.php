
<?php
# koneksi
include_once("../koneksi.php");
# ID hapus
$idhapus = $_GET['id'];

$qry = "SELECT * FROM buku WHERE id_buku = '$idhapus'";
$hapus_foto = mysqli_query($koneksi,$qry);
$data = mysqli_fetch_array($hapus_foto);
$nama_foto = $data['cover_buku'];
$lokasi_foto = "../cover_buku/".$nama_foto;

if(file_exists($lokasi_foto)){
    unlink($lokasi_foto);
}

# menulis query
$qry = "DELETE FROM buku WHERE id_buku = '$idhapus'";
# menjalankan query
$hapus = mysqli_query($koneksi,$qry);

# mengalihkan halaman
header("location:index.php");
?>
