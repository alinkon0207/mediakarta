
<?php
    include('../bootstrap.php');

    ob_start();
    
    // Define variables and initialize with empty values
    $email = $email_err = "";
    $password = $password_err = "";
    $fullname = $fullname_err = "";
    $tg_chat_id = $tg_err = "";
    $delay = $delay_err = "";
    $msg = $error_msg = "";

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if email is empty
        if (empty(trim($_POST['email']))) {
            $email_err = 'Please enter email.';
        } else {
            $email = trim($_POST['email']);
        }

        // Check if password is empty
        if (empty(trim($_POST['password']))) {
            $password_err = 'Please enter password.';
        } else {
            $password = trim($_POST['password']);
        }

        // Check if fullname is empty
        if (empty(trim($_POST['fullname']))) {
            $fullname_err = 'Please enter fullname.';
        } else {
            $fullname = trim($_POST['fullname']);
        }

        // Check if tg_chat_id is empty
        if (empty(trim($_POST['telegram']))) {
            $tg_err = 'Please enter Telegram chat ID.';
        } else {
            $tg_chat_id = trim($_POST['telegram']);
        }

        // Check if delay is empty
        if (empty(trim($_POST['delay']))) {
            $delay_err = 'Please enter delay.';
        } else {
            $delay = trim($_POST['delay']);
        }

        // Validate credentials
        if (empty($email_err) && empty($password_err) && empty($fullname_err) && empty($tg_err) && empty($delay_err)) {
            /*DATABASE CONNECTION */
            global $conn;

            $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$conn) {
                die("Cannot Establish A Secure Connection To The Host Server At The Moment!");
            }

            $sql = "SELECT id FROM users WHERE email = '$email'";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Execute the statement
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) > 0) {
                    $error_msg = "Duplicate user, please choose another email";
                } else {
                    mysqli_stmt_close($stmt);

                    // Prepare a INSERT statement
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO users (email, passwd, fullname, role, tg_chat_id, delay)" . 
                            "VALUES('$email', '$hashedPassword', '$fullname', 'author', $tg_chat_id, $delay)";
                    echo $sql;
                    if ($stmt = mysqli_prepare($conn, $sql)) {
                        // Attempt to execute the prepared statement
                        if (mysqli_stmt_execute($stmt)) {
                            // Store result
                            mysqli_stmt_store_result($stmt);

                            $msg = "User created successfully.";
                        } else {
                            echo "Oops! Something went wrong. Please try again later.";
                        }

                        // Close statement
                        mysqli_stmt_close($stmt);
                    }
                }
            }

            // Close connection
            mysqli_close($conn);
        }

        $email = "";
        $password = "";
        $fullname = "";
        $tg_chat_id = "";
        $delay = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>Dashboard - EAGLEeye</title>
        <link rel="icon" href="<?php echo BASE_URL; ?>/public/assets/img/logo.png" type="image/png">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/light/loader.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,700">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/bootstrap/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/light/plugins.css" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/plugins/src/table/datatable/datatables.css" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/plugins/css/light/table/datatable/dt-global_style.css" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/plugins/src/notyf/notyf.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/plugins/src/tagify/tagify.css" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/plugins/src/summernote/summernote-lite.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/plugins/css/light/tagify/custom-tagify.css" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/light/apps/blog-create.css" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/light/components/tabs.css" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/light/components/list-group.css" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/light/users/account-setting.css" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/light/pages/knowledge_base.css" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/light/dashboard/dash_1.css" type="text/css">
        <script src="<?php echo BASE_URL; ?>/public/loader.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/global/vendors.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/table/datatable/datatables.js"></script>
    </head>
    
    <body class="layout-boxed" monica-version="3.1.2" monica-id="ofpnmcalabcbjgholdjcjblkibolbppb">

        <?php include '../header.html'; ?>
        
        <div class="main-container" id="container">
            <div class="overlay"></div>
            <div class="search-overlay"></div>

            <?php include '../sidebar.html'; ?>

            <div id="content" class="main-content">
                <div class="layout-px-spacing">
                    <div class="middle-content container-xxl p-0">
                        <div class="page-meta">
                            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>/users">Users</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Create User</li>
                                </ol>
                            </nav>
                        </div>
                        <form method="post">
                            <div class="row layout-spacing layout-top-spacing">
                                <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4 mx-auto">
                                    <div class="widget-content widget-content-area blog-create-section p-4">
                                        <div class="row">
                                            <div class="col-xxl-12 col-md-12 mb-4">
                                                <label for="email">Email</label>
                                                <input type="text" id="email" name="email" class="form-control">
                                            </div>
                                            <div class="col-xxl-12 col-md-12 mb-4">
                                                <label for="password">Password</label>
                                                <input type="password" id="password" name="password" class="form-control">
                                            </div>
                                            <div class="col-xxl-12 col-md-12 mb-4">
                                                <label for="fullname">Fullname</label>
                                                <input type="text" id="fullname" name="fullname" class="form-control">
                                            </div>
                                            <div class="col-xxl-12 col-md-12 mb-4">
                                                <label for="email">Telegram (chat_id)</label>
                                                <input type="number" id="telegram" name="telegram" class="form-control">
                                            </div>
                                            <div class="col-xxl-12 col-md-12">
                                                <label for="delay">Delay (ms)</label>
                                                <input type="number" id="delay" name="delay" class="form-control" min="1000">
                                            </div>
                                            <p></p>
                                            <p></p>
                                            <div class="col-xxl-12 col-sm-4 col-12 mb-4">
                                                <button type="submit" name="submit" class="btn btn-primary w-100 _effect--ripple waves-effect waves-light">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save">
                                                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                                        <polyline points="7 3 7 8 15 8"></polyline>
                                                    </svg>
                                                    <span class="fw-bold">Create User</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <?php include('../footer.html'); ?>
            </div>
        </div>
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/mousetrap/mousetrap.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/waves/waves.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/notyf/notyf.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/summernote/summernote-lite.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/tagify/tagify.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/assets/js/apps/blog-create.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/app.js"></script>
        <script>
            var notyf = new Notyf({
                duration: 3000,
                position: {
                    x: 'right',
                    y: 'top',
                }
            });

            <?php 
                if ($email_err != "")
                    echo "notyf.error('$email_err');";
                if ($password_err != "")
                    echo "notyf.error('$password_err');";
                if ($fullname_err != "")
                    echo "notyf.error('$fullname_err');";
                if ($tg_err != "")
                    echo "notyf.error('$tg_err');";
                if ($delay_err != "")
                    echo "notyf.error('$delay_err');";
                if ($error_msg != "")
                    echo "notyf.error('$error_msg');";
                
                if ($msg != "")
                    echo "notyf.open({type: 'success', message: '$msg'});";
            ?>
        </script>
        <div class="notyf"></div>
        <div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>

        <div id="monica-content-root" class="monica-widget"></div>
    </body>
</html>
