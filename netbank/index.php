<?php
require "cfg.php";


?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netbank Központi Irányítópult</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container py-5">
    <header class="text-center mb-5">
        <h1 class="display-4 fw-bold text-dark">Netbank <span style="color: var(--secondary-color);">Rendszer</span></h1>
        <p class="lead text-muted">Válassza ki a belépési pontot</p>
        <hr class="w-25 mx-auto">
    </header>

    <div class="row g-4 justify-content-center">
        <div class="col-md-6 col-lg-3">
            <a href="Bankár oldala/bankar.php" class="nav-link-custom">
                <div class="card h-100 main-card text-center p-4">
                    <div class="icon-circle"><i class="fas fa-user-tie"></i></div>
                    <h4 class="fw-bold">Bankár</h4>
                    <p class="small text-muted">Ügyfelek kezelése, számlanyitás, befizetés.</p>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="Ügyfél oldala/ugyfel.php" class="nav-link-custom">
                <div class="card h-100 main-card text-center p-4">
                    <div class="icon-circle" style="background: #28a745;"><i class="fas fa-wallet"></i></div>
                    <h4 class="fw-bold">Ügyfél</h4>
                    <p class="small text-muted">Netbank belépés, utalás, kártyák kezelése.</p>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="ATM oldala/atm.php" class="nav-link-custom">
                <div class="card h-100 main-card text-center p-4">
                    <div class="icon-circle" style="background: #343a40;"><i class="fas fa-credit-card"></i></div>
                    <h4 class="fw-bold">ATM</h4>
                    <p class="small text-muted">Készpénzfelvétel és PIN kód ellenőrzés.</p>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3">
            <a href="Fejlesztő oldala/admin.php" class="nav-link-custom">
                <div class="card h-100 main-card text-center p-4">
                    <div class="icon-circle" style="background: #ffc107; color: #000;"><i class="fas fa-tools"></i></div>
                    <h4 class="fw-bold">Fejlesztő</h4>
                    <p class="small text-muted">Rendszerkarbantartás és beállítások.</p>
                </div>
            </a>
        </div>
    </div>
</div>

<footer class="text-center mt-5 text-muted">
    <p><small>&copy; <?php echo date("Y"); ?> Netbank Projekt</small></p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
