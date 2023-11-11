
<?php
    include('../admin/bootstrap.php');

    ob_start();
    
    // LOGIN SCRIPT
    global $conn;

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        die("Cannot Establish A Secure Connection To The Host Server At The Moment! (1)");
    }

    /*DATABASE CONNECTION */
    // Define variables and initialize with empty values
    $email = $password = "";
    $email_err = $password_err = "";

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if email is empty
        if (empty(trim($_POST["email"]))) {
            $email_err = 'Please enter an email address.';
        } else {
            $email = trim($_POST["email"]);
        }

        // Check if password is empty
        if (empty(trim($_POST['password']))) {
            $password_err = 'Please enter your password.';
        } else {
            $password = trim($_POST['password']);
        }

        // Validate credentials
        if (empty($email_err) && empty($password_err)) {
            // Prepare a select statement
            $sql = "SELECT id, passwd, fullname, role FROM users WHERE email = ?";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $email);

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if email exists, verify password
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $user_id, $hashed_password, $username, $role);
                        if (mysqli_stmt_fetch($stmt)) {
                            if (password_verify($password, $hashed_password)) {
                                /* Password is correct, so start a new session and
                                save the email to the session */
                                $_SESSION['user_id'] = $user_id;
                                $_SESSION['email'] = $email;
                                $_SESSION['passwd'] = $password;
                                $_SESSION['username'] = $username;
                                $_SESSION['role'] = $role;

                                header("Location: " . BASE_URL . "/dashboard");
                            } else {
                                // Display an error message if password is not valid
                                $password_err = 'The password you entered was not valid. Please try again.';
                            }
                        }
                    } else {
                        // Display an error message if email doesn't exist
                        $email_err = 'No account found with that email. Please recheck and try again.';
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }

        // Close connection
        mysqli_close($conn);
    }
?>
<!--- LOGIN SCRIPT----->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>Login</title>
        <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL; ?>/public/assets/img/favicon.ico">
        <link href="<?php echo BASE_URL; ?>/public/css/light/loader.css" href="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>/public/css/dark/loader.css" href="stylesheet" type="text/css">
        <script src="<?php echo BASE_URL; ?>/public/loader.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link href="<?php echo BASE_URL; ?>/public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>/public/css/light/plugins.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>/public/assets/css/light/authentication/auth-boxed.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>/public/css/dark/plugins.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>/public/assets/css/dark/authentication/auth-boxed.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>/public/plugins/src/notyf/notyf.min.css" rel="stylesheet" type="text/css">
    </head>

    <body class="form layout-boxed" monica-version="3.1.2" monica-id="ofpnmcalabcbjgholdjcjblkibolbppb">
        <div class="auth-container d-flex">
            <div class="container mx-auto align-self-center">
                <div class="row">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                        <div class="card mt-3 mb-3">
                            <div class="card-body">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <h2>Sign In</h2>
                                            <p>Enter your email and password to login</p>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" id="email" class="form-control" required="" autofocus="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-4">
                                                <label class="form-label">Password</label>
                                                <input type="password" name="password" id="password" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <div class="form-check form-check-primary form-check-inline">
                                                    <input class="form-check-input me-3" type="checkbox" id="form-check-default">
                                                    <label class="form-check-label" for="form-check-default">Remember me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" name="submit" class="btn btn-secondary w-100">SIGN IN</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo BASE_URL; ?>/public/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/notyf/notyf.min.js"></script>
        <script>
            var notyf = new Notyf({
                duration: 3000,
                position: {
                    x: 'right',
                    y: 'top',
                }});
            // notyf.error('Email or password is incorrect');
            <?php 
                if ($email_err != "")
                    echo "notyf.error('$email_err');";
                else if ($password_err != "")
                    echo "notyf.error('$password_err');";
            ?>
        </script>
        <div class="notyf" style="justify-content: flex-start; align-items: flex-end;"></div>
        <div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;">Email or password is incorrect</div>
        <div id="monica-content-root" class="monica-widget"></div></body>
</html>
