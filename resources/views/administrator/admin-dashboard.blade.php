@extends('admin-layout')
@section('admin-content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tổng Quan</h1>
    </div>
    <div class="container my-2">
        <!-- Content Row -->
        <div class="row d-flex flex-lg-row justify-content-between">
            <div>
                <a href="{{URL::to('/bill-online/new')}}" type="button" class="btn btn-dark bg-gradient-warning mt-1">
                    <span class="text"><i class="fas fa-cart-plus"></i> Bán Hàng</span>
                </a>
                <a href="{{URL::to('/manage-product/add')}}" type="button" class="btn btn-info mt-1">
                    <span class="text"><i class="fas fa-plus"></i> Thêm sản phẩm</span>
                </a>
                <a href="{{URL::to('/manage-blog/add')}}" type="button" class="btn disabled bg-white border-info mt-1">
                    <span class="text"><i class="fas fa-blog"></i> Tạo bài viết</span>
                </a>
                <a href="{{URL::to('/manage-product')}}" type="button" class="btn btn-success mt-1">
                    <span class="text"><i class="fas fa-th-list"></i> Xem tất cả sản phẩm</span>
                </a>
            </div>
            <a target="_blank" href="https://www.facebook.com/TraiCayTuoi141" type="button" class="btn btn-primary mt-1">
                <span class="text"><i class="fab fa-facebook"></i> Quản lý Fanpage</span>
            </a>
        </div>
    </div>
<!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div>
                        <div class="d-flex justify-content-between">
                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                            Số mặt hàng :
                            </div>
                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                            {{number_format($data_info['count_product'],0,",",".")}} <i class="fas fa-carrot"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                            Số bài viết :
                            </div>
                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                            {{number_format($data_info['count_post'],0,",",".")}} <i class="fab fa-microblog"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                            Số user :
                            </div>
                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                            {{number_format($data_info['count_user'],0,",",".")}} <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div>
                        <div class="d-flex justify-content-between">
                            <div class="text-md font-weight-bold text-success text-uppercase mb-1">
                                Lượt mua :
                            </div>
                            <div class="text-md font-weight-bold text-success text-uppercase mb-1">
                                {{number_format($data_info['count_product_total_purchased'],0,",",".")}} <i class="fas fa-cart-plus"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="text-md font-weight-bold text-success text-uppercase mb-1">
                                Lượt like sp :
                            </div>
                            <div class="text-md font-weight-bold text-success text-uppercase mb-1">
                                {{number_format($data_info['sum_product_like'],0,",",".")}} <i class="fas fa-heart"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="text-md font-weight-bold text-success text-uppercase mb-1">
                                Lượt like blog :
                            </div>
                            <div class="text-md font-weight-bold text-success text-uppercase mb-1">
                                {{number_format($data_info['sum_post_like'],0,",",".")}} <i class="fas fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div>
                        <div class="d-flex justify-content-between">
                            <div class="text-md font-weight-bold text-info text-uppercase mb-1">
                                Lượt chốt đơn :
                            </div>
                            <div class="text-md font-weight-bold text-info text-uppercase mb-1">
                                {{number_format($data_info['count_bill_old'],0,",",".")}} <i class="fas fa-check-double"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="text-md font-weight-bold text-info text-uppercase mb-1">
                                Lượt xem sp :
                            </div>
                            <div class="text-md font-weight-bold text-info text-uppercase mb-1">
                                {{number_format($data_info['sum_product_view'],0,",",".")}} <i class="fas fa-eye"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="text-md font-weight-bold text-info text-uppercase mb-1">
                                Lượt xem blog:
                            </div>
                            <div class="text-md font-weight-bold text-info text-uppercase mb-1">
                                {{number_format($data_info['sum_post_view'],0,",",".")}} <i class="fas fa-eye"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div>
                        <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                            Tính theo sản phẩm:
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between">
                            <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                Số SP đã mua:
                            </div>
                            <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                {{number_format($data_info['sum_product_total_purchased'],0,",",".")}} <i class="fab fa-product-hunt"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                Số SP đã bán:
                            </div>
                            <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                {{number_format($data_info['sum_product_sold'],0,",",".")}} <i class="fab fa-product-hunt"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                Tổng thu:
                            </div>
                            <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                {{number_format($data_info['sum_bills_price_sum'],0,",",".")}}đ <i class="fas fa-money-bill"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                Lợi nhuận:
                            </div>
                            <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                                {{number_format($data_info['sum_bill_profit'],0,",",".")}}đ
                                 <i class="fas fa-money-bill"></i>
                            </div>
                        </div>
                        <div>
                            @if($data_info['status_import_price'] > 0)
                            <small>
                                Lợi thuận chưa chính xác ( do có một số sản phẩm chưa nhập giá thu mua ).
                            </small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection