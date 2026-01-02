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
?>