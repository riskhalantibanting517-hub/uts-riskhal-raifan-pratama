
<?php
$pageTitle = "Daftar Kategori";
include_once("../header.php");
?>

    <div class="container">
        <div class="row my-5">
            <div class="col-10 m-auto">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <b>KATEGORI</b>
                        <a href="form_tambah.php" class="float-end btn btn-primary btn-sm"><i class="fa-solid fa-user-plus"></i> Tambah data</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                #1. koneksi
                                include("../koneksi.php");

                                #2. menulikan query menampilkan data
                                $qry = "SELECT * FROM kategori";

                                #3. menjalankan query
                                $tampil = mysqli_query($koneksi,$qry);

                                #4. looping hasil query
                                $nomor = 1;
                                foreach($tampil as $data){

                                ?>
                                <tr>
                                    <th scope="row"><?=$nomor++?></th>
                                    <td><?=$data['nm_ktg']?></td>
                                    <td>
                                        <a href="formedit.php?id=<?=$data['id']?>" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalhapus<?=$data['id']?>"><i class="fa-solid fa-trash"></i></button>

                                        

                                        <!-- Modal Hapus-->
                                        <div class="modal fade" id="modalhapus<?=$data['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Data Dengan Nama <?=$data['nm_ktg']?> Ingin Dihapus?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="proseshapus.php?id=<?=$data['id']?>" class="btn btn-danger">Hapus</a>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include_once("../footer.php"); ?>
