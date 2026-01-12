<?php
    function handle_login($pdo, $username, $password) {
        $user = get_user_by_username($pdo, $username);

        if ($user && password_verify($password, $user['password'])) {
            // LOGIN RIUSCITO
            session_regenerate_id(true);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];  
            
            return true;
        } else {
            return "Username o password non validi.";
        }
    }

    function get_user_by_username($pdo, $username) {
        $sql = "SELECT * FROM utente WHERE nomeUtente = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username]);
        
        // fetch() restituisce la riga trovata, o 'false' se non trova nulla.
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function create_user($pdo, $username, $password) {
    // Validazione
    if (empty($username) || empty($password)) {
        return "Tutti i campi sono obbligatori.";
    }

    //controllo lunghezza minima password
    if (strlen($password) < 8) {
        return "La password deve contenere almeno 8 caratteri.";
    }
    
    // Controlla se l'utente esiste già
    if (get_user_by_username($pdo, $username)) {
        return "Questo username è già stato preso.";
    }

    // Hash della password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Inserisci l'utente
    try {
        $sql = "INSERT INTO utenti (username, password, role) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $hashed_password, $role]);
        return true;
    } catch (\PDOException $e) {
        return "Errore DB: Impossibile creare l'utente."; 
    }
}
?>