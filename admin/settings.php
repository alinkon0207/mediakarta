
<?php
    include('./bootstrap.php');

    ob_start();
    
    // Define variables and initialize with empty values
    $fullname = "";
    $email = "";
    $passwd = "";

    $tg_chat_id = "";
    $delay = 0;

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_SESSION['user_id'];

        $fullname_err = "";
        $email_err = "";

        $tg_err = "";
        $delay_err = "";

        $msg = $error_msg = "";

        if ($_POST['submit'] == 'profile') {
            // Check if fullname is empty
            if (empty(trim($_POST['fullname']))) {
                $fullname_err = 'Please enter fullname.';
            } else {
                $fullname = trim($_POST['fullname']);
            }
            // Check if email is empty
            if (empty(trim($_POST['email']))) {
                $email_err = 'Please enter email.';
            } else {
                $email = trim($_POST['email']);
            }
            // Check if password is empty
            if (empty(trim($_POST['password']))) {
                $passwd = $_SESSION['passwd'];
            } else {
                $passwd = trim($_POST['password']);
            }
        } else if ($_POST['submit'] == 'telegram') {
            // Check if tg_chat_id is empty
            if (empty(trim($_POST['telegram']))) {
                $tg_err = 'Please enter Telegram Chat ID.';
            } else {
                $tg_chat_id = trim($_POST['telegram']);
            }
            // Check if delay is empty
            if (empty(trim($_POST['delay']))) {
                $delay_err = 'Please enter delay.';
            } else {
                $delay = trim($_POST['delay']);
            }
        } else {

        }

        // Validate credentials
        if (empty($fullname_err) && empty($email_err) && empty($tg_err) && empty($delay_err)) {
            /*DATABASE CONNECTION */
            global $conn;

            $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$conn) {
                die("Cannot Establish A Secure Connection To The Host Server At The Moment!");
            }

            $sql = "SELECT email FROM users WHERE id = $id";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Execute the statement
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) > 0) {
                    mysqli_stmt_close($stmt);

                    /* Update profile */
                    if ($_POST['submit'] == 'profile') {
                        // Prepare a INSERT statement
                        $hashedPassword = password_hash($passwd, PASSWORD_DEFAULT);

                        $sql = "UPDATE users " . 
                            "SET fullname='$fullname', email='$email', passwd='$hashedPassword' " . 
                            "WHERE id=$id";
                        if ($stmt = mysqli_prepare($conn, $sql)) {
                            // Attempt to execute the prepared statement
                            if (mysqli_stmt_execute($stmt)) {
                                // Store result
                                mysqli_stmt_store_result($stmt);

                                $_SESSION['username'] = $fullname;
                                $_SESSION['email'] = $email;
                                $_SESSOIN['passwd'] = $passwd;

                                $msg = "Profile is updated successfully.";
                            } else {
                                echo "Oops! Something went wrong. Please try again later.";
                            }

                            // Close statement
                            mysqli_stmt_close($stmt);
                        }
                    }
                    /* Update Telegram */
                    else if ($_POST['submit'] == 'telegram') {
                        // Prepare a INSERT statement
                        $sql = "UPDATE users " . 
                            "SET tg_chat_id=$tg_chat_id, delay=$delay " . 
                            "WHERE id=$id";
                        if ($stmt = mysqli_prepare($conn, $sql)) {
                            // Attempt to execute the prepared statement
                            if (mysqli_stmt_execute($stmt)) {
                                // Store result
                                mysqli_stmt_store_result($stmt);

                                $_SESSION['tg_chat_id'] = $tg_chat_id;
                                $_SESSION['delay'] = $delay;

                                $msg = "Telegram is updated successfully.";
                            } else {
                                echo "Oops! Something went wrong. Please try again later.";
                            }

                            // Close statement
                            mysqli_stmt_close($stmt);
                        }
                    }
                    /* Target Logs */
                    else {
                        $msg = "Updating Logs isn't supported yet";
                    }
                }
            }

            // Close connection
            mysqli_close($conn);
        }
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
        <!--<link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/light/apps/blog-create.css" type="text/css">-->
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/light/components/tabs.css" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/light/components/list-group.css" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/light/users/account-setting.css" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/light/pages/knowledge_base.css" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/assets/css/light/dashboard/dash_1.css" type="text/css">
        <script src="<?php echo BASE_URL; ?>/public/loader.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/global/vendors.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/table/datatable/datatables.js"></script>
    </head>
    
    <body class="layout-boxed" monica-version="3.1.2" monica-id="ofpnmcalabcbjgholdjcjblkibolbppb">

        <?php include './header.html'; ?>
        
        <div class="main-container" id="container">
            <div class="overlay"></div>
            <div class="search-overlay"></div>

            <?php include './sidebar.html'; ?>

            <div id="content" class="main-content">
                <div class="layout-px-spacing">
                    <div class="middle-content container-xxl p-0">
                        <div class="page-meta">
                            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="account-settings-container layout-top-spacing">
                            <div class="account-content">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <ul class="nav nav-pills" id="animateLine" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                        <circle cx="12" cy="7" r="4"></circle>
                                                    </svg>
                                                    Profile
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="telegram-tab" data-bs-toggle="tab" href="#telegram" role="tab" aria-controls="telegram" aria-selected="false" tabindex="-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
                                                        <line x1="22" y1="2" x2="11" y2="13"></line>
                                                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                                    </svg>
                                                    Telegram
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="targetlogs-tab" data-bs-toggle="tab" href="#targetlogs" role="tab" aria-controls="targetlogs" aria-selected="false" tabindex="-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-crosshair">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="22" y1="12" x2="18" y2="12"></line>
                                                        <line x1="6" y1="12" x2="2" y2="12"></line>
                                                        <line x1="12" y1="6" x2="12" y2="2"></line>
                                                        <line x1="12" y1="22" x2="12" y2="18"></line>
                                                    </svg>
                                                    Target Logs
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="animateLineContent-4">
                                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                                <form method="post" class="section general-info p-4">
                                                    <div class="row mb-3">
                                                        <div class="col-md-2 align-self-center">
                                                            <label for="fullname" class="form-label">Full Name</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo $_SESSION['username']; ?>" required="" autofocus="">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-2 align-self-center">
                                                            <label for="email" class="form-label">Email Address</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-2 align-self-center">
                                                            <label for="password" class="form-label">Password</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="password" name="password" id="password" class="form-control" placeholder="Leave it blank if you don't want to change">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-8 text-end">
                                                            <button type="submit" name="submit" value="profile" class="btn btn-primary _effect--ripple waves-effect waves-light">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save">
                                                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                                                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                                                    <polyline points="7 3 7 8 15 8"></polyline>
                                                                </svg>
                                                                <span class="fw-bold">Save</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="telegram" role="tabpanel" aria-labelledby="telegram-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                                <form method="post" class="section general-info p-4">
                                                    <div class="row mb-3">
                                                        <div class="col-md-2 align-self-center">
                                                            <label for="telegram" class="form-label">Telegram (chat_id)</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="number" name="telegram" id="telegram" class="form-control" value="<?php echo $_SESSION['tg_chat_id']; ?>" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-2 align-self-center">
                                                            <label for="delay" class="form-label">Delay (ms)</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="number" name="delay" id="delay" class="form-control" value="<?php echo $_SESSION['delay']; ?>" min="1000" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-8 text-end">
                                                            <button type="submit" name="submit" value="telegram" class="btn btn-primary _effect--ripple waves-effect waves-light">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save">
                                                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                                                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                                                    <polyline points="7 3 7 8 15 8"></polyline>
                                                                </svg>
                                                                <span class="fw-bold">Save</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="targetlogs" role="tabpanel" aria-labelledby="targetlogs-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                                <form method="post" class="section general-info p-4">
                                                    <div class="row mb-3">
                                                        <div class="col-md-2 align-self-center">
                                                            <label for="location" class="form-label">Location</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" name="location" id="location" value="1" class="form-check-input" checked="" disabled="">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-2 align-self-center">
                                                            <label for="front_photo" class="form-label">Front Photo</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" name="front_photo" id="front_photo" value="1" class="form-check-input">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-2 align-self-center">
                                                            <label for="rear_photo" class="form-label">Rear Photo</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" name="rear_photo" id="rear_photo" value="1" class="form-check-input">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-2 align-self-center">
                                                            <label for="video" class="form-label">Video</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" name="video" id="video" value="1" class="form-check-input">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-8 text-end">
                                                            <button type="submit" name="submit" value="targetlogs" class="btn btn-primary _effect--ripple waves-effect waves-light">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save">
                                                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                                                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                                                    <polyline points="7 3 7 8 15 8"></polyline>
                                                                </svg>
                                                                <span class="fw-bold">Save</span>
                                                        </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include './footer.html'; ?>
            </div>
        </div>
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/mousetrap/mousetrap.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/waves/waves.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/notyf/notyf.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/summernote/summernote-lite.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/tagify/tagify.min.js"></script>
        <!--<script src="<?php echo BASE_URL; ?>/public/assets/js/apps/blog-create.js"></script>-->
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
                if ($fullname_err != "")
                    echo "notyf.error('$fullname_err');";
                if ($email_err != "")
                    echo "notyf.error('$email_err');";

                if ($tg_err != "")
                    echo "notyf.error('$tg_err');";
                if ($delay_err != "")
                    echo "notyf.error('$delay_err');";
                
                if ($msg != "")
                    echo "notyf.open({type: 'success', message: '$msg'});";
            ?>
        </script>
        <div class="notyf"></div>
        <div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>
        <div id="monica-content-root" class="monica-widget"></div>
    </body>
</html>
