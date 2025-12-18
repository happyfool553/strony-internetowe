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
    <a href=main_page.html><img src="assets/logonazwa.png" alt="Logo i nazwa Klimchi" width="305"></a>
        <nav>
            <ul class="menu">
                <ul><a href=main_page.html#aboutus>About us</a></ul>
                <ul><a href="menu.php">Menu</a></ul>
                <ul><a href="contact.php">Contact</a></ul>
                <ul><a href="log_form.php">Log in</a></ul>
            </ul>
        </nav>
    </header>

    <div class="formularz">
        <h1>Log in</h1>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" class ="login-form" method="post">
            <label for="username">Your username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Your password:</label>
            <input type="password" name="password" id="password" placeholder="Insert password" required>
            
            <input type="submit" value="Log in" name="submit">
        </form>
        <?php
        session_start();
        require_once __DIR__ . '/db-connection.php';

        $info = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $name = trim($_POST['username']);
            $password = trim($_POST['password']);

            $stmt = $pdo->prepare("SELECT * FROM users WHERE name = ?");
            $stmt->execute([$name]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])){
                $_SESSION['user_id'] = $user['ID'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['is_admin'] = (bool)$user['type'];

                if ($user ['type'] == 1){
                    header("Location: admin_panel.php");
                }else{
                    header("Location: user_panel.php");
                }
                exit;
            }else {
                $info = "Mail or password is incorrect";
                echo $info;
            }

            
        }
        ?>

        <?php if (isset($_GET['logout']) && $_GET['logout'] == 1): ?>
            <script>
                alert("You've been logged out.");
            </script>
        <?php endif; ?>

    </div>



</body>


