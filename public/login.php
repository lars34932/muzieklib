<?php
session_start();
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check for invalid characters
    if (strpos($password, "'") !== false || strpos($password, "#") !== false || strpos($password, "-") !== false) {
        echo "een van de characters is verboden";
    } elseif (strpos($username, "'") !== false || strpos($username, "#") !== false || strpos($username, "-") !== false) {
        echo "een van de characters is verboden";
    } else {
        // Database connection
        $conn = new mysqli("127.0.0.1", "c8374User", "DatabasePass!", "c8374projects");

        // Check for connection errors
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Use prepared statements to avoid SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE Username = ? AND Pass = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $_SESSION['username'] = $username;
            header("location: index.php");
            exit;
        } else {
            $error = "Naam en(of) Wachtwoord verkeerd";
        }

        $stmt->close();
        $conn->close();
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
