<?php
require "db-connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<!--Info o pliku-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klimchi Contact</title>
    <link rel="stylesheet" href="contact.css">

</head>


<body>
    <!--Header-->
    <header>
        <img src="assets/logonazwa.png" alt="Logo i nazwa Klimchi" width="305">
        <nav>
            <ul class="menu">
                <ul>About us</ul>
                <ul>Menu</ul>
                <ul><a href="contact.php">Contact</a></ul>
                <ul>Log in</ul>
            </ul>
        </nav>
    </header>

    <div class="formularz">
        <h1>Log in</h1>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" class ="login-form" method="post">
            <label for="username">Your username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Your password:</label>
            <input type="password" name="password" id="password" placeholder="Insert password" required></textarea>
            
            <input type="submit" value="Log in" name="submit">
        </form>
    </div>



</body>


