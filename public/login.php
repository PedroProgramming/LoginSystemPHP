<?php
defined("CONTROL") or die("Access denied!");
require_once("../database/conn.php");
// Check login form submission

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // check username and password
    $user = $_POST["user"] ?? null;
    $password = $_POST["password"] ?? null;
    $error = null;

    if(empty($user) || empty($password)){
        $error = "Usuário e senha são obrigatórios!";
    }

    // checks if the username and password are valid
    if(empty($error)){
        $sql = $pdo->query("SELECT * FROM users");
        if($sql->rowCount() > 0){
            $users = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($users as $u){
                if($u["user"] == $user && $u["password"] == md5($password)){
                    // Log in
                    $_SESSION["user"] = $user;
                    // Return to home page
                    header("Location: index.php?route=home");
                    exit();
                }
            }
            // Login invalid
            $error = "Usuário e/ou senha inválidos";
        }
    }
}
?><!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../src/styles/styles.css">
</head>
<body>
    <form action="index.php?route=login" method="post">
        <h3>Login</h3>
        <div>
            <label for="user">Usuário</label>
            <input type="text" name="user" id="user">
        </div>
        <div>
            <label for="password">Senha</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <button type="submit">Entrar</button>
        </div>
    </form>

    <?php if(!empty($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
</body>
</html>