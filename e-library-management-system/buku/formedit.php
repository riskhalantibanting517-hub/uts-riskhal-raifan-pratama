<?php
include_once("../koneksi.php");
$idedit = $_GET['id'];
$qry = "SELECT * FROM buku WHERE id_buku='$idedit'";
$edit = mysqli_query($koneksi,$qry);
$data = mysqli_fetch_array($edit);
?>
<?php
$pageTitle = "Edit Buku";
include_once("../header.php");
?>

    <div class="container">
        <div class="row my-5">
            <div class="col-8 m-auto">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <b>FORM EDIT BUKU</b>
                    </div>
                    <div class="card-body">
                        <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?=$data['id_buku']?>">

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Penerbit</label>
                                <select class="form-control" name="pnb" id="">
                                    <?php
                                    //kode utk looping data penerbit
                                     include_once("../koneksi.php");
                                     $qry_pnb = "SELECT * FROM penerbit";
                                     $data_pnb = mysqli_query($koneksi,$qry_pnb);
                                     foreach($data_pnb as $item_pnb){
                                    ?>
                                    <option <?php echo $data['id_penerbit']==$item_pnb['id'] ? 'selected' : '' ?> value="<?= $item_pnb['id'] ?>"> <?= $item_pnb['nm_penerbit'] ?></option>
                                    <?php 
                                    //end looping
                                    } 
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kategori</label>
                                <select class="form-control" name="ktg" id="">
                                    <option value="">-Pilih Kategori-</option>
                                    <?php 
                                        //kode untuk looping datat kategori
                                        include_once('../koneksi.php');
                                        $qry_ktg = "SELECT * FROM kategori";
                                        $data_ktg = mysqli_query($koneksi,$qry_ktg);
                                        foreach($data_ktg as $item_ktg){
                                    ?>
                                    <option <?php echo $data['id_ktg'] == $item_ktg['id'] ? 'selected' : '' ?> value="<?=$item_ktg['id']?>"><?=$item_ktg['nm_ktg']?></option>
                                    <?php
                                        //penutup kode looping kategori
                                        }
                                    ?>
                                    
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Judul Buku</label>
                                <input value="<?=$data['jdl_buku']?>" name="jdl_buku" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Pengarang</label>
                                <input value="<?=$data['pengarang']?>" name="pengarang" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tahun Terbit</label>
                                <input value="<?=$data['thn_terbit']?>" name="thn_terbit" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">ISBN</label>
                                <input value="<?=$data['isbn']?>" name="isbn" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jumlah Halaman</label>
                                <input value="<?=$data['jml_hal']?>" name="jml_hal" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Stok</label>
                                <input value="<?=$data['stok']?>" name="stok" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Cover Buku</label>
                                <input name="cover_buku" type="file" accept=".jpg,.jpeg,.png" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Abaikan jika foto tidak diubah</div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include_once("../footer.php"); ?>