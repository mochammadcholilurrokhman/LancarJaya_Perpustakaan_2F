<?php
// Include your database connection file
require_once '../Config/Connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the keys exist in the $_POST array
    if (isset($_POST["username"], $_POST["new_password"])) {
        $username = $_POST["username"];
        $newPassword = $_POST["new_password"];

        // Validate and sanitize the username (you can add more validation)
        $username = filter_var($username, FILTER_SANITIZE_STRING);

        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Reset the user's password
            // Store the new password as varchar (plain text)
            $updateQuery = "UPDATE user SET password = '$newPassword' WHERE username = '$username'";
            mysqli_query($conn, $updateQuery);

            echo "Password reset successfully. You can now <a href='login.php'>login</a> with your new password.";
        } else {
            echo "Invalid username.";
        }
    } else {
        echo "Invalid request parameters.";
    }
}
?>
