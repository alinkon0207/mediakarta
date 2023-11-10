
<?php
    include('../bootstrap.php');

    /* Initialize session variables */
    $_SESSION['user_id'] = '';
    $_SESSION['email'] = '';
    $_SESSION['passwd'] = '';
    $_SESSION['username'] = '';
    $_SESSION['role'] = '';

    header("Location: " . BASE_URL . "/../auth");
?>
