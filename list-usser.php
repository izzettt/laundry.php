<?php
session_start();
# jika saat load halaman ini, pastikan telah login sbg usser
if (!isset($_SESSION["usser"])) {
    header("location:login.php");
}
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar usser</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/color-bg.css">
</head>
<body>
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header bg-dark mt-2">
                <h5 class="text-white">Data usser</h5>
            </div>
            <div class="card-body bg-dark">
                <!-- tombol daftar -->
                <a href="form-usser.php">
                    <button class="btn btn-outline-success btn-block">
                        Tambahkan usser
                    </button>
                </a>
                <hr>
                <!-- kotak pencarian data pelanggan -->
                <form action="list-usser.php" method="get">
                    <input type="text" name="search"
                    class="form-control mb-3"
                    placeholder="Masukan Keyword Pencarian"
                    required>
                </form>
                <ul class="list-group">
                    <?php
                    include("connection.php");
                    if (isset($_GET["search"])) {
                        # jika pd saat load halaman ini
                        # akan mengecek apakah ada data dgn method
                        # GET yg bernama search
                        $search = $_GET["search"];
                        $sql = "select * from usser
                        where id_usser like '%$search%'
                        or nama_usser like '%$search%'
                        or ussername like '%$search%'
                        or role like '%$search%'";
                    } else {
                        $sql = "select * from usser";
                    }
                    //eksekusi perintah sql
                    $query = mysqli_query($connect, $sql);
                    while($usser = mysqli_fetch_array($query)){ ?>
                        <li class="list-group-item">
                        <div class="row">
                            <!-- bagian data usser-->
                            <div class="col-lg-10 col-md-10">
                                <h5>Nama usser : <?php echo $usser["nama_usser"];?></h5>
                                <h6>ID usser : <?php echo $usser["id_usser"];?></h6>
                                <h6>ussername : <?php echo $usser["ussername"]?></h6>
                                <h6>Role : <?php echo $usser["role"];?></h6>
                            </div>

                            <!-- bagian tombol pilihan-->
                            <div class="col-lg-2 col-md-2">
                                <a href="form-usser.php?id_usser=<?=$usser["id_usser"]?>">
                                    <button class="btn btn-block btn-outline-primary mb-1">
                                        Edit
                                    </button>
                                </a>
                                <a href="process-usser.php?id_usser=<?=$usser["id_usser"]?>">
                                    <button class="btn btn-block btn-danger"
                                    onclick="return confirm('Apakah anda yakin?')">
                                        Remove
                                    </button>
                                </a>
                            </div>
                        </div>
                        </li>
                    <?php
                    }
                    ?>
                    
                </ul>
            </div>
        </div>
    </div>
</body>
</html>