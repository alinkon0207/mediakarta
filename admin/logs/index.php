
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
                                    <li class="breadcrumb-item active" aria-current="page">Logs</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="row layout-top-spacing">
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-8">
                                    <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="dt--top-section"><div class="row"><div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center"><div class="dataTables_length" id="zero-config_length"><label>Results :  <select name="zero-config_length" aria-controls="zero-config" class="form-control"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3"><div id="zero-config_filter" class="dataTables_filter"><label><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg><input type="search" class="form-control" placeholder="Search..." aria-controls="zero-config"></label></div></div></div></div><div class="table-responsive"><table id="zero-config" class="table dt-table-hover dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="zero-config_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1" style="width: 98px;" aria-label="IP Address: activate to sort column ascending">IP Address</th>
                                                <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1" style="width: 246px;" aria-label="Location: activate to sort column ascending">Location</th>
                                                <th width="50" class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1" style="width: 231px;" aria-label="Permalink: activate to sort column ascending">Permalink</th>
                                                <th width="150" class="sorting_desc" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1" style="width: 150px;" aria-sort="descending" aria-label="Date: activate to sort column ascending">Date</th>
                                                <th width="70" class="sorting_disabled" rowspan="1" colspan="1" style="width: 50px;" aria-label="Option">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row">
                                                <td>116.206.8.36</td>
                                                <td>Bogor, West Java, Indonesia</td>
                                                <td>jaksa-agung-rotasi-sejumlah-ka..</td>
                                                <td class="sorting_1">2023-11-02 16:45:10</td>
                                                <td>
                                                    <a class="badge badge-light-primary text-start me-2 action-edit" href="<?php echo ADMIN_URL; ?>/logs/detail/index.php?id=ab3293f70f65cf7f">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr role="row"><td>116.206.8.36</td><td>Bogor, West Java, Indonesia</td><td>jaksa-agung-rotasi-sejumlah-ka..</td><td class="sorting_1">2023-11-02 16:45:09</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="/logs/detail/6757d0774f34afe7"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a></td></tr><tr role="row"><td>116.206.8.36</td><td>Bogor, West Java, Indonesia</td><td>jaksa-agung-rotasi-sejumlah-ka..</td><td class="sorting_1">2023-11-02 16:45:08</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="/logs/detail/3834b9480b2de01a"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a></td></tr><tr role="row"><td>182.2.144.31</td><td>Jakarta, Jakarta, Indonesia</td><td>jaksa-agung-rotasi-sejumlah-ka..</td><td class="sorting_1">2023-11-02 16:42:44</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="/logs/detail/f6ee74b0b30589aa"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a></td></tr><tr role="row"><td>182.1.136.169</td><td>Manado, North Sulawesi, Indonesia</td><td>perdagangan-orang-bermodus-pro..</td><td class="sorting_1">2023-10-29 18:39:05</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="/logs/detail/dc0575529006e517"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a></td></tr><tr role="row"><td>182.3.39.18</td><td>Jakarta, Jakarta, Indonesia</td><td>perdagangan-orang-bermodus-pro..</td><td class="sorting_1">2023-10-29 18:16:18</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="/logs/detail/c9d2d15362ae3822"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a></td></tr><tr role="row"><td>36.83.123.24</td><td>Jakarta Pusat, Jakarta, Indonesia</td><td>perdagangan-orang-bermodus-pro..</td><td class="sorting_1">2023-10-29 17:41:04</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="/logs/detail/9a9c419e69ed3a83"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a></td></tr><tr role="row"><td>182.3.39.18</td><td>Jakarta, Jakarta, Indonesia</td><td>perdagangan-orang-bermodus-pro..</td><td class="sorting_1">2023-10-29 15:59:32</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="/logs/detail/582666a984db841e"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a></td></tr><tr role="row"><td>182.1.136.169</td><td>Manado, North Sulawesi, Indonesia</td><td>perdagangan-orang-bermodus-pro..</td><td class="sorting_1">2023-10-29 15:54:58</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="/logs/detail/bc422dcf29ce68df"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a></td></tr><tr role="row"><td>182.1.215.124</td><td>Weda, North Maluku, Indonesia</td><td>perdagangan-orang-bermodus-pro..</td><td class="sorting_1">2023-10-29 15:54:01</td><td><a class="badge badge-light-primary text-start me-2 action-edit" href="/logs/detail/8168d8a6a661803c"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a></td></tr>
                                        </tbody>
                                    </table>
                                    <div id="zero-config_processing" class="dataTables_processing card" style="display: none;">Processing...</div>
                                </div>
                                <div class="dt--bottom-section d-sm-flex justify-content-sm-between text-center">
                                    <div class="dt--pages-count  mb-sm-0 mb-3">
                                        <div class="dataTables_info" id="zero-config_info" role="status" aria-live="polite">Showing page 1 of 36</div>
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
                                                <li class="paginate_button page-item "><a href="#" aria-controls="zero-config" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero-config" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero-config" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item disabled" id="zero-config_ellipsis"><a href="#" aria-controls="zero-config" data-dt-idx="6" tabindex="0" class="page-link">…</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero-config" data-dt-idx="7" tabindex="0" class="page-link">36</a></li>
                                                <li class="paginate_button page-item next" id="zero-config_next">
                                                    <a href="#" aria-controls="zero-config" data-dt-idx="8" tabindex="0" class="page-link">
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
                        <script>
                            // $('#zero-config').DataTable({
                            //     "processing": true,
                            //     "serverSide": true,
                            //     "ajax": {
                            //         "url": "/logs/data",
                            //         "type": "POST"
                            //     },
                            //     "columns": [
                            //         { "data": "id", "visible": false },
                            //         { "data": "ip_address" },
                            //         { "data": "ip_location" },
                            //         { "data": "permalink" },
                            //         { "data": "created_at" },
                            //         { "data": "option", "orderable": false }
                            //     ],
                            //     "order": [[4, "desc"]],
                            //     "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                            //     "<'table-responsive'tr>" +
                            //     "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                            //     "oLanguage": {
                            //         "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
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
