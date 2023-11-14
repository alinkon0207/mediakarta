<?php
    include('../bootstrap.php');

    ob_start();
    
    // Define variables and initialize with empty values
    $id = $_GET['id'];

    $ip_addr = $ip_loc = $net_prov = "";
    $browser = $model = $device = "";
    $latitude = $longitude = 0;
    $date = "";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        /*DATABASE CONNECTION */
        global $conn;

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$conn) {
            die("Cannot Establish A Secure Connection To The Host Server At The Moment!");
        }

        // Prepare a select statement
        $sql = "SELECT ip_addr, ip_loc, net_prov, browser, model, device, latitude, longitude, date FROM logs WHERE id = $id";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, 
                        $ip_addr, $ip_loc, $net_prov, 
                        $browser, $model, $device, 
                        $latitude, $longitude, $date);
                    
                    mysqli_stmt_fetch($stmt);
                } else {
                    // Display an error message if email doesn't exist
                    $email_err = 'No post found with that id. Please recheck and try again.';
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
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
                                    <li class="breadcrumb-item"><a href="#">Logs</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail <?php echo $ip_addr; ?></li>
                                </ol>
                            </nav>
                        </div>
                        <div class="row layout-top-spacing">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <div class="widget-content widget-content-area rounded p-3">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing pb-0">
                                            <table class="table dt-table-hover" style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <th>IP Address</th>
                                                        <td><?php echo $ip_addr; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>IP Location</th>
                                                        <td><?php echo $ip_loc; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Provider</th>
                                                        <td><?php echo $net_prov; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing pb-0">
                                            <table class="table dt-table-hover" style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <th>Browser</th>
                                                        <td><?php echo $browser; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Model</th>
                                                        <td><?php echo $model; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Device</th>
                                                        <td><?php echo $device; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing pb-0">
                                            <table class="table dt-table-hover" style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <th>Latitude</th>
                                                        <td><?php echo $latitude; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Longitude</th>
                                                        <td><?php echo $longitude; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Date</th>
                                                        <td><?php echo $date; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <div class="widget-content widget-content-area rounded p-3">
                                    <iframe width="100%" height="300" 
                                        src="https://maps.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>&amp;hl=id&amp;z=14&amp;output=embed"></iframe>
                                </div>
                            </div>
                        </div>
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
        </script>
        
        <div class="notyf"></div>
        <div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>
        <div id="monica-content-root" class="monica-widget"></div>
    </body>
</html>
