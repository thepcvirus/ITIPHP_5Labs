
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include("navbar.php") ?>
    <form action="loginvalidation.php" method="post">
        <label>Email</label>
        <input type="email" name="email">
        <br>
        <label>Password</label>
        <input type="password" name="password">
        <br>
        <input type="submit">
    </form>
</body>
</html>