<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MojBudžet</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="description" content="MojBudžet - lična aplikacija za praćenje prihoda i rashoda. Pregledaj svoj budžet i upravljaj finansijama na jednom mestu.">

    <?php require_once __DIR__ . "/../inc/inc-head.php"; ?>
</head>
<body>

<header>
    <?php require_once __DIR__ . "/../inc/inc-header.php"; ?>
</header>

<main>
    
    <h3>Dodaj kategoriju</h3>
    <form method="post" action="index.php?action=dodaj">
        <input type="text" name="naziv" placeholder="Naziv kategorije" required>
        <select name="tip">
            <option value="prihod">Prihod</option>
            <option value="rashod">Rashod</option>
        </select>
        <input type="number" step="0.01" name="iznos" placeholder="Iznos" required>
        <button type="submit" class="btn btn-success">Dodaj</button>
    </form>

    <h3>Lista kategorija</h3>
    <table class="table table-bordered table-hover">
    <tr>
        <th>
            <a href="index.php?sort=naziv&order=<?= ($_GET['order'] ?? 'ASC') === 'ASC' ? 'DESC' : 'ASC' ?>" class="link-primary" >
                Naziv
            </a>
        </th>
        <th>Tip</th>
        <th>
            <a href="index.php?sort=iznos&order=<?= ($_GET['order'] ?? 'ASC') === 'ASC' ? 'DESC' : 'ASC' ?>" class="link-primary" >
                Iznos
            </a>
        </th>
        <th>Akcije</th>
    </tr>
    <?php foreach ($kategorije as $kat): ?>
        <tr>
            <td><?= htmlspecialchars($kat['naziv']) ?></td>
            <td style="color: <?= ($kat['tip'] == "rashod") ? 'red' : 'green' ?>;"><b><?= $kat['tip'] ?></b></td>
            <td><?= $kat['iznos'] ?></td>
            <td>
                <form method="post" action="index.php?action=izmeni" style="display:inline;" >
                        <input type="hidden" name="id" value="<?= $kat['id'] ?>" style="width: 100px;">
                        <input type="text" name="naziv" value="<?= $kat['naziv'] ?>"  required>
                        <select name="tip">
                            <option value="prihod" <?= $kat['tip']=='prihod'?'selected':'' ?>>Prihod</option>
                            <option value="rashod" <?= $kat['tip']=='rashod'?'selected':'' ?>>Rashod</option>
                        </select>
                        <input type="number" step="0.01" name="iznos" value="<?= $kat['iznos'] ?>" required>
                        <button type="submit" class="btn btn-warning">Izmeni</button>
                </form>
                <button class="btn btn-danger">
                    <a href="index.php?action=obrisi&id=<?= $kat['id'] ?>" class="button-link" onclick="return confirm('Da li ste sigurni da želite da obrišete kategoriju?')">Obriši</a>
                </button>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>

    <h3 style="color: <?= ($budzet < 0) ? 'red' : 'green' ?>;">Trenutni budžet: <b><?= $budzet ?></b> RSD</h3>
</main>

<footer>
    <?php require_once __DIR__ . "/../inc/inc-footer.php"; ?>
</footer>

    
</body>
</html>