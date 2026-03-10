<?php
require '../cfg.php';

if(isset($_POST['hozzaadas-gomb'])){
    $teljes_nev = $_POST['teljes_nev'];
    $jelszo = password_hash($_POST['jelszo'], PASSWORD_DEFAULT);
    
    $ugyfel_azonosito = rand(10000000, 99999999);
    
    $ellenorzes = $conn->query("SELECT id FROM users WHERE id = '$ugyfel_azonosito'");
    
    if($ellenorzes->num_rows == 0){
        $conn->query("INSERT INTO users VALUES('$ugyfel_azonosito', '$teljes_nev', '$jelszo')");
    } else { //hiba kezeles
        $ugyfel_azonosito = rand(10000000, 99999999);
        $conn->query("INSERT INTO users VALUES('$ugyfel_azonosito', '$teljes_nev', '$jelszo')");
    }
}

if(isset($_POST["torles-gomb"])){
    $ugyfel_id = $_POST['ugyfel_id'];
    $conn->query("DELETE FROM users WHERE id = '$ugyfel_id'");
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bankár Adminisztráció</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h1 class="mb-4">Bankár Irányítópult</h1>
    
    <div class="mb-4">
        <input type="text" id="kereso-input" class="form-control" placeholder="Keresés azonosító alapján (8 számjegy)...">
    </div>

    <div id="ugyfelek-lista">
        <?php
        $lekerdezes = "SELECT * FROM users";
        $talalt_ugyfelek = $conn->query($lekerdezes);
        
        while($sor = $talalt_ugyfelek->fetch_assoc()){
            echo "<div class='ugyfel-elem card mb-2 p-3'>";
            echo "<div class='d-flex justify-content-between align-items-center'>";
            echo "<div>";
            echo "<a href='ugyfel_reszletek.php?id=$sor[id]' class='ugyfel-azonosito fw-bold text-decoration-none'>".$sor['id']."</a>";
            echo "<span> – ".$sor['name']."</span>";
            echo "</div>";
            
            echo "<form method='post' onsubmit='return confirm(\"Biztosan törli az ügyfelet?\")'>";
            echo "<input type='hidden' name='ugyfel_id' value='".$sor['id']."'>";
            echo "<input type='submit' value='Törlés' name='torles-gomb' class='btn btn-danger btn-sm'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        } 
        ?>
    </div>

    <hr class="my-5">

    <div class="card p-4 bg-light">
        <h3>Új ügyfél rögzítése</h3>
        <form method="post">
            <div class="mb-3">
                <label for="teljes_nev" class="form-label">Teljes név:</label>
                <input type="text" id="teljes_nev" name="teljes_nev" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jelszo" class="form-label">Netbank jelszó:</label>
                <input type="password" id="jelszo" name="jelszo" class="form-control" required>
            </div>
            <input type="submit" value="Ügyfél Hozzáadása" name="hozzaadas-gomb" class="btn btn-success">
        </form>
    </div>

    <div class="mt-4">
        <a href="../index.php" class="btn btn-secondary">Vissza a főoldalra</a>
    </div>

<script>
const keresoInput = document.querySelector('#kereso-input');
const ugyfelElemek = document.querySelectorAll('.ugyfel-elem');

keresoInput.addEventListener('input', () => {
    const szuro = keresoInput.value.toLowerCase().trim();
    ugyfelElemek.forEach(elem => {
        const azonosito = elem.querySelector('.ugyfel-azonosito').textContent.toLowerCase();
        if(azonosito.includes(szuro) || szuro === "") {
            elem.style.display = "";
        } else {
            elem.style.display = "none";
        }
    });
});
</script>
</body>
</html>
