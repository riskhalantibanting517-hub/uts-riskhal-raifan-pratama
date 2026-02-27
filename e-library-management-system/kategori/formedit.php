
<?php
include_once("../koneksi.php");
$idedit = $_GET['id'];
$qry = "SELECT * FROM kategori WHERE id='$idedit'";
$edit = mysqli_query($koneksi,$qry);
$data = mysqli_fetch_array($edit);
?>
<?php
$pageTitle = "Edit Kategori";
include_once("../header.php");
?>

    <div class="container">
        <div class="row my-5">
            <div class="col-8 m-auto">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <b>FORM EDIT KATEGORI</b>
                    </div>
                    <div class="card-body">
                        <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?=$data['id']?>">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                                <input value="<?=$data['nm_ktg']?>" name="nm_ktg" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include_once("../footer.php"); ?>
