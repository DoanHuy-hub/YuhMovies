@extends('user.master')
@section('title','Giới Thiệu Về Chúng Tôi - YuhMovies')
@section('content')
<div class="faq">
    <h4 class="latest-text w3_faq_latest_text w3_latest_text">Giới Thiệu</h4>
    <div class="container">
        <div class="agileits-news-top">
            <ol class="breadcrumb">
                <li><a href="{{ route('user.index') }}">Trang Chủ</a></li>
                <li class="active">Giới Thiệu</li>
            </ol>
            <div>
                <h4>Đồ án TTTN Web xem phim YuhMovies<br><br></h4>
                <h4>Đoàn Nhật Huy - N18DCCN077<br><br></h4>
                <h4>Học viện Công nghệ Bưu chính Viễn thông cơ sở TP>HCM<br><br></h4>
            </div>
        </div>
    </div>
    <h4 class="latest-text w3_faq_latest_text w3_latest_text">Liên Hệ</h4>
    <div class="container">
        <h4 class="pt-1"><b>Quản trị viên: </b>Đoàn Nhật Huy</h4>
        <h4 class="pt-1"><b>Số điện thoại: </b>0373******</h4>
        <h4><b>Email: </b>webxemphim010@gmail.com</h4>
        <h4><b>Địa chỉ: </b>Học viện Công nghệ Bưu chính Viễn thông cơ sở TP>HCM, Việt Nam</h4>

    </div>
</div>
@endsection
