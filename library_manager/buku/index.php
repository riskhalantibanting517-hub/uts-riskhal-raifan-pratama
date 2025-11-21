<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>library manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/all.css" />
</head>

<body style="background-color:#d1e6d4">
    <?php
    include_once("../navbar.php");
    ?>
    <div class="container">
        <div class="row my-5">
            <div class="col-10 m-auto">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <b>PERPUSTAKAAN</b>
                        <a href="form_tambah.php" class="float-end btn btn-primary btn-sm">
                            <i class="fa-solid fa-user-plus"></i> JUDUL BUKU
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">JUDUL BUKU</th>
                                    <th scope="col">PENGARANG</th>
                                    <th scope="col">KATEGORI</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include("../koneksi.php");
                                $qry = "SELECT * FROM buku";
                                $tampil = mysqli_query($koneksi, $qry);
                                $nomor = 1;
                                foreach ($tampil as $data) {
                                ?>
                                <tr>
                                    <th scope="row"><?=$nomor++?></th>
                                    <td><?=htmlspecialchars($data['judul_buku'])?></td>
                                    <td><?=htmlspecialchars($data['pengarang'])?></td>
                                    <td><?=htmlspecialchars($data['kategori'])?></td>
                                    <td>
                                        <!-- Tombol Detail -->
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$data['id']?>">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>

                                        <!-- Tombol Edit -->
                                        <a href="formedit.php?id=<?=$data['id']?>" class="btn btn-info btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalhapus<?=$data['id']?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                        <!-- Modal Detail -->
                                        <div class="modal fade" id="exampleModal<?=$data['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel<?=$data['id']?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel<?=$data['id']?>">Library_riskhal - <?=$data['judul_buku']?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>JUDUL BUKU</td>
                                                                    <th scope="row"><?=htmlspecialchars($data['judul_buku'])?></th>
                                                                </tr>
                                                                <tr>
                                                                    <td>PENGARANG</td>
                                                                    <th scope="row"><?=htmlspecialchars($data['pengarang'])?></th>
                                                                </tr>
                                                                <tr>
                                                                    <td>TAHUN TERBIT</td>
                                                                    <th scope="row"><?=htmlspecialchars($data['tahun_terbit'])?></th>
                                                                </tr>
                                                                <tr>
                                                                    <td>KATEGORI</td>
                                                                    <th scope="row"><?=htmlspecialchars($data['kategori'])?></th>
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

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="modalhapus<?=$data['id']?>" tabindex="-1" aria-labelledby="modalHapusLabel<?=$data['id']?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="modalHapusLabel<?=$data['id']?>">Peringatan</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Yakin dengan judul buku <?=htmlspecialchars($data['judul_buku'])?> Ingin Dihapus?
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
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="../js/all.js"></script>
</body>

</html>