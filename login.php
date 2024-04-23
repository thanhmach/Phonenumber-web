<?php
include("./assets/form/link.php");
session_start();

if (isset($_SESSION['auth'])) {
    header("Location: dashboard.php");
    exit(0);
}
?>

<section class="vh-100" style="background-image: url('./assets/img/background.jpg'); background-size: cover;">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="./assets/img/logoW.jpg" class="img-fluid rounded-circle" alt="Sample image" style="max-width: 300px; margin: 280px">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="auth.php" method="POST">
                    <div class="form-outline mb-4">
                        <label class="form-label">
                            Username
                            <input type="text" class="form-control form-control-lg" name="TenTK">
                        </label>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label">
                            Password
                            <input type="text" class="form-control form-control-lg" name="MatKhau">
                        </label>
                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" name="login-btn">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>