<?php
session_start();
ob_start();
error_reporting(0);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(str_contains($password, "'") || str_contains($password, "#") || str_contains($password, "-")) {
        echo "een van de characters is verboden";
    } elseif(str_contains($username, "'") || str_contains($username, "#") || str_contains($username, "-")) {
        echo "een van de characters is verboden";
    } else {
        $conn = new mysqli("mariadb", "db_user", "mijn_p@ss#", "voorbeeld_db");
    
        $query = "SELECT * FROM users WHERE Username = '$username' AND Pass = '$password'";
        $result = $conn->query($query);
    
        if ($result->num_rows == 1) {
            // Login berhasil
            $_SESSION['username'] = $username;
            header("location: index.php");
        } else {
            // Login gagal, tampilkan pesan error
            $error = "Naam en(of) Wachtwoord verkeerd";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
    <?php if(isset($error)) { echo "<p>$error</p>"; } ?>
</body>
</html>
