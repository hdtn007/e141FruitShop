<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        @if(Request::segment(1) === 'dashboard')
        Trình quản lý 
        @elseif(Request::segment(1) === 'category-product')
        Danh mục sản phẩm 
        @elseif(Request::segment(1) === 'manage-product')
        Quản lý sản phẩm
        @elseif(Request::segment(1) === 'brand-tag')
        Tag thương hiệu
        {{-- @elseif(Request::segment(1) === 'dashboard') --}}
        
        @endif
          - 141Fruit Admin
     </title> 
     <link rel="shortcut icon" href="{{asset('public/media/img-icons/renewable.png')}}">

    <!-- Custom fonts for this template-->
    <link href="{{asset('public/admin/vendor/fontawesome-free/css/all.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/admin/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link   
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('public/admin/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin/css/vendor.css')}}" rel="stylesheet">

    <!-- Custom styles for table page -->
    <link href="{{asset('public/admin/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar bg-gradient-success sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{URL::to('/dashboard')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-apple-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">141Fruits</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li title="Dashboard" class="nav-item {{ Request::segment(1) === 'dashboard' ? 'active' : null }}">
                <a class="nav-link" href="{{URL::to('/dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tổng quan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Bán hàng
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSell"
                    aria-expanded="true" aria-controls="collapseSell">
                    <i class="fab fa-opencart"></i>
                    <span>Bán Hàng</span>
                </a>
                <div id="collapseSell" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Lựa chọn kênh</h6>
                        <a class="collapse-item" href="buttons.html">Kênh Offline</a>
                        <a class="collapse-item" href="cards.html">Kênh Online</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ ( Request::segment(1) === 'category-product' || Request::segment(1) === 'brand-tag' ) ? 'active' : null }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrand"
                    aria-expanded="true" aria-controls="collapseBrand">
                    <i class="fas fa-boxes"></i>
                    <span>Quản Lý Kho</span>
                </a>
                <div id="collapseBrand" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Danh sách :</h6>
                        <a  class="collapse-item {{ Request::segment(1) === 'manage-product' ? 'active' : null }}" 
                            href="{{URL::to('/manage-product')}}">
                            Sản phẩm
                        </a>
                        <a  class="collapse-item {{ Request::segment(1) === 'category-product' ? 'active' : null }}" 
                            href="{{URL::to('/category-product')}}">
                            Loại sản phẩm
                        </a>
                        <a  class="collapse-item {{ Request::segment(1) === 'brand-tag' ? 'active' : null }}" 
                            href="{{URL::to('/brand-tag')}}">
                            Tag Thương hiệu
                        </a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCampaign"
                    aria-expanded="true" aria-controls="collapseCampaign">
                    <i class="fas fa-gifts"></i>
                    <span>Chiến dịch</span>
                </a>
                <div id="collapseCampaign" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tùy chỉnh :</h6>
                        <a title="Mã khuyến mãi ( giftcode )" class="collapse-item" href="#">Mã khuyến mãi</a>
                        <a title="Mã khuyến mãi ( giftcode )" class="collapse-item" href="#">Vouchers</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Mẹo
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePost"
                    aria-expanded="true" aria-controls="collapsePost">
                    <i class="fas fa-newspaper"></i>
                    <span>Bài viết</span>
                </a>
                <div id="collapsePost" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Danh mục bài viết:</h6>
                        <a class="collapse-item" href="login.html">Viết bài mới</a>
                        <a class="collapse-item" href="register.html">Danh sách bài viết</a>
                        <a class="collapse-item" href="forgot-password.html">Nháp</a>
                        <a class="collapse-item" href="forgot-password.html">Mẫu</a>
                        {{-- <div class="collapse-divider"></div> --}}
                        {{-- <h6 class="collapse-header">Cài đặt :</h6> --}}
                        {{-- <a class="collapse-item" href="404.html">Loại bài viết</a> --}}
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettingPost"
                    aria-expanded="true" aria-controls="collapseSettingPost">
                    <i class="fas fa-cogs"></i>
                    <span>Cài đặt bài viết</span>
                </a>
                <div id="collapseSettingPost" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cài đặt :</h6>
                        <a class="collapse-item" href="login.html">Danh mục bài viết</a>
                        <a class="collapse-item" href="register.html">Tag bài viết</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                System
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettingUser"
                    aria-expanded="true" aria-controls="collapseSettingUser">
                    <i class="fas fa-user-shield"></i>
                    <span>User Setting</span>
                </a>
                <div id="collapseSettingUser" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Setting :</h6>
                        <a class="collapse-item" href="login.html">Admin account</a>
                        <a class="collapse-item" href="login.html">User account</a>
                        <a class="collapse-item" href="register.html">Setting roles</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHistoryActivity"
                    aria-expanded="true" aria-controls="collapseHistoryActivity">
                    <i class="fas fa-history"></i>
                    <span>History</span>
                </a>
                <div id="collapseHistoryActivity" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Activity :</h6>
                        <a class="collapse-item" href="login.html">Admin History</a>
                        <a class="collapse-item" href="login.html">User History</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="{{asset('public/media/undraw_rocket.svg')}}" alt="...">
                <p class="text-center mb-2"><strong>Version 1.0</strong></p>
                {{-- <a class="btn btn-success btn-sm"> Update!</a> --}}
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-shopping-cart"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="{{asset('public/media/undraw_profile_1.svg')}}"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="{{asset('public/media/undraw_profile_2.svg')}}"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="{{asset('public/media/undraw_profile_3.svg')}}"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="{{('https://source.unsplash.com/Mv9hjnEUHR4/60x60')}}"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php $name_admin = Session::get('admin_name');
                                    echo $name_admin; ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('public/media/img-avarta/'.Session::get('admin_avarta'))}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Trang cá nhân
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cài đặt
                                </a>
                                <a class="dropdown-item" href="{{URL::to('/home')}}">
                                    <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Trang chủ
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{URL::to('logout-dashboard')}}" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- start Nav -->
                  @yield('admin-content')
                  <!-- end nav -->

                
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Bản quyền &copy; 141Fruits bởi <a target="_blank" href="https://www.facebook.com/MrroyalTechnology">MRROYAL</a> <script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông báo đăng xuất ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Bạn sẽ thoát khỏi giao diện admin, để trở lại bạn phải đăng nhập lại ??.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <a class="btn btn-primary" href="{{URL::to('logout-dashboard')}}">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('public/admin/vendor/jquery/jquery.js')}}"></script>
    <script src="{{asset('public/admin/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('public/admin/vendor/jquery-easing/jquery.easing.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('public/admin/js/sb-admin-2.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('public/admin/vendor/chart.js/Chart.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('public/admin/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('public/admin/js/demo/chart-pie-demo.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('public/admin/vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('public/admin/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('public/admin/js/demo/datatables-demo.js')}}"></script>
    <script src="{{asset('public/admin/js/vendor.js')}}"></script>

    <!-- Hộp thoại thông báo -->
    {{-- <script src="{{asset('public/admin/js/sweetalert2.all.js')}}"></script> --}}
    {{-- <script src="{{asset('public/admin/js/sweetalert.min.js')}}"></script> --}}
    {{-- <script src="{{asset('public/admin/js/popper.min.js')}}"></script> --}}

</body>

</html>