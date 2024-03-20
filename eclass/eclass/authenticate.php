<?php

function __autoload($name) {
    include_once $name . '.php';
}

$db = new DbHandler();
session_start();
if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $user = $db->login($username);
    if (password_verify($password, $user['password'])===true && $user['roleId']!==null) {
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['roleId'] = $user['roleId'];
        header('Location: index.php');
    } else {
        header('Location: signUpLogIn.php');
        echo 'can not log in';
    }
}