
<?php
    include('../bootstrap.php');

    ob_start();
    
    /* DATABASE CONNECTION*/
    global $conn;

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        die("Cannot Establish A Secure Connection To The Host Server At The Moment! (1)");
    }

    $user_id = $_SESSION['user_id'];
    $email = $_SESSION['email'];
    $password = $_SESSION['passwd'];
    $is_admin = $_SESSION['role'] == 'admin';
    
    /*DATABASE CONNECTION */
    // Validate credentials
    if (!empty($email) && !empty($password)) {
        // Prepare select statements
        if ($is_admin) {
            // admin
            $sql1 = "SELECT COUNT(id) FROM posts";
            $sql2 = "SELECT COUNT(id) FROM logs";
            $sql3 = "SELECT COUNT(id) FROM users WHERE role = 'user'";
        } else {
            // user
            $sql1 = "SELECT COUNT(id) FROM posts WHERE author = '$user_id'";
            $sql2 = "SELECT COUNT(id) FROM posts, logs WHERE posts.author = '$user_id' AND posts.id = logs.post_id";
            $sql3 = "SELECT COUNT(id) FROM users WHERE id = '$user_id'";
        }

        $stmt1 = mysqli_prepare($conn, $sql1);
        $stmt2 = mysqli_prepare($conn, $sql2);
        $stmt3 = mysqli_prepare($conn, $sql3);

        if ($stmt1 && $stmt2 && $stmt3) {
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt1)) {
                mysqli_stmt_store_result($stmt1);
                mysqli_stmt_bind_result($stmt1, $NUM_POSTS);
                mysqli_stmt_fetch($stmt1);
            } else {
                echo "Oops! Something went wrong. Please try again later. (2-1)";
            }

            if (mysqli_stmt_execute($stmt2)) {
                mysqli_stmt_store_result($stmt2);
                mysqli_stmt_bind_result($stmt2, $NUM_LOGS);
                mysqli_stmt_fetch($stmt2);
            } else {
                echo "Oops! Something went wrong. Please try again later. (2-2)";
            }

            if (mysqli_stmt_execute($stmt3)) {
                mysqli_stmt_store_result($stmt3);
                mysqli_stmt_bind_result($stmt3, $NUM_USERS);
                mysqli_stmt_fetch($stmt3);
            } else {
                echo "Oops! Something went wrong. Please try again later. (2-3)";
            }

            // Close statements
            mysqli_stmt_close($stmt1);
            mysqli_stmt_close($stmt2);
            mysqli_stmt_close($stmt3);
        } else {
            echo "Oops! Something went wrong. Please try again later. (1)";
        }
    } else {
        echo "Invalid username or password!";
    }

    // Close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>Dashboard - Nisy Portal</title>
        <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL; ?>/public/assets/img/favicon.ico">
        <link href="<?php echo BASE_URL; ?>/public/css/light/loader.css" rel="stylesheet" type="text/css">
        <script src="<?php echo BASE_URL; ?>/public/loader.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link href="<?php echo BASE_URL; ?>/public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>/public/css/light/plugins.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>/public/plugins/src/table/datatable/datatables.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>/public/plugins/css/light/table/datatable/dt-global_style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>/public/plugins/src/notyf/notyf.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>/public/plugins/src/tagify/tagify.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>/public/plugins/src/summernote/summernote-lite.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>/public/plugins/css/light/tagify/custom-tagify.css" rel="stylesheet" type="text/css">
        <!--<link href="<?php echo BASE_URL; ?>/public/assets/css/light/apps/blog-create.css" rel="stylesheet" type="text/css">-->
        <link href="<?php echo BASE_URL; ?>/public/assets/css/light/components/tabs.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>/public/assets/css/light/components/list-group.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>/public/assets/css/light/users/account-setting.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>/public/assets/css/light/pages/knowledge_base.css" rel="stylesheet" type="text/css">
        <link href="<?php echo BASE_URL; ?>/public/assets/css/light/dashboard/dash_1.css" rel="stylesheet" type="text/css">
        <script src="<?php echo BASE_URL; ?>/public/plugins/src/global/vendors.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/bootstrap/js/bootstrap.bundle.min.js"></script>
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
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="row layout-top-spacing">
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <div class="widget-content widget-one_hybrid widget-content-area rounded">
                                    <div class="widget-heading">
                                        <div class="w-title m-0">
                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pen-tool">
                                                    <path d="M12 19l7-7 3 3-7 7-3-3z"></path>
                                                    <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path>
                                                    <path d="M2 2l7.586 7.586"></path>
                                                    <circle cx="11" cy="11" r="2"></circle>
                                                </svg>
                                            </div>
                                            <div class="">
                                                <p class="w-value"> <?php echo $NUM_POSTS; ?> </p>
                                                <h5 class="">Posts</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <div class="widget-content widget-one_hybrid widget-content-area rounded">
                                    <div class="widget-heading">
                                        <div class="w-title m-0">
                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                    <polyline points="14 2 14 8 20 8"></polyline>
                                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                                    <polyline points="10 9 9 9 8 9"></polyline>
                                                </svg>
                                            </div>
                                            <div class="">
                                                <p class="w-value"> <?php echo $NUM_LOGS ?> </p>
                                                <h5 class="">Target Logs</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <div class="widget-content widget-one_hybrid widget-content-area rounded">
                                    <div class="widget-heading">
                                        <div class="w-title m-0">
                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="9" cy="7" r="4"></circle>
                                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                </svg>
                                            </div>
                                            <div class="">
                                                <p class="w-value"> <?php echo $NUM_USERS; ?> </p>
                                                <h5 class="">Users</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include '../footer.html'; ?>
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
        </script>
        <div class="notyf"></div>
        <div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>
        <div id="monica-content-root" class="monica-widget"></div>
    </body>
</html>
