<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Array of valid username and password combinations
    $validCredentials = [
        ['username' => 'admin', 'password' => 'password'],
        ['username' => 'user1', 'password' => 'pass1'],
        ['username' => 'user2', 'password' => 'pass2'],
        ['username' => 'user3', 'password' => 'pass3']
    ];

    // Check if the submitted credentials match any in the array
    $isValid = false;
    foreach ($validCredentials as $credentials) {
        if ($username === $credentials['username'] && $password === $credentials['password']) {
            $isValid = true;
            break;
        }
    }

    if ($isValid) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Invalid login credentials.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/s2.css">
</head>
<body>
    <div class="container">
        <div class="meal-wrapper">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <input type="text" name="username" class="search-control" placeholder="Username" required>
                <input type="password" name="password" class="search-control" placeholder="Password" required>
                <button type="submit" class="search-btn">Login</button>
            </form>
            <p style="color: red;"><?php echo $error; ?></p>
        </div>
    </div>
</body>
</html>
