

<?php
session_start();

function isLoggedIn(): bool
{
    return session_status() === PHP_SESSION_ACTIVE && $_SESSION['loggedin'] == true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = login($username, $password);
    if ($user !== null) {
        // success login
        $_SESSION['loggedin'] = true;
        echo "<h1>" .  $user['role'] . "</h1>";
        
    }
}

if (isLoggedIn()) {
    header('Location: /frontend/op3/opvolg.php');
    return;
}

;
header('Location: /frontend/op3/login.html');

function login($username, $password): ?array
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=portofolio", "root", "");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM opd3 WHERE username=?");
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if ($user === false) {
            echo "<h4>user was not found</h4>";
            return null;
        }

        if ($password != $user["password"]) {
            echo "<h4>login fail</h4>";
            return null;
        }

        unset($user['password']);

        return $user;
    } catch (PDOException $e) {
        echo "<h4>Connection failed: " . $e->getMessage() . "</h4>";
    }
}

