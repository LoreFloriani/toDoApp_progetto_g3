<?php
session_start();
if (!isset($_SESSION['user_id'])){
    header("Location: index.html");
    exit;
}

require_once '../core/functions.php';
require_once '../core/database.php';


$now = new DateTime();

function printEvent($pdo,$after = 0, $before = 0) {

    $eventi = getEventi($pdo,$_SESSION['user_id'],$after,$before);

    if (isset($eventi)) {
        if ($after !=0 || $before !=0) {
            foreach ($eventi as $evento) {
                echo(
                        '<div class="evento" data-id="' . $evento['idEvento'] . '">' .
                        '<h3>' . $evento['titolo'] . '</h3>' .
                        '<p>' . $evento['descrizione'] . '</p>' .
                        '<small>' . $evento['scadenza'] . '</small>' .
                        '<span class="categoria">' . $evento['nomeCategoria'] . '</span>' .
                        '</div>');
            }
        }else{
            foreach ($eventi as $evento) {
                echo(
                        '<div class="evento completato" data-id="' . $evento['idEvento'] . '">' .
                        '<h3>' . $evento['titolo'] . '</h3>' .
                        '<p>' . $evento['descrizione'] . '</p>' .
                        '<small>' . $evento['scadenza'] . '</small>' .
                        '<span class="categoria">' . $evento['nomeCategoria'] . '</span>' .
                        '</div>');
            }
        }

    }

}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Remindly - Home</title>
    <link rel="stylesheet" href="../css/homeStyle.css?v=<?=time() ?>" type="text/css">
    <script defer src="../js/homeScript.js"></script>
</head>
<body>

<header>
    <div class="header-left">
        <a href="../index.html"><img src="../img/logo.png" alt="Logo Remindly" class="logo-small"></a>

        <h1>Remindly</h1>
    </div>
    <div class="header-right">
        <a href="private/destroySession.php" class="btn-logout">Logout</a>
    </div>
</header>

<main>

    <section>
        <h2>🔴 Scadenze urgenti (entro 2 giorni)</h2>
        <div class="grid-eventi">
        <?php
        printEvent($pdo,0,2);
        ?>
        </div>
    </section>


    <section>
        <h2>🟠 Scadenze vicine (entro 7 giorni)</h2>
        <div class="grid-eventi">
            <?php
            printEvent($pdo,2,7);
            ?>
        </div>
    </section>

    <section>
        <h2>🟢 Scadenze lontane</h2>
        <div class="grid-eventi">
            <?php
            printEvent($pdo,2);
            ?>
        </div>
    </section>

    <details>
        <summary>✅ Eventi completati</summary>
        <div class="grid-eventi" id="completati">
            <?php
            printEvent($pdo);
            ?>
        </div>
    </details>

    <button class="floatingBtn" id="newEvent">+</button>

    <div id="newEventForm" class="newEventForm">
        <form method="post" action="private/hendleCrateEvent.php" id="newEventForm">
            <button type="button" class="closeForm">&times;</button>
            <h2>Crea evento:</h2>

            <label>
                Titolo:
                <input type="text" name="titolo" id="titolo" required>
            </label>

            <label>
                Descrizione:
                <input type="text" name="descrizione" id="descrizione" required>
            </label>

            <label>
                Scadenza:
                <input type="date" name="scadenza" id="scadenza" required>
            </label>

            <select name="idCategoria" id="idCategoria" class="selectCategoria">
                <option value="" disabled selected>
                    Seleziona categoria
                </option>
                <?php
                $cat = getCategorie($pdo);
                foreach ($cat as $categoria) {
                    echo '<option value="' . $categoria['idCategoria'] . '">' . $categoria['nomeCategoria'] . '</option>';
                }
                ?>
            </select>

            <button type="submit">Crea</button>
        </form>
    </div>




</main>

</body>
</html>
