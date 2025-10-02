
<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // ✅ Secure query using prepared statements
    $stmt = $conn->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // ✅ Login success
        session_start();
        $row = $result->fetch_assoc();

        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];  // ✅ Store role in session

        header("Location: dashboard.php");
        exit();
    } else {
        // ❌ Login failed
        echo "<script>alert('Invalid Username or Password'); window.location.href='index.html';</script>";
    }
}
?>
