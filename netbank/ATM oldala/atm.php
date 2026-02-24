<?php
session_start();
require "../cfg.php";


if (isset($_GET['kijelentkezes'])) {
    session_destroy();
    header("Location: atm.php");
} 

    if (isset($_POST['belepes']) && !isset($_SESSION['atm_felhasznalo'])) {
        $lekerdezes = "SELECT * FROM tablanev";
        $talalt_sor = $conn->query($lekerdezes);
        $sor = $talalt_sor->fetch_assoc();
      
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>ATM Terminál</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/atm_style.css">
</head>
<body>

<div class="atm-keret">
    <div class="atm-kepernyo text-center">
        <h3 class="mb-4">BANKOMAT v1.0</h3>

        <?php if (!isset($_SESSION['atm_felhasznalo'])): ?>
            <p class="mt-4">Kérem, adja meg kártyaadatait!</p>
            <form method="POST">
                <input type="text" name="kartya_szam" class="form-control atm-bevitel" placeholder="Kártyaszám" required maxlength="16">
                <input type="password" name="pin_kod" class="form-control atm-bevitel" placeholder="PIN" required maxlength="4">
                <button type="submit" name="belepes" class="atm-gomb">KÁRTYA VALIDÁLÁSA</button>
            </form>
            <div class="mt-4">
                <a href="../index.php" class="text-success text-decoration-none small">< Vissza</a>
            </div>

        <?php else: ?>
            <div class="egyenseg-kijelzo">
                Egyenleg: <?= $conn->query($_SESSION['atm_felhasznalo']['balance'], 0, ',', ' ') ?> Ft
            </div>
            
            <form method="POST">
                <input type="number" name="osszeg" class="form-control atm-bevitel" placeholder="Összeg (Ft)" required>
                <div class="row gx-2">
                    <div class="col-6">
                        <button type="submit" name="muvelet" value="kivet" class="atm-gomb">KIFIZETÉS</button>
                    </div>
                    <div class="col-6">
                        <button type="submit" name="muvelet" value="befizet" class="atm-gomb">BEFIZETÉS</button>
                    </div>
                </div>
            </form>
            
            <div class="mt-5">
                <a href="?kijelentkezes=1" class="btn btn-outline-danger w-100 py-2">KÁRTYA KIADÁSA</a>
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
