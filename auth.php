<?php
session_start();
include("./assets/class/database.php");
include("./assets/class/authprocess.php");
if (isset($_POST['login-btn'])) {

    $TenTK = $_POST['TenTK'];
    $MatKhau = $_POST['MatKhau'];

    $process = new authprocess();
    $login_query_run = $process->getlogin($TenTK, $MatKhau);

    if (mysqli_num_rows($login_query_run) > 0) {
        foreach ($login_query_run as $data) {
            $user_id = $data['MaTK'];
            $user_name = $data['TenTK'];
            $role_as = $data['MaQuyen'];
        }
        $_SESSION['auth'] = TRUE;
        $_SESSION['auth_role'] = "$role_as"; // 0=admin, 1=user, 2=staff
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $user_name,
        ];

        if ($_SESSION['auth_role'] == '0') {
            header("Location: dashboard.php");
            exit(0);
        } elseif ($_SESSION['auth_role'] == '1') {
            header("Location: infostaff.php");
            exit(0);
        } elseif ($_SESSION['auth_role'] == '2') {
            header("Location: infouser.php");
            exit(0);
        }
    } else {
        header("Location: login.php");
        exit(0);
    }
} else {
    header("Location: login.php");
    exit(0);
}
