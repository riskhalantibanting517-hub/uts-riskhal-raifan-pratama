
<?php
    #1. Meng-koneksikan PHP ke MySQL
    include("../koneksi.php");

    #2. Mengambil Value dari Form Tambah
    $id = $_POST['id'];
    $nm_ktg = $_POST['nm_ktg'];

    

        #3. Query Insert (proses edit data)
        $query = "UPDATE kategori SET nm_ktg='$nm_ktg' WHERE id='$id'";
    
    $edit = mysqli_query($koneksi,$query);

    #4. Jika Berhasil triggernya apa? (optional)
    if($edit){
        header("location:index.php");
    }else{
        echo "Data Gagal diedit";
    }
?>
