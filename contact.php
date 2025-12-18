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
        <h1>Sending message form</h1>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" class ="contact-form" method="post">
            <label for="name">Your name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Your mail:</label>
            <input type="email" id="email" name="email" required placeholder="np. your.email@gmail.com">
            
            <label for="message">Your message:</label>
            <textarea name="message" id="message" cols="30" rows="10" required></textarea>
            
            <input type="submit" value="Submit" id="submitMsg">
        </form>
    </div>
</body>

<?php 
$info = "";
$infoSuccess = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    try{
        $sql = "INSERT INTO Messages (name, Mail, message) VALUES(?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $message]);
        $infoSuccess = "Your message has been send";
    }catch (PDOException $e){
        $info = "Something went wrong. Try again.";
    }
}
$pdo = null;
?>
<?php if ($info): ?>
    <p class="msg"><?= htmlspecialchars($info) ?></p>
<?php elseif ($infoSuccess): ?>
    <p class="msgSc"><?= htmlspecialchars($infoSuccess) ?></p>   
<?php endif; ?>