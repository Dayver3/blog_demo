<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
</head>
<body>
<h1>Login</h1>
<?php
if($error) {
    echo $error;
}
?>
<form action="/login/apply" method="post">
    <label>
        <p>Input your email</p>
        <input type="email" name="email">
        <p>Input your pass</p>
        <input type="text" name="password">
        <input type="submit">
    </label>
</form>
</body>
</html>