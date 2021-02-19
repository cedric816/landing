<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--style avec variables php-->
    <link rel='stylesheet' type='text/css' href='style.php' />
</head>
<body>
    <h1>Accès admin</h1>
    <form method="POST" action="admin.php">
        <input type="text" name="login" placeholder="login" required>
        <input type="password" name="mdp" placeholder="mot de passe" required>
        <input type="submit" name="submit">
    </form>
</body>
</html>