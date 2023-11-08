<?php
    include('../../bootstrap.php');
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
        <link href="<?php echo BASE_URL; ?>/public/assets/css/light/apps/blog-create.css" rel="stylesheet" type="text/css">
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

        <?php include '../../header.html'; ?>
        
        <div class="main-container" id="container">
            <div class="overlay"></div>
            <div class="search-overlay"></div>

            <?php include '../../sidebar.html'; ?>

            <div id="content" class="main-content">
                <div class="layout-px-spacing">
                    <div class="middle-content container-xxl p-0">
                        <div class="page-meta">
                            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Logs</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail 116.206.8.36</li>
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
                                                        <td>116.206.8.36</td>
                                                    </tr>
                                                    <tr>
                                                        <th>IP Location</th>
                                                        <td>Bogor, West Java, Indonesia</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Provider</th>
                                                        <td>PT Hutchison 3 Indonesia</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing pb-0">
                                            <table class="table dt-table-hover" style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <th>Browser</th>
                                                        <td>Chrome Mobile 118.0.0.0</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Model</th>
                                                        <td> smartphone </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Device</th>
                                                        <td>Android 10 ( smartphone )</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing pb-0">
                                            <table class="table dt-table-hover" style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <th>Latitude</th>
                                                        <td>-6.5691303</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Longitude</th>
                                                        <td>106.8458503</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Date</th>
                                                        <td>2023-11-02 16:45:10</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                <div class="widget-content widget-content-area rounded p-3">
                                    <iframe width="100%" height="300" src="https://maps.google.com/maps?q=-6.5691303,106.8458503&amp;hl=id&amp;z=14&amp;output=embed"></iframe>
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
            
            // $(document).ready(function() {
            //     $('#summernote').summernote();
            // });
        </script>
        
        <div class="notyf"></div>
        <div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>
        <div id="monica-content-root" class="monica-widget"></div>
    </body>
</html>