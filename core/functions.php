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