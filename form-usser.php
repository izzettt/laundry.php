<?php
session_start();
# jika saat load halaman ini, pastikan telah login sbg petugas
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
    <title>Form Petugas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/color-bg.css">
</head>
<body>
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header bg-dark mt-2">
                <h5 class="text-white">
                    Form usser
                </h5>
            </div>
            <div class="card-body">
                <?php
                if (isset($_GET["id_usser"])) {
                    #form utk edit
                    # mengakses data usser dari id yg dikirim
                    include "connection.php";
                    $id_usser = $_GET["id_usser"];
                    $sql = "select * from usser
                    where id_usser='$id_usser'";
                    # eksekusi perintah sql
                    $hasil = mysqli_query($connect, $sql);
                    # konversi hasil query ke bentuk array
                    $usser = mysqli_fetch_array($hasil);
                    ?>
                    <form action="process-usser.php" method="post"
                    enctype="multipart/form-data">
                        ID
                        <input type="number" name="id_usser"
                        class="form-control mb-2" required
                        value="<?=$usser["id_usser"] ?>" readonly>

                        Nama
                        <input type="text" name="nama_usser"
                        class="form-control mb-2" required
                        value="<?=$usser["nama_usser"] ?>">

                        ussername
                        <input type="text" name="ussername"
                        class="form-control mb-2" required
                        value="<?=$usser["ussername"] ?>">

                        Password
                        <input type="password" name="password"
                        class="form-control mb-2">

                        Role
                        <select name="role" class="form-control mb-2" required>
                            <option value="<?=$usser["role"] ?>">
                                <?=$usser["role"] ?>
                            </option>
                            <option value="admin">admin</option>
                            <option value="kasir">kasir</option>
                            <option value="kasir">member</option>
                        </select>

                        <button type="submit" class="btn btn-primary btn-block" name="edit_usser"
                        onclick="return confirm('Apakah anda yakin?')">
                            Save
                        </button>
                    </form>
                <?php
                } else {
                    #form utk insert ?>
                    <form action="process-usser.php" method="post"
                    enctype="multipart/form-data">

                        Nama
                        <input type="text" name="nama_usser"
                        class="form-control mb-2" required>

                        ussername
                        <input type="text" name="ussername"
                        class="form-control mb-2" required>

                        Password
                        <input type="password" name="password"
                        class="form-control mb-2">

                        Role
                        <select name="role" class="form-control mb-2" required>
                            <option value="admin">admin</option>
                            <option value="kasir">kasir</option>
                            <option value="kasir">member</option>
                        </select>

                        <button type="submit" class="btn btn-primary btn-block" name="simpan_usser">
                            Save
                        </button>
                    </form>
                <?php    
                }
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>