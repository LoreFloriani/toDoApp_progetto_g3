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
        $sql = "SELECT * FROM utenti WHERE username = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username]);
        
        // fetch() restituisce la riga trovata, o 'false' se non trova nulla.
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>