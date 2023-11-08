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
                                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>/posts">Posts</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
                                </ol>
                            </nav>
                        </div>
                        <form method="post">
                            <div class="row layout-spacing layout-top-spacing">
                                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="widget-content widget-content-area blog-create-section p-4 pb-0">
                                        <div class="row mb-4">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="post-title" name="title" placeholder="Post Title" value="Perdagangan Orang Bermodus Prostitusi Daring Kembali Mencuat di Manado" maxlength="128" required="" autofocus="">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-sm-12">
                                                <textarea id="summernote" name="content" style="display: none;">This is summernote edit example</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
                                    <div class="widget-content widget-content-area blog-create-section p-4">
                                        <div class="row">
                                            <div class="col-xxl-12 col-sm-4 col-12 mb-4">
                                                <button type="submit" name="submit" class="btn btn-primary w-100 _effect--ripple waves-effect waves-light"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> <span class="fw-bold">Edit Post</span></button>
                                            </div>
                                            <div class="col-xxl-12 col-md-12 mb-4">
                                                <label for="tags">Tags</label>
                                                <!-- <tags class="tagify blog-tags tagify--noTags tagify--empty" tabindex="-1">
                                                    <span contenteditable="" tabindex="0" data-placeholder="​" aria-placeholder="" class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
                                                    ​
                                                </tags> -->
                                                <input id="tags" name="tags" class="blog-tags" value="">
                                            </div>
                                            <div class="col-xxl-12 col-md-12 mb-4">
                                                <label for="category">Category</label>
                                                <tags class="tagify" tabindex="-1">
                                                    <tag title="Terbaru" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" value="Terbaru"><x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x><div><span class="tagify__tag-text">Terbaru</span></div></tag><span tabindex="0" data-placeholder="Choose..." aria-placeholder="Choose..." class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
                                                    ​
                                                </tags>
                                                <input id="category" name="category" placeholder="Choose..." value="Terbaru">
                                            </div>
                                            <div class="col-xxl-12 col-md-12 mb-4">
                                                <label for="telegram">Telegram (chat_id)</label>
                                                <input type="number" id="telegram" name="telegram" class="form-control" value="5512935649">
                                            </div>
                                            <div class="col-xxl-12 col-md-12">
                                                <label for="delay">Delay (ms)</label>
                                                <input type="number" id="delay" name="delay" class="form-control" min="1000" value="1000">
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
            
            // $(document).ready(function() {
            //     $('#summernote').summernote();
            // });
        </script>
        <div class="notyf"></div>
        <div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>

        <div id="monica-content-root" class="monica-widget"></div>
    </body>
</html>
