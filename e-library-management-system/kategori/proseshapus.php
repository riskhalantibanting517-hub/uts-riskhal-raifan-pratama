
<?php
# koneksi
include_once("../koneksi.php");
# ID hapus
$idhapus = $_GET['id'];

# menulis query
$qry = "DELETE FROM kategori WHERE id = '$idhapus'";
# menjalankan query
$hapus = mysqli_query($koneksi,$qry);

# mengalihkan halaman
header("location:index.php");
?>
