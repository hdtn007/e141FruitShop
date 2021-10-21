<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>141Fruits Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo e(asset('admin/vendor/fontawesome-free/css/all.css')); ?>" rel="stylesheet" type="text/css">
    <link
        href="<?php echo e(asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')); ?>"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo e(asset('admin/css/main.css')); ?>" rel="stylesheet">

</head>

<body class="bg-main">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url('media/img-banner/Logo141Fruits.png');"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Đăng Nhập Admin</h1>
                                    </div>

                                    
                                       <?php
                                            $message = Session::get('message_box');
                                            if($message){
                                                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                      <strong>Error : </strong>".$message."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                      </button>
                                    </div>";

                                                Session::put('message_box', null); // session message = null hiện thị duy nhất 1 lần
                                            }
                                         ?>
                                      

                                    <form id="admin_login_form" action="<?php echo e(URL::to('/admin-dashboard')); ?>" class="user" method="post">
                                        <?php echo e(csrf_field()); ?>



                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" 
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Nhập email..." pattern=".+@*.com" size="50" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" 
                                                id="exampleInputPassword" placeholder="Mật khẩu"required="">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Nhớ mật khẩu </label>
                                            </div>
                                        </div>
                                        <a href="javascript:{}" onclick="document.getElementById('admin_login_form').submit();" class="btn btn-primary btn-user btn-block">
                                            Đăng nhập
                                        </a>
                                        <hr>
                                        <a href="javascript:{}" onclick="document.getElementById('admin_login_form').submit();" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Đăng nhập với google
                                        </a>
                                        <a href="javascript:{}" onclick="document.getElementById('admin_login_form').submit();" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Đăng nhập với facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Quên mật khẩu?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Tạo tài khoản!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(asset('admin/vendor/jquery/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendor/bootstrap/js/bootstrap.bundle.js')); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo e(asset('admin/vendor/jquery-easing/jquery.easing.js')); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(asset('admin/js/sb-admin-2.js')); ?>"></script>

</body>

</html><?php /**PATH C:\wamp64\www\e141FruitShop\resources\views/admin-login.blade.php ENDPATH**/ ?>