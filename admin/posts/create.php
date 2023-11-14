
<?php
    include('../bootstrap.php');

    ob_start();
    
    // Define variables and initialize with empty values
    $user_id = $_SESSION['user_id'];
    $title = $title_err = "";
    $content = $content_err = "";
    $tags = $tags_err = "";
    $category = $category_err = "";
    $msg = $error_msg = "";

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if title is empty
        if (empty(trim($_POST['title']))) {
            $title_err = 'Please enter title.';
        } else {
            $title = trim($_POST['title']);
        }

        // Check if content is empty
        if (empty(trim($_POST['content']))) {
            $content_err = 'Please enter content.';
        } else {
            $content = trim($_POST['content']);
        }

        // Check if tags is empty
        if (empty(trim($_POST['tags']))) {
            $tags_err = 'Please enter tags.';
        } else {
            $tags = trim($_POST['tags']);
            $tags_str = tags_to_string($tags);
        }

        // Check if category is empty
        if (empty(trim($_POST['category']))) {
            $category_err = 'Please enter category.';
        } else {
            $category = trim($_POST['category']);
            $category_str = tags_to_string($category);
        }

        // Validate credentials
        if (empty($title_err) && empty($content_err) && empty($tags_err) && empty($category_err)) {
            /*DATABASE CONNECTION */
            global $conn;

            $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!$conn) {
                die("Cannot Establish A Secure Connection To The Host Server At The Moment!");
            }

            $permalink = title_to_permalink($title);
            $permalink = strtolower($permalink);

            $sql = "SELECT id FROM posts WHERE permalink = '$permalink'";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Execute the statement
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) > 0) {
                    $error_msg = "Duplicate post, please choose another post title";
                } else {
                    mysqli_stmt_close($stmt);

                    // Prepare a INSERT statement
                    $sql = "INSERT INTO posts (author, title, permalink, category, contents, tags) 
                            VALUES($user_id, '$title', '$permalink', '$category_str', '$content', '$tags_str')";
                    if ($stmt = mysqli_prepare($conn, $sql)) {
                        // Attempt to execute the prepared statement
                        if (mysqli_stmt_execute($stmt)) {
                            // Store result
                            mysqli_stmt_store_result($stmt);

                            $msg = "Post created successfully.";
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

        $title = "";
        $content = "";
        $tags = "";
        $category = "";
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
                                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>/posts">Posts</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Create Post</li>
                                </ol>
                            </nav>
                        </div>
                        <form method="post">
                            <div class="row layout-spacing layout-top-spacing">
                                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="widget-content widget-content-area blog-create-section p-4 pb-0">
                                        <div class="row mb-4">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="post-title" name="title" placeholder="Post Title" maxlength="128" required="" autofocus="" value="<?php echo $title; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-sm-12">
                                                <textarea id="summernote" name="content" style="display: none;"><?php echo $content; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
                                    <div class="widget-content widget-content-area blog-create-section p-4">
                                        <div class="row">
                                            <div class="col-xxl-12 col-sm-4 col-12 mb-4">
                                                <button type="submit" name="submit" class="btn btn-primary w-100 _effect--ripple waves-effect waves-light">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save">
                                                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                                        <polyline points="7 3 7 8 15 8"></polyline>
                                                    </svg>
                                                    <span class="fw-bold">Create Post</span>
                                                </button>
                                            </div>
                                            <div class="col-xxl-12 col-md-12 mb-4">
                                                <label for="tags">Tags</label>
                                                <input id="tag-tags" name="tags" class="blog-tags">
                                            </div>
                                            <div class="col-xxl-12 col-md-12 mb-4">
                                                <label for="category">Category</label>
                                                <input id="tag-category" name="category" placeholder="Choose...">
                                            </div>
                                            <div class="col-xxl-12 col-md-12 mb-4">
                                                <label for="telegram">Telegram (chat_id)</label>
                                                <input type="number" id="telegram" name="telegram" value="<?php echo $_SESSION['tg_chat_id']; ?>" class="form-control">
                                            </div>
                                            <div class="col-xxl-12 col-md-12">
                                                <label for="delay">Delay (ms)</label>
                                                <input type="number" id="delay" name="delay" value="<?php echo $_SESSION['delay']; ?>" class="form-control" min="1000">
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
                if ($title_err != "")
                    echo "notyf.error('$title_err');";
                if ($content_err != "")
                    echo "notyf.error('$content_err');";
                if ($tags_err != "")
                    echo "notyf.error('$tags_err');";
                if ($category_err != "")
                    echo "notyf.error('$category_err');";
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
