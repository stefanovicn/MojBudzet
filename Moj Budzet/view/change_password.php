<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MojBudžet - Promena lozinke</title>
    <link rel="stylesheet" href="css/loginreg.css">
    <?php require_once __DIR__ . "/../inc/inc-head.php"; ?>
</head>
<body>
    <div class="auth-container">
        <h3>Promena lozinke</h3>
        <form method="post" action="change_password.php">
            <div>
                <label for="old_password" class="form-label">Stara lozinka</label><br>
                <input type="password" name="old_password" required>
            </div><br>
            <div>
                <label for="new_password" class="form-label">Nova lozinka</label><br>
                <input type="password" name="new_password" required>
            </div>
            <div><br>
                <label for="confirm_password" class="form-label">Potvrdi novu lozinku</label>
                <input type="password" name="confirm_password" required>
            </div><br>
            <button type="submit" class="btn btn-primary">Promeni lozinku</button><br><br>
            <a href="index.php" class="link-primary fw-bold">Nazad na sajt</a>
        </form>
    </div><br>
    <?php if (!empty($message)): ?>
        <div class="alert alert-<?= $status ?>"><?= $message ?></div>
    <?php endif; ?>
</body>
</html>