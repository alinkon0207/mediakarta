
<?php
    include('../bootstrap.php');
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
                                                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Profile</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="telegram-tab" data-bs-toggle="tab" href="#telegram" role="tab" aria-controls="telegram" aria-selected="false" tabindex="-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg> Telegram</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="targetlogs-tab" data-bs-toggle="tab" href="#targetlogs" role="tab" aria-controls="targetlogs" aria-selected="false" tabindex="-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-crosshair"><circle cx="12" cy="12" r="10"></circle><line x1="22" y1="12" x2="18" y2="12"></line><line x1="6" y1="12" x2="2" y2="12"></line><line x1="12" y1="6" x2="12" y2="2"></line><line x1="12" y1="22" x2="12" y2="18"></line></svg> Target Logs</button>
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
                                                            <input type="text" name="fullname" id="fullname" class="form-control" value="Merah Putih" required="" autofocus="">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-2 align-self-center">
                                                            <label for="email" class="form-label">Email Address</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="email" name="email" id="email" class="form-control" value="merahputih@gmail.com" required="">
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
                                                            <input type="number" name="telegram" id="telegram" class="form-control" value="5512935649" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-2 align-self-center">
                                                            <label for="delay" class="form-label">Delay (ms)</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="number" name="delay" id="delay" class="form-control" value="1000" min="1000" required="">
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
