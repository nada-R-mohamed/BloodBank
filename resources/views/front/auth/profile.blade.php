@extends('layouts.front-master')
@section('content')
    <div class="member">
        <p class="welcome">مرحباً بك</p>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                احمد محمد
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="index-1.html">
                    <i class="fas fa-home"></i>
                    الرئيسية
                </a>
                <a class="dropdown-item" href="#">
                    <i class="far fa-user"></i>
                    معلوماتى
                </a>
                <a class="dropdown-item" href="#">
                    <i class="far fa-bell"></i>
                    اعدادات الاشعارات
                </a>
                <a class="dropdown-item" href="#">
                    <i class="far fa-heart"></i>
                    المفضلة
                </a>
                <a class="dropdown-item" href="#">
                    <i class="far fa-comments"></i>
                    ابلاغ
                </a>
                <a class="dropdown-item" href="contact-us.html">
                    <i class="fas fa-phone-alt"></i>
                    تواصل معنا
                </a>
                <a class="dropdown-item" href="index.html">
                    <i class="fas fa-sign-out-alt"></i>
                    تسجيل الخروج
                </a>
            </div>
        </div>
    </div>

@endsection
