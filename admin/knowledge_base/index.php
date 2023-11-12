
<?php
    include('../bootstrap.php');
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
                                    <li class="breadcrumb-item active" aria-current="page">Knowledge Base</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="faq container">
                            <div class="faq-layouting layout-spacing">
                                <div class="fq-tab-section mt-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="accordion" id="pagesKnowledgeBase">
                                                <div class="card">
                                                    <div class="card-header" id="fqheadingOne">
                                                        <div class="mb-0" data-bs-toggle="collapse" role="navigation" data-bs-target="#fqcollapseOne" aria-expanded="false" aria-controls="fqcollapseOne">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">
                                                                <polyline points="16 18 22 12 16 6"></polyline>
                                                                <polyline points="8 6 2 12 8 18"></polyline>
                                                            </svg>
                                                            <span class="faq-q-title">How to get telegram chat_id</span>
                                                        </div>
                                                    </div>
                                                    <div id="fqcollapseOne" class="collapse show" aria-labelledby="fqheadingOne" data-bs-parent="#pagesKnowledgeBase">
                                                        <div class="card-body">
                                                            <p>First, open the Telegram application on your device. Visit the URL <a href="https://t.me/mediakarta_bot" target="_blank">t.me/mediakarta_bot</a> to access the Nisy Bot chat. Once you're in the Nisy Bot chat, click on the "Start" button to initiate the conversation. After clicking "Start", open the menu and select the "Get My Chat ID" option. By selecting this option, the Nisy Bot will retrieve your unique chat_id and display it for you.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="fqheadingOne">
                                                        <div class="mb-0" data-bs-toggle="collapse" role="navigation" data-bs-target="#fqcollapseOne" aria-expanded="false" aria-controls="fqcollapseOne">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">
                                                                <polyline points="16 18 22 12 16 6"></polyline>
                                                                <polyline points="8 6 2 12 8 18"></polyline>
                                                            </svg>
                                                            <span class="faq-q-title">What you get from target?</span>
                                                        </div>
                                                    </div>
                                                    <div id="fqcollapseOne" class="collapse" aria-labelledby="fqheadingOne" data-bs-parent="#pagesKnowledgeBase">
                                                        <div class="card-body">
                                                            <p>You will get photos from the front camera, rear camera and also videos from the front camera. Apart from that, you will also get ip address, location information (city, region, country), network provider, device and browser used by the target.</p>
                                                        </div>
                                                    </div>
                                                </div>
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
