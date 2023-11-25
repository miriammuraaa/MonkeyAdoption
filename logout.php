<?php
session_start();

// Desvincula todas las variables de sesión actualmente registradas
$_SESSION = array();

// Borra la cookie de sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destruye la sesión
session_destroy();

// Redirige a la página de inicio o a donde desees después del logout
header('Location: /MonkeyAdoption');
exit();
?>
