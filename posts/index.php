
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

        <?php include '../topbar.html'; ?>
        
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
                                                <tbody>
                                                    <tr role="row">
                                                        <td>Perdagangan Orang Bermodus Prostitusi Daring Kembali Mencuat di Manado
                                                            <small>
                                                                <a href="javascript:void(0);" onclick="copyToClipboard(`https://mediakarta.com/read/perdagangan-orang-bermodus-prostitusi-daring-kembali-mencuat-di-manado`)" title="Copy Link">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy">
                                                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                                                    </svg>
                                                                </a>
                                                            </small>
                                                        </td>
                                                        <td>Terbaru</td>
                                                        <td class="sorting_1">2023-06-12 08:24:32</td>
                                                        <td>
                                                            <a class="badge badge-light-primary text-start me-2 action-edit" href="<?php echo BASE_URL; ?>/posts/edit/c6d8857dd7e0ac40">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                                                    <path d="M12 20h9"></path>
                                                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr role="row"><td>6 Potret Cantik Nataliya Goncharova yang Disebut Atlet Voli Termahal di Dunia <small><a href="javascript:void(0);" onclick="copyToClipboard(`https://mediakarta.com/read/6-potret-cantik-nataliya-goncharova-yang-disebut-atlet-voli-termahal-di-dunia-4403`)" title="Copy Link"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></a></small></td><td>Selebriti</td><td class="sorting_1">2023-05-09 18:36:00</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="<?php echo BASE_URL; ?>/posts/edit/4e4035b789bd93da"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a></td></tr><tr role="row"><td>5 Potret Hana Hanifah Liburan di Bali, Pamer Body Goals <small><a href="javascript:void(0);" onclick="copyToClipboard(`https://mediakarta.com/read/5-potret-hana-hanifah-liburan-di-bali-pamer-body-goals-6082`)" title="Copy Link"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></a></small></td><td>Selebriti</td><td class="sorting_1">2023-05-09 18:37:08</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="<?php echo BASE_URL; ?>/posts/edit/6f0ff8256a7488f8"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a></td></tr><tr role="row"><td>Marshel Widianto Klarifikasi Soal Kabar Nikahi Celine Evangelista, Sempat Dibilang Gimmick <small><a href="javascript:void(0);" onclick="copyToClipboard(`https://mediakarta.com/read/marshel-widianto-klarifikasi-soal-kabar-nikahi-celine-evangelista-sempat-dibilang-gimmick-3278`)" title="Copy Link"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></a></small></td><td>Lifestyle</td><td class="sorting_1">2023-05-21 09:02:11</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="<?php echo BASE_URL; ?>/posts/edit/3fa2dd78ef5f10ed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a></td></tr><tr role="row"><td>Wanita Kondangan Pakai Dress Transparan Bikini, Gayanya Viral Dihujat  Baca artikel wolipop, "Wanita Kondangan Pakai Dress  <small><a href="javascript:void(0);" onclick="copyToClipboard(`https://mediakarta.com/read/wanita-kondangan-pakai-dress-transparan-bikini-gayanya-viral-dihujat-baca-artikel-wolipop-wanita-kondangan-pakai-dress-trans-6263`)" title="Copy Link"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></a></small></td><td>Lifestyle</td><td class="sorting_1">2023-05-10 16:46:58</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="<?php echo BASE_URL; ?>/posts/edit/626c3f1729110178"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a></td></tr><tr role="row"><td>Jaksa Agung Rotasi Sejumlah Kajati dan Wakajati, Ini Daftarnya  Baca artikel detiknews, "Jaksa Agung Rotasi Sejumlah Kajati <small><a href="javascript:void(0);" onclick="copyToClipboard(`https://mediakarta.com/read/jaksa-agung-rotasi-sejumlah-kajati-dan-wakajati-ini-daftarnya-baca-artikel-detiknews-jaksa-agung-rotasi-sejumlah-kajati-dan-9559`)" title="Copy Link"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></a></small></td><td>Hukum, Politik</td><td class="sorting_1">2023-06-12 10:22:11</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="<?php echo BASE_URL; ?>/posts/edit/c95599006816ff0d"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a></td></tr><tr role="row"><td>Geledah Kantor Kemenhub, KPK Sita Uang Rp 5,6 Miliar <small><a href="javascript:void(0);" onclick="copyToClipboard(`https://mediakarta.com/read/geledah-kantor-kemenhub-kpk-sita-uang-rp-56-miliar`)" title="Copy Link"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></a></small></td><td>Hukum</td><td class="sorting_1">2023-07-10 14:37:14</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="<?php echo BASE_URL; ?>/posts/edit/d27c7d1d78afeed2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a></td></tr><tr role="row"><td>Trik menang dalam Slot Aku Bantu WD mau gak ka?      ✨ Nama Rekening :  ✨ Nomor Rekening :  ✨ Jenis Bank :  ✨ No WhatsAp <small><a href="javascript:void(0);" onclick="copyToClipboard(`https://mediakarta.com/read/trik-menang-dalam-slot-aku-bantu-wd-mau-gak-ka-nama-rekening-nomor-rekening-jenis-bank-no-whatsap-1681`)" title="Copy Link"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></a></small></td><td>Hiburan</td><td class="sorting_1">2023-05-23 16:37:48</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="<?php echo BASE_URL; ?>/posts/edit/1e6b8fbaf1f34a5b"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a></td></tr><tr role="row"><td>Perjuangan sekawan yang tidak ada henti <small><a href="javascript:void(0);" onclick="copyToClipboard(`https://mediakarta.com/read/perjuangan-sekawan-yang-tidak-ada-henti-5389`)" title="Copy Link"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></a></small></td><td>Entrepreneur</td><td class="sorting_1">2023-05-09 18:44:03</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="<?php echo BASE_URL; ?>/posts/edit/538ee97264784277"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a></td></tr><tr role="row"><td>Musim Panen Raya, Harga Beras di Pasar Kramat Jati Tak Kunjung Turun <small><a href="javascript:void(0);" onclick="copyToClipboard(`https://mediakarta.com/read/musim-panen-raya-harga-beras-di-pasar-kramat-jati-tak-kunjung-turun-2936`)" title="Copy Link"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></a></small></td><td>Ekonomi</td><td class="sorting_1">2023-05-12 07:19:43</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="/posts/edit/fa2ac93beab62135"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a></td></tr>
                                                </tbody>
                                            </table>
                                            <!--<div id="zero-config_processing" class="dataTables_processing card" style="display: none;">Processing...</div>-->
                                        </div>
                                        <div class="dt--bottom-section d-sm-flex justify-content-sm-between text-center">
                                            <div class="dt--pages-count  mb-sm-0 mb-3">
                                                <div class="dataTables_info" id="zero-config_info" role="status" aria-live="polite">Showing page 1 of 2</div>
                                            </div>
                                            <div class="dt--pagination">
                                                <div class="dataTables_paginate paging_simple_numbers" id="zero-config_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled" id="zero-config_previous">
                                                            <a href="#" aria-controls="zero-config" data-dt-idx="0" tabindex="0" class="page-link">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                                                                    <line x1="19" y1="12" x2="5" y2="12"></line>
                                                                    <polyline points="12 19 5 12 12 5"></polyline>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li class="paginate_button page-item active">
                                                            <a href="#" aria-controls="zero-config" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                                        </li>
                                                        <li class="paginate_button page-item ">
                                                            <a href="#" aria-controls="zero-config" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                                        </li>
                                                        <li class="paginate_button page-item next" id="zero-config_next">
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
                        <!-- <script>
                            $('#zero-config').DataTable({
                                "processing": true,
                                "serverSide": true,
                                "ajax": {
                                    "url": "<?php echo BASE_URL; ?>/posts/data",
                                    "type": "POST"
                                },
                                "columns": [
                                    { "data": "id", "visible": false },
                                    { "data": "title" },
                                    { "data": "content", "visible": false },
                                    { "data": "category" },
                                    { "data": "created_at" },
                                    { "data": "option", "orderable": false }
                                ],
                                "order": [[4, "desc"]],
                                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                                "<'table-responsive'tr>" +
                                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                                "oLanguage": {
                                    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                    "sSearchPlaceholder": "Search...",
                                    "sLengthMenu": "Results :  _MENU_",
                                },
                                "stripeClasses": []
                            });
                        </script> -->
                    </div>
                </div>
                <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                <p class="">Copyright © <span class="dynamic-year">2023</span> <a target="_blank" href="#">Nisy</a>. All Rights Reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                <p class="">Made with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg> in Bandung</p>
                </div>
                </div>
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
                    }});
            </script>
            <div class="notyf"></div>
            <div class="notyf-announcer" aria-atomic="true" aria-live="polite" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; outline: 0px;"></div>
            <div id="monica-content-root" class="monica-widget"></div>
    </body>
</html>
