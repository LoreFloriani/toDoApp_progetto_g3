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
                        '<div class="evento" >' .
                        '<h3>' . $evento['titolo'] . '</h3>' .
                        '<p>' . $evento['descrizione'] . '</p>' .
                        '<div class="eventoCategoria">
                            <small>' . $evento['scadenza'] . '</small>' .
                            '<span class="categoria">' . $evento['nomeCategoria'] . '</span>
                        </div>
                        <div class="bottoniEventi">
                            <button class="btn-elimina-Ev" data-id="' . $evento['idEvento'] . '">
                                <img src="../img/trash.png" alt="Elimina" />
                            </button>
                            <button class="btn-evento-nCompletato" data-id="' . $evento['idEvento'] . '">
                                <img src="../img/done.png" alt="Completato" />
                            </button>
                            
                        </div>' .
                        '</div>');
            }
        }else{
            foreach ($eventi as $evento) {
                echo(
                        '<div class="evento completato" data-id="' . $evento['idEvento'] . '">' .
                        '<h3>' . $evento['titolo'] . '</h3>' .
                        '<p>' . $evento['descrizione'] . '</p>' .
                        '<div class="eventoCategoria">
                            <small>' . $evento['scadenza'] . '</small>' .
                        '<span class="categoria">' . $evento['nomeCategoria'] . '</span>
                        </div>
                        <div class="bottoniEventi">
                            <button class="btn-elimina-Ev" data-id="' . $evento['idEvento'] . '">
                                <img src="../img/trash.png" alt="Elimina" />
                            </button>
                            <button class="btn-evento-completato" data-id="' . $evento['idEvento'] . '">
                                <img src="../img/done.png" alt="Completato" />
                            </button>
                            
                        </div>' .
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
        <h2 class="h2SectionUrgente">Urgente</h2>
        <div class="grid-eventi">
        <?php
        printEvent($pdo,0,2);
        ?>
        </div>
    </section>


    <section>
        <h2 class="h2SectionPs">Prossima Settimana</h2>
        <div class="grid-eventi">
            <?php
            printEvent($pdo,2,7);
            ?>
        </div>
    </section>

    <section>
        <h2 class="h2SectionNurgente">Senza fretta</h2>
        <div class="grid-eventi">
            <?php
            printEvent($pdo,7);
            ?>
        </div>
    </section>

    <details>
        <summary>
            <img src="../img/done.png" alt="immagine completati" class="summaryCompletati">
            Eventi completati</summary>
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

            <label>
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
            </label>

            <button type="submit">Crea</button>
        </form>
    </div>




</main>

</body>
</html>
