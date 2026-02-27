
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUKU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body style="background-color:#d1e6d4">
    <?php
    include_once("../navbar.php");
    ?>

    <div class="container">
        <div class="row my-5">
            <div class="col-8 m-auto">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <b>FORM BUKU</b>
                    </div>
                    <div class="card-body">
                        <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Penerbit</label>
                                <select class="form-control" name="pnb" id="">
                                    <option value="">-Pilih Penerbit-</option>
                                    <?php
                                    //kode utk looping data penerbit
                                     include_once("../koneksi.php");
                                     $qry_pnb = "SELECT * FROM penerbit";
                                     $data_pnb = mysqli_query($koneksi,$qry_pnb);
                                     foreach($data_pnb as $item_pnb){
                                    ?>
                                    <option value="<?= $item_pnb['id'] ?>"><?= $item_pnb['id'] ?> - <?= $item_pnb['nm_penerbit'] ?></option>
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
                                        //kode untuk looping data kategori
                                        include_once('../koneksi.php');
                                        $qry_ktg = "SELECT * FROM kategori";
                                        $data_ktg = mysqli_query($koneksi,$qry_ktg);
                                        foreach($data_ktg as $item_ktg){
                                    ?>
                                    <option value="<?=$item_ktg['id']?>"><?=$item_ktg['nm_ktg']?></option>
                                    <?php
                                        //penutup kode looping kategori
                                        }
                                    ?>
                                    
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Judul Buku</label>
                                <input name="jdl_buku" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Pengarang</label>
                                <input name="pengarang" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tahun Terbit</label>
                                <input name="thn_terbit" type="number" min="1" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">ISBN</label>
                                <input name="isbn" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jumlah Halaman</label>
                                <input name="jml_hal" type="number" min="1" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Stok</label>
                                <input name="stok" type="number" min="0" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Cover Buku</label>
                                <input name="cover_buku" accept=".jpg,.jpeg,.png" type="file" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>
