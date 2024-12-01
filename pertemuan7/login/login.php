<?php
if(isset($_POST["submit"])){

    if( $_POST["username"] == "admin" && $_POST["password"] == "123" ) {
        header("location: admin.php");
        exit;
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login Admin</h1>

    <?php if( isset($error)) : ?>
        <p style="color: red; font-style: italic;">username / password salah!</p>
        <?php endif; ?>
<ul>
<form action="" method="post">
    <li>
        <label for="username">Username :</label>
        <input type="text" name="username" id="username">
    </li>
    <li>
    <label for="password">Pasword :</label>
        <input type="text" name="pasword" id="password">
    </li>
    <li>
        <button type="submit" name="submit">Login</button>

    </li>



</form>
</ul>

</body>
</html>