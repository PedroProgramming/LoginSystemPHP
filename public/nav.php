<?php 
defined("CONTROL") or die("Access denied!");
?>

<hr>
<span>
        Usuário: <strong>
            <?= $_SESSION["user"] ?>
        </strong>
    </span>
    <span>
        <a href="?route=logout">Sair</a>
    </span>
    <hr>
<hr>

<nav>
    <a href="?route=home">Home</a>
    <a href="?route=page1">Página 1</a>
    <a href="?route=page2">Página 2</a>
    <a href="?route=page3">Página 3</a>
    <a href="?route=logout">Sair</a>
</nav>