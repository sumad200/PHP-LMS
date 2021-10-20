<?php
// Initialize the session.
session_start();


$_SESSION = array();


// This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// destroy the session.
session_destroy();
echo "<script>
alert('You have logged out successfully');
window.location.href='index.html';
</script>";
?>
