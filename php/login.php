<?php 
session_start();

if(isset($_POST['email']) && isset($_POST['pass'])) {
    include "../db_conn.php";

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $data = "email=" . urlencode($email);

    if(empty($email) || empty($pass)) {
        $em = "Email and password are required";
        header("Location: ../login.php?error=" . urlencode($em) . "&$data");
        exit;
    } else {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if($user) {
            if(password_verify($pass, $user['password'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['fname'] = $user['fname'];
                header("Location: ../home.php");
                exit;
            } else {
                $em = "Incorrect password";
            }
        } else {
            $em = "User not found";
        }

        header("Location: ../login.php?error=" . urlencode($em) . "&$data");
        exit;
    }
} else {
    header("Location: ../login.php?error=error");
    exit;
}
?>
