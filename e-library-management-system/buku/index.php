
<?php
$pageTitle = "Daftar Buku";
include_once("../header.php");
?>

    <div class="container">
        <div class="row my-5">
            <div class="col-10 m-auto">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <b>DATA BUKU</b>
                        <a href="form_tambah.php" class="float-end btn btn-primary btn-sm"><i class="fa-solid fa-user-plus"></i> Tambah data</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Pengarang</th>
                                    <th scope="col">Penerbit</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                #1. koneksi
                                include("../koneksi.php");

                                #2. menulikan query menampilkan data
                               $qry = "SELECT *, buku.id_buku AS ids, id_penerbit AS idp, id_ktg AS idk FROM buku LEFT JOIN penerbit ON buku.id_penerbit = penerbit.id LEFT JOIN kategori ON buku.id_ktg = kategori.id";

                                #3. menjalankan query
                                $tampil = mysqli_query($koneksi,$qry);

                                #4. looping hasil query
                                $nomor = 1;
                                foreach($tampil as $data){

                                ?>
                                <tr>
                                    <th scope="row"><?=$nomor++?></th>
                                    <td><?=$data['jdl_buku']?></td>
                                    <td><?=$data['pengarang']?></td>
                                    <td><?=$data['nm_penerbit']?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$data['ids']?>"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        <a href="formedit.php?id=<?=$data['ids']?>" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalhapus<?=$data['ids']?>"><i class="fa-solid fa-trash"></i></button>

                                        <!-- Modal Detail-->
                                        <div class="modal fade" id="exampleModal<?=$data['ids']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Data Detail <?=$data['jdl_buku']?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table">
                                                <tbody>
                                                  <tr>
                                                    <td colspan="2"><img src="../cover_buku/<?= $data['cover_buku'] ?>" alt="" width="100px"></td>
                                                  </tr>
                                                    <tr>
                                                        <td>Judul Buku</td>
                                                        <th scope="row"><?=$data['jdl_buku']?></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Kategori</td>
                                                        <th scope="row"><?=$data['nm_ktg']?></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Pengarang</td>
                                                        <th scope="row"><?=$data['pengarang']?></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Penerbit</td>
                                                        <th scope="row"><?=$data['nm_penerbit']?></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Tahun Terbit</td>
                                                        <th scope="row"><?=$data['thn_terbit']?></th>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>ISBN</td>
                                                        <th scope="row"><?=$data['isbn']?></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Halaman</td>
                                                        <th scope="row"><?=$data['jml_hal']?></th>
                                                    </tr>
                                                        <td>Stok</td>
                                                        <th scope="row"><?=$data['stok']?></th>
                                                    </tr>
                                                    
                                                </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                
                                            </div>
                                            </div>
                                        </div>
                                        </div>

                                        <!-- Modal Hapus-->
                                        <div class="modal fade" id="modalhapus<?=$data['ids']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Data Dengan Nama <?=$data['jdl_buku']?> Ingin Dihapus?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="proseshapus.php?id=<?=$data['ids']?>" class="btn btn-danger">Hapus</a>
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
