<!--  commande pour le test : ' OR '1=1     -->

<?php
session_start();
$errorMessage = '';

$conn = mysqli_connect("localhost", "root", "admin", "not_secure");


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];


    $query = "SELECT * FROM user WHERE email = '$email' AND pass = '$password'";
    $result = mysqli_query($conn, $query);


    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        header("Location: client.php");
        exit();
    } else {
        $errorMessage = "Email ou mot de passe incorrect.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f1f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            width: 350px;
        }

        .form-container h2 {
            margin-bottom: 1.5rem;
            font-size: 24px;
            color: #0f172a;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #334155;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            background-color: #f8fafc;
            outline: none;
            transition: border 0.3s;
        }

        .form-group input:focus {
            border-color: #0f172a;
        }

        .submit-btn {
            background-color: #0f172a;
            color: white;
            padding: 0.75rem;
            width: 100%;
            border: none;
            border-radius: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #1e293b;
        }

        .error-message {
            color: red;
            margin: 10px 0;
            text-align: center;
            font-weight: bold;
        }

        .signup-link {
            display: block;
            text-align: center;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: #64748b;
            text-decoration: none;
        }

        .signup-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Login</h2>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <a class="signup-link" href="signup.php">I don't have an account</a>

            <?php if (!empty($errorMessage)) : ?>
                <div class="error-message"><?= htmlspecialchars($errorMessage) ?></div>
            <?php endif; ?>

            <input type="submit" value="Submit" name="submit" class="submit-btn">

        </form>
    </div>
</body>

</html>