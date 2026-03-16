<div class="header-left">
    <img src="img/logoMB.png" alt="Logo">
    <div class="title">
        <h1>MojBudzet</h1>
        <span>Prati svoje troškove, planiraj budućnost!</span>
    </div>
</div>
<div class="header-right">
    <p class="welcome">Dobrodošao, <?= htmlspecialchars($_SESSION['username']) ?>!</p>
    <button class="btn btn-danger">
        <a href="logout.php" class="button-link">Izloguj se</a>
    </button>
    <button class="btn btn-warning">
        <a href="change_password.php" class="button-link" style="color:black;">Promeni šifru</a>
    </button>
    
</div>