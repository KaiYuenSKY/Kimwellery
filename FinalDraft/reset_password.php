<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email from the form
    $email = $_POST["email"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    $userExists = checkUserExists($email);

    if ($userExists) {

        $resetToken = generateResetToken();

        saveResetToken($email, $resetToken);

        sendResetLink($email, $resetToken);

        // Display a success message
        echo "A password reset link has been sent to your email. Please check your inbox.";
    } else {
        // Email does not exist in the database
        echo "This email is not registered.";
    }
}

function checkUserExists($email) {

    return true;
}

function generateResetToken() {

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $tokenLength = 20;
    $resetToken = '';

    for ($i = 0; $i < $tokenLength; $i++) {
        $resetToken .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $resetToken;
}

function saveResetToken($email, $resetToken) {

    echo "Reset Token: $resetToken<br>";
}

function sendResetLink($email, $resetToken) {
    // Send the reset link to the user's email
}
    ?>
 <!DOCTYPE html>
<html>
<head>
    <title>Forget Password</title>
</head>
<body>
    <h2>Forget Password</h2>
    <form action="reset_password.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        <input type="submit" value="Reset Password">
    </form>
</body>
</html>