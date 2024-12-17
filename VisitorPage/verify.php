<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputOtp = $_POST['otp']; // Get the OTP entered by the user

    if (isset($_SESSION['otp']) && $inputOtp == $_SESSION['otp']) {
        echo "OTP verified successfully!";
        // Optionally, clear the OTP from the session
        unset($_SESSION['otp']);
        // Redirect to the desired page after successful verification
        header("Location: ../UserPage/index2.php");
        exit();
    } else {
        echo "Invalid OTP. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
</head>
<body>
    <h2>Enter OTP</h2>
    <form method="POST" action="">
        <input type="text" name="otp" placeholder="Enter OTP" required>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>