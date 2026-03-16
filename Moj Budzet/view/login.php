<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MojBudžet - Login</title>
    <link rel="stylesheet" href="css/loginreg.css">
    <?php require_once __DIR__ . "/../inc/inc-head.php"; ?>
</head>
<body>
    <div class="auth-container">
        <div class="naslov">
            <img src="img/logoMB.png" alt="Logo sajta">
            <h1>MojBudžet</h1>
        </div>
        <h2>Prijava</h2><br>
        <form method="post" action="login.php">
            <input type="text" name="username" placeholder="Korisničko ime" required><br><br>
            <input type="password" name="password" placeholder="Lozinka" required><br><br>
            <button type="submit" name="login" class="btn btn-primary">Uloguj se</button><br><br>
        </form>
        <p>Nemaš nalog? <a href="register.php" class="link-primary fw-bold">Registruj se</a></p>
    </div><br>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger fw-bold">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>
</body>
</html>