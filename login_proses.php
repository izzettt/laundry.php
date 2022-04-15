<?php
session_start();
include "connection.php";

if (isset($_POST["login"])) {
    
    $ussername = $_POST["ussername"];
    $password = sha1($_POST["password"]);

    $sql = "select * from usser where ussername= '$ussername' and password= '$password'";
    $hasil = mysqli_query($connect, $sql);

    if (mysqli_num_rows($hasil) > 0) {
        $usser = mysqli_fetch_array($hasil);
        $_SESSION["usser"] = $usser;
        header("location: index.php");
    }else {
        header("location: login.php");
    }
}
?>