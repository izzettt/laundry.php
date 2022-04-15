<?php
include("connection.php");

# untuk insert usser
if (isset($_POST["simpan_usser"])) {
    // tampung data input usser dari usser
    $nama_usser = $_POST["nama_usser"];
    $ussername = $_POST["ussername"];
    $password = sha1($_POST["password"]);
    $role = $_POST["role"];

    // membuat perintah sql utk insert data ke tbl usser
    $sql = "insert into usser values ('', '$nama_usser','$ussername', 
    '$password', '$role')";

    // eksekusi perintah sql
    mysqli_query($connect, $sql);

    // direct ke halaman list usser
    header("location: list-usser.php");
    
}

# untuk edit usser
else if (isset($_POST["edit_usser"])) {
    // tampung data edit usser dari usser
    $id_usser = $_POST["id_usser"];
    $nama_usser = $_POST["nama_usser"];
    $ussername = $_POST["ussername"];
    $role = $_POST["role"];

    # jika update data 
    
        if (empty($_POST["password"])) {
            $sql = "update usser set nama_usser='$nama_usser',
            role='$role', ussername='$ussername' where id_usser='$id_usser'";
        } else {
            $password = sha1($_POST["password"]);
            $sql = "update usser set nama_usser='$nama_usser', 
            role='$role', ussername='$ussername', 
            password='$password' where id_usser='$id_usser'";
        }

            if (mysqli_query($connect, $sql)) {
                header("location:list-usser.php");
            } else {
                echo "gagal boss";
            }
    
}

# untuk hapus usser
else if (isset($_GET["id_usser"])) {
    $id_usser = $_GET['id_usser'];
    $sql ="delete from usser where id_usser = '".$id_usser."'" ;

    $result = mysqli_query($connect,$sql);

    if ($result) {
        header('Location:list-usser.php');
    } else {
        printf('Gagal ya'.mysqli_error($connect));
        exit();
    }
}

?>