<?php 
include('../config/constants.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Raufaz Restaurant</title>
    <style>
        body {
            background-color: #f9f9fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            position: relative;
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
        }

        .message {
            margin-bottom: 15px;
            font-size: 14px;
            padding: 10px;
            border-radius: 8px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .input-wrapper {
            position: relative;
            width: 100%;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            box-sizing: border-box;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: #888;
        }

        .login-button {
            width: 100%;
            padding: 12px;
            background-color: #ff6600;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.3s ease;
        }

        .login-button:hover {
            background-color: #e65c00;
        }
    </style>
</head>

<body>

<div class="login-container">
    <h2>Sign in to <span style="color: #ff6600;">Raufaz</span></h2>

    <?php 
        if(isset($_SESSION['login'])) {
            echo "<div class='message success'>" . $_SESSION['login'] . "</div>";
            unset($_SESSION['login']);
        }

        if(isset($_SESSION['no-login-message'])) {
            echo "<div class='message error'>" . $_SESSION['no-login-message'] . "</div>";
            unset($_SESSION['no-login-message']);
        }
    ?>

    <form action="" method="POST">
        <input type="text" name="username" placeholder="Enter Username" required>

        <div class="input-wrapper">
            <input type="password" name="password" id="password" placeholder="Enter Password" required>
            <span class="toggle-password" onclick="togglePassword()">👁️</span>
        </div>

        <button type="submit" name="submit" class="login-button">Sign In</button>
    </form>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.querySelector('.toggle-password');
        
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.textContent = "🙈"; // eye closed emoji
        } else {
            passwordInput.type = "password";
            toggleIcon.textContent = "👁️"; // eye open emoji
        }
    }
</script>

</body>
</html>

<?php 
// Check if Submit Button is Clicked
if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $raw_password = md5($_POST['password']);
    $password = mysqli_real_escape_string($conn, $raw_password);

    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count == 1) {
        $_SESSION['login'] = "Login Successful.";
        $_SESSION['user'] = $username;
        header('location:'.SITEURL.'admin/');
    } else {
        $_SESSION['login'] = "Username or Password did not match.";
        header('location:'.SITEURL.'admin/login.php');
    }
}
?>
