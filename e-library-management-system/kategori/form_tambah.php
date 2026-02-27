
<?php
$pageTitle = "Tambah Kategori";
include_once("../header.php");
?>

    <div class="container">
        <div class="row my-5">
            <div class="col-8 m-auto">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <b>FORM KATEGORI</b>
                    </div>
                    <div class="card-body">
                        <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                                <input name="nm_ktg" type="text" class="form-control" id="exampleInputEmail1"
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
