
<?php
    #1. Meng-koneksikan PHP ke MySQL
    include("../koneksi.php");

    #2. Mengambil Value dari Form Tambah
    $id = $_POST['id'];
    $nm_penerbit = $_POST['nm_penerbit'];
    $al_penerbit = $_POST['al_penerbit'];

        #3. Query Insert (proses edit data)
       $query = "UPDATE penerbit SET nm_penerbit='$nm_penerbit', al_penerbit='$al_penerbit' 
    WHERE id='$id'";

    $edit = mysqli_query($koneksi,$query);

    #4. Jika Berhasil triggernya apa? (optional)
    if($edit){
        header("location:index.php");
    }else{
        echo "Data Gagal diedit";
    }
?>
