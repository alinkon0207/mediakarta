
<?php
    include('../bootstrap.php');

    /*DATABASE CONNECTION */
    global $conn;

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        die("Cannot Establish A Secure Connection To The Host Server At The Moment!");
    }

    $user_id = $_SESSION['user_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
    } else {
        if ($_SESSION['role'] == 'admin') {
            $sql = "SELECT id, title, permalink, category, date, contents, tags FROM posts";
        } else {
            $sql = "SELECT id, title, permalink, category, date, contents, tags FROM posts WHERE author = $user_id";
        }
    
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Execute the statement
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
    
            // Count records & pages
            $records = mysqli_stmt_num_rows($stmt);
            $npage = 1;
            $pages = intdiv($records + 9, 10);

            mysqli_stmt_close($stmt);

            // Fetch rows
            $sql = $sql . " LIMIT 10";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Execute the statement
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                $result = mysqli_query($conn, $sql);
            }
        }
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
                                    <li class="breadcrumb-item active" aria-current="page">Posts</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="row layout-top-spacing">
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-8">
                                    <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                        <div class="dt--top-section">
                                            <div class="row">
                                                <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                                                    <div class="dataTables_length" id="zero-config_length">
                                                        <label>Results :  
                                                            <select name="zero-config_length" aria-controls="zero-config" class="form-control">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3">
                                                    <div id="zero-config_filter" class="dataTables_filter">
                                                        <label>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                                                <circle cx="11" cy="11" r="8"></circle>
                                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                            </svg>
                                                            <input type="search" class="form-control" placeholder="Search..." aria-controls="zero-config">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="zero-config" class="table dt-table-hover dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="zero-config_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1" style="width: 928px;" aria-label="Title: activate to sort column ascending">Title</th>
                                                        <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1" style="width: 97px;" aria-label="Category: activate to sort column ascending">Category</th>
                                                        <th width="150" class="sorting_desc" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1" style="width: 150px;" aria-sort="descending" aria-label="Date: activate to sort column ascending">Date</th>
                                                        <th width="70" class="sorting_disabled" rowspan="1" colspan="1" style="width: 50px;" aria-label="Option">Option</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                    if ($records > 0) {
                                                        echo "<tbody>";
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo '<tr role="row">
                                                                <td>' . $row['title'] . '
                                                                    <small>
                                                                        <a href="javascript:void(0);" onclick="copyToClipboard(\'' . BASE_URL . '/read/' . $row['permalink'] . '\')" title="Copy Link">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy">
                                                                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                                                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                                                            </svg>
                                                                        </a>
                                                                    </small>
                                                                </td>
                                                                <td>' . $row['category'] . '</td>
                                                                <td class="sorting_1">' . $row['date'] . '</td>
                                                                <td>
                                                                    <a class="badge badge-light-primary text-start me-2 action-edit" href="' . BASE_URL . '/posts/edit/index.php?id=' . $row['id'] . '">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                                                            <path d="M12 20h9"></path>
                                                                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                                                        </svg>
                                                                    </a>
                                                                </td>
                                                            </tr>';
                                                        }
                                                        echo "</tbody>";
                                                    }

                                                    mysqli_stmt_close($stmt);
                                                ?>
                                            </table>
                                            <div id="zero-config_processing" class="dataTables_processing card" style="display: none;">Processing...</div>
                                        </div>
                                        <div class="dt--bottom-section d-sm-flex justify-content-sm-between text-center">
                                            <div class="dt--pages-count  mb-sm-0 mb-3">
                                                <div class="dataTables_info" id="zero-config_info" role="status" aria-live="polite">Showing page <?php echo $npage; ?> of <?php echo $pages; ?></div>
                                            </div>
                                            <div class="dt--pagination">
                                                <div class="dataTables_paginate paging_simple_numbers" id="zero-config_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous<?php echo ($npage == 1) ? " disabled" : ""; ?>" id="zero-config_previous">
                                                            <a href="#" aria-controls="zero-config" data-dt-idx="0" tabindex="0" class="page-link">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                                                                    <line x1="19" y1="12" x2="5" y2="12"></line>
                                                                    <polyline points="12 19 5 12 12 5"></polyline>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <?php
                                                            for ($i = 1; $i <= $pages; $i++) {
                                                                echo '<li class="paginate_button page-item' . (($i == $npage) ? " active" : "") . '">
                                                                    <a href="#" aria-controls="zero-config" data-dt-idx="1" tabindex="0" class="page-link">'. $i . '</a>
                                                                </li>';
                                                            }
                                                        ?>
                                                        <li class="paginate_button page-item next<?php echo ($npage == $pages) ? " disabled" : ""; ?>" id="zero-config_next">
                                                            <a href="#" aria-controls="zero-config" data-dt-idx="3" tabindex="0" class="page-link">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                    <polyline points="12 5 19 12 12 19"></polyline>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            // $('#zero-config').DataTable({
                            //     "processing": true,
                            //     "serverSide": true,
                            //     "ajax": {
                            //         "url": "<?php echo BASE_URL; ?>/posts/data",
                            //         "type": "POST"
                            //     },
                            //     "columns": [
                            //         { "data": "id", "visible": false },
                            //         { "data": "title" },
                            //         { "data": "content", "visible": false },
                            //         { "data": "category" },
                            //         { "data": "created_at" },
                            //         { "data": "option", "orderable": false }
                            //     ],
                            //     "order": [[4, "desc"]],
                            //     "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                            //     "<'table-responsive'tr>" +
                            //     "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                            //     "oLanguage": {
                            //         "oPaginate": { 
                            //             "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', 
                            //             "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' 
                            //         },
                            //         "sInfo": "Showing page _PAGE_ of _PAGES_",
                            //         "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                            //         "sSearchPlaceholder": "Search...",
                            //         "sLengthMenu": "Results :  _MENU_",
                            //     },
                            //     "stripeClasses": []
                            // });
                        </script>
                    </div>
                </div>
                
                <?php include '../footer.html'; ?>
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
