
<?php
    #1. Meng-koneksikan PHP ke MySQL
    include("../koneksi.php");

    #2. Mengambil Value dari Form Tambah
    $id_buku = $_POST['id'];
    $pnb = $_POST['pnb'];
    $ktg = $_POST['ktg'];
    $jdl_buku = $_POST['jdl_buku'];
    $pengarang = $_POST['pengarang'];
    $thn_terbit = $_POST['thn_terbit'];
    $isbn = $_POST['isbn'];
    $jml_hal = $_POST['jml_hal'];
    $stok = $_POST['stok'];
    $nama_foto = $_FILES['cover_buku']['name'];
    $tmp_foto = $_FILES['cover_buku']['tmp_name'];

    if($nama_foto != ""){
        #hapus foto lama
        $qry = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
        $hapus_foto = mysqli_query($koneksi,$qry);
        $data = mysqli_fetch_array($hapus_foto);
        $nama_foto_hapus = $data['cover_buku'];
        $lokasi_foto = "../cover_buku/".$nama_foto_hapus;

        if(file_exists($lokasi_foto)){
            unlink($lokasi_foto);
        }

        #3. Query Insert (proses edit data)
        $query = "UPDATE buku SET id_penerbit='$pnb', id_ktg='$ktg', jdl_buku='$jdl_buku', pengarang='$pengarang', thn_terbit='$thn_terbit', isbn='$isbn', jml_hal='$jml_hal', stok='$stok', cover_buku='$nama_foto' WHERE id_buku='$id_buku'";

        #hapus foto
        // $lokasi_foto = "../fotosiswa/$nama_foto";
        // if(file_exists($lokasi_foto)){
        //     unlink($lokasi_foto);
        // }

        #tambahkan foto
        move_uploaded_file($tmp_foto,"../cover_buku/$nama_foto");
    }else{
        #3. Query Insert (proses edit data)
        $query = "UPDATE buku SET id_penerbit='$pnb', id_ktg='$ktg', jdl_buku='$jdl_buku', pengarang='$pengarang', thn_terbit='$thn_terbit', isbn='$isbn', jml_hal='$jml_hal', stok='$stok' WHERE id_buku='$id_buku'";
    }

    
    $edit = mysqli_query($koneksi,$query);

    #4. Jika Berhasil triggernya apa? (optional)
    if($edit){
        header("location:index.php");
    }else{
        echo "Data Gagal diedit";
    }
?>
