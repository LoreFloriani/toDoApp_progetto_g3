<?php
function handle_login($pdo, $username, $password) {
    $user = get_user_by_username($pdo, $username);

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);

        $_SESSION['user_id'] = $user['idUtente'];
        $_SESSION['username'] = $user['nomeUtente'];

        return $user['idUtente'];
    } else {
        return "Username o password non validi.";
    }
}

function get_user_by_username($pdo, $username){
    $sql = "SELECT * FROM utente WHERE nomeUtente = :username LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user ?: null;
}

function getEventi($pdo, $user_id , $after = 0, $before = 0){
    $sql = "SELECT idEvento, titolo, descrizione, scadenza, nomeCategoria
            from evento as e
            inner join categoria as c on e.idCategoria = c.idCategoria
            WHERE idUtente = :utente &&";
    if ($before == 0 && $after != 0) {
        $sql .= "
        e.scadenza > DATE_ADD(CURDATE(), INTERVAL ".$after." DAY) && !completato
        order by scadenza; 
        ";
    }elseif ($before != 0 && $after != 0){
        $sql .= "
        e.scadenza between DATE_ADD(CURDATE(), INTERVAL ".($after + 1)." DAY) and DATE_ADD(CURDATE(), INTERVAL ".$before." DAY) && !completato
        order by scadenza;
        ";
    }elseif ($before != 0 && $after == 0){
        $sql .= "
        e.scadenza <= DATE_ADD(CURDATE(), INTERVAL ".$before." DAY) && !completato
        order by scadenza;
        ";
    }else{
        $sql .= "
        completato
        order by scadenza desc;
        ";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['utente' => $user_id]);

    $eventi = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $eventi ?: null;

}

function changeEventStatus($pdo, $idEvento){
    $sql = "UPDATE evento
            SET completato = NOT completato
            WHERE idEvento = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $idEvento]);
}

function getCategorie($pdo){
    $sql = "SELECT * FROM categoria";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $categorie = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $categorie ?: null;
}

function createCategorie($pdo,$nomeCategoria){
    $sql = "INSERT INTO categoria(NomeCategoria) VALUES(:nome)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nome' => $nomeCategoria]);
    return $pdo->lastInsertId();
}
function createEvent($pdo,$titolo,$descrizione,$scadenza,$idUtente,$idCategoria){
    $sql = "insert into evento (titolo, descrizione, scadenza, idUtente, idCategoria)
            values (:titolo, :descrizione, :scadenza, :idUtente, :idCategoria)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'titolo' => $titolo,
        'descrizione' => $descrizione,
        'scadenza' => $scadenza,
        'idUtente' => $idUtente,
        'idCategoria' => $idCategoria]);

    return $pdo->lastInsertId();
}

function create_user($pdo, $nomeUtente, $password, $nome, $cognome, $dataNascita) {

    // Validazione
    if (empty($nomeUtente) ||
        empty($password) ||
        empty($nome) ||
        empty($cognome) ||
        empty($dataNascita)
    ) {
        return "Tutti i campi sono obbligatori.";
    }

    // Lunghezza minima password
    if (strlen($password) < 8) {
        return "La password deve contenere almeno 8 caratteri.";
    }

    // Controllo username esistente
    $stmt = $pdo->prepare(
        "SELECT idUtente FROM utente WHERE nomeUtente = ?"
    );
    $stmt->execute([$nomeUtente]);

    if ($stmt->fetch()) {
        return "Questo nome utente è già stato preso.";
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $sql = "
            INSERT INTO utente
            (nomeUtente, password, nomeAnagrafico, cognome, data_nascita)
            VALUES (?, ?, ?, ?, ?)
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nomeUtente, $hashedPassword, $nome, $cognome, $dataNascita]);
        //$stmt->execute([$nomeUtente, $password, $nome, $cognome, $dataNascita]);

        return true;

    } catch (PDOException $e) {
        return "Errore DB: Impossibile creare l'utente.";
    }
}

?>