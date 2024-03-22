<?php 
session_start();

if(isset($_POST['email']) && isset($_POST['pass'])) {
    include "../db_conn.php";

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $fname = $_POST['fname'];  
    $lname = $_POST['lname']; 
    $mobile_num = $_POST['mobile_num'];  

    $data = "email=" . urlencode($email) . "&fname=" . urlencode($fname) . "&lname=" . urlencode($lname) . "&mobile_num=" . urlencode($mobile_num); // Include all fields in data

    if(empty($email) || empty($pass)) {
        $em = "Email and password are required";
        header("Location: ../index.php?error=" . urlencode($em) . "&$data");
        exit;
    } else {
        // Check if the email already exists
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);

        if($stmt->rowCount() > 0) {
            $em = "Email already exists";
            header("Location: ../index.php?error=" . urlencode($em) . "&$data");
            exit;
        }

        // If email doesn't exist, proceed with user creation
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, password, fname, lname, mobile_num) VALUES (?, ?, ?, ?, ?)"; 
        $stmt = $conn->prepare($sql);

        if($stmt->execute([$email, $hashed_password, $fname, $lname, $mobile_num])) { // Bind all fields to execute
            // User created successfully
            $_SESSION['id'] = $conn->lastInsertId();
            $_SESSION['fname'] = ''; // Set default first name
            header("Location: ../home.php");
            exit;
        } else {
            $em = "Error creating user";
            header("Location: ../index.php?error=" . urlencode($em) . "&$data");
            exit;
        }
    }
} else {
    header("Location: ../index.php?error=error");
    exit;
}
?>
