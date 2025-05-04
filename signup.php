

<?php

$db_server = "localhost";
$db_user = "root";
$db_password = "admin";
$db_name = "not_secure";
$error = "";

try {
    $connection = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_password);
} catch (PDOException $e) {
    die("Could not connect to database: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    $nom = $_POST["firstName"];
    $prenom = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];



    $req = "INSERT INTO user VALUES (0, '$nom', '$prenom', '$email', '$password')";
    $connection->exec($req);

    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
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
            font-size: 14px;
            margin-bottom: 1rem;
            text-align: center;
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
        <h2>Register</h2>
        <form method="POST" action="signup.php">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <a class="signup-link" href="login.php">I already have an account</a>
            <?php if (!empty($error)) : ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>

            <input type="submit" value="Submit" name="submit" class="submit-btn">
        </form>
    </div>
</body>

</html>
