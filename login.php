<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/color-bg.css">
</head>
<!-- <body>
    <div class="container">
        <div class="card col-lc-5 mx-auto">
            <div class="card-header bg-dark">
                <h4 class="text-white">
                    Login usser
                </h4>
            </div>
            <div class="card-body">
                <form action="login_proses.php" method="post">
                    ussername
                    <input type="text" name="ussername" class="form-control mb-2" required>
                    Password
                    <input type="password" name="password" class="form-control mb-2" required>
                    
                    <button type="submit" name="login" class="btn btn-info btn-block">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div> -->
<div class="register-photo">
    <div class="form-container">
        <div class="image-holder"></div>
        <form action="login_proses.php" method="post">
            <h2 class="text-center"><strong>Welcome to izzet laundry 👋</strong></h2>
            <div class="form-group"><input class="form-control mb-2" type="ussername" name="ussername" placeholder="ussername" required></div>
            <div class="form-group"><input class="form-control mb-2" type="password" name="password" placeholder="Password" required></div>
            <div class="form-group">
                <div class="d-flex justify-content-between">
                    <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault"> Remember me </label> </div>
                    <div> <a href="#" class="text-info">Forgot Password</a> </div>
                </div>
            </div>
            <div class="form-group"><button class="btn btn-success btn-block btn-info" type="submit" name="login">Login</button></div>
            <a class="already" href="registrasi.php">create account</a>
        </form>
    </div>
</div>
</body>
</html>