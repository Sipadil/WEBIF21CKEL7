<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login</title>
</head>

<body>

    <div class="container">

        <div class="container-content">
            <div class="left-content">
                <div class="login-form">
                    <h1>LOGIN</h1>
                    <form action="Home/VerifyLogin" method="POST">
                        <label for="">Username</label>
                        <input type="text" name="username">
                        <label for="">Password</label>
                        <input type="password" name="password">
                        <div class="options">
                            <input type="checkbox"><label for="">Remember me</label>
                            <a href="#">Forgot password?</a>
                        </div>
                        <button>Login</button>
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="error"><?= session()->getFlashdata('error') ?></div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
            <div class="right-content">
                <img src="assets/images/tekno.png" alt="" width="150px">
                <h1>SISTEM INFORMASI <br> DATA DAN ASSET TEKNOKRAT</h1>
            </div>
        </div>

    </div>

</body>

</html>