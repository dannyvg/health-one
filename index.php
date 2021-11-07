<!DOCTYPE html>
<html lang="en" style="background: #f1f7fc;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>health_one_login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-with-overlay-image.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <section class="login-clean" style="font-size: 22px;">
        <form action="php-code/authenticate.php" method="post">
            <h2 class="visually-hidden">Login Form</h2><div class="illustration"><i class="icon ion-ios-heart-outline" style="color: var(--bs-blue);"></i></div>
            <div class="mb-3"><a class="forgot" h1="" style="font-size: 31px;color: var(--bs-gray-dark);padding: 10px 10px 20px;">Health One</a>
            <input class="form-control" type="email" name="username" placeholder="Gebruikersnaam" required></div>
            <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Wachtwoord" required></div>
            <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" name="submitBtnLogin" style="color: var(--bs-gray-100);background: var(--bs-blue);">Log In</button>
        <!-- </div><a class="forgot" href="#" style="font-size: 14px;">Forgot your email or password?</a> -->
        </form>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>