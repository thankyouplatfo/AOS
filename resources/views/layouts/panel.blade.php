<!DOCTYPE html>
<html>
<title>لوحة التحكم</title>
<meta charset="UTF-8">

<meta name="description" content="لوحة تحكم موقع AOS">
<meta name="keywords" content="لوحة تحكم موقع AOS">
<link rel="shortcut icon" href="{{asset('images/cPanel/admin-with-cogwheels.png')}}" type="image/x-icon">

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS  + FONT -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/cnsb.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/w3css.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/w3-theme-black.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/fonts/markazi_text.css') }}">
<link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/w3-theme-blue.min.css') }}">

<style>
    /**/
    *:not(h1, h2, h3, h4, h5, h6, i) {
        font-family: 'markazi text', serif !important;
    }

    input.tel,
    input.email,
    input.url {
        direction: ltr !important;
        text-align: left !important;
    }

    * {
        direction: rtl !important
    }

    //
    a.w3-bar-item {
        font-size: x-large !important
    }

</style>

<body id="body" class="w3-light-grey">

    <!-- Top container -->
    <div class="w3-bar w3-top w3-red w3-large" style="z-index:4">
        <a href="{{ route('home') }}" id="logo"
            class="w3-bar-item w3-button w3-hover-none w3-hover-text-light-grey w3-right">
            AOS
        </a>
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey"
            onclick="w3_open();"><i class="fa fa-bars"></i></button>
        <form action="{{ route('logout') }}" method="POST" id="admin-logout-form">
            @csrf
            <button type="submit" class="w3-button w3-bar-item w3-left">
                <i class="fa fa-sign-out w3-left-align" dir="ltr" aria-hidden="true"></i>
            </button>
        </form>
    </div>

    <nav class="w3-sidebar w3-collapse w3-white w3-animate-right" style="z-index:3;width:350px;" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s4">
                <img src="{{ asset('images/cPanel/admin-with-cogwheels.png') }}" class="w3-circle w3-margin-right"
                    style="width:46px">
            </div>
            <div class="w3-col s8 w3-bar">
                <span>أهلا, <strong>ايمن</strong></span><br>
                {{-- <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
                  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
                  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a> --}}
            </div>
        </div>

        <div class="w3-container">
            <h5>لوحة التحكم</h5>
        </div>
        <div id="bar-block" class="w3-bar-block w3-padding-64">
            <a href="#" class="w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()"
                title="إغلاق النافذة"><i class="fa fa-remove fa-fw"></i>  إغلاق القائمة</a>

            <a href="javascript:voied(0)" class="w3-padding w3-black w3-theme-l1 w3-large" onclick="myAccFunc()">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> إدارة المحتوى - الصفحة الرئيسية 
                <i class="fa fa-caret-down w3-left" aria-hidden="true"></i>
            </a>

            <div id="demoAcc" class="w3-hide w3-white w3-card-4 w3-padding-right">
                <a href="{{route('admin.cms.homePage')}}" class="w3-bar-item w3-button w3-right-align w3-large w3-large w3-margin-right">
                    <i class="fa fa-pencil" aria-hidden="true"></i>  الاجزاء الرئيسية 
                </a>
                <a href="{{route('admin.cms.homePage.modal')}}" class="w3-bar-item w3-button w3-right-align w3-large w3-large w3-margin-right">
                    <i class="fa fa-window-maximize" aria-hidden="true"></i> النافذة المنبثقة
                </a>
                <a href="{{route('admin.cms.homePage.addMember')}}" class="w3-bar-item w3-button w3-right-align w3-large w3-large w3-margin-right">
                    <i class="fa fa-user-plus" aria-hidden="true"></i> الفريق
                </a>
                <a href="{{route('admin.cms.homePage.contact')}}" class="w3-bar-item w3-button w3-right-align w3-large w3-large w3-margin-right">
                    <i class="fa fa-info-circle" aria-hidden="true"></i> اتصل بنا 
                </a>
                <a href="{{route('admin.cms.social')}}" class="w3-bar-item w3-button w3-right-align w3-large w3-large w3-margin-right">
                    <i class="fa fa-facebook" aria-hidden="true"></i> ايقونات التواصل الاجتماعي 
                </a>
                <a href="{{route('admin.cms.homePage.tfasol')}}" class="w3-bar-item w3-button w3-right-align w3-large w3-large w3-margin-right">
                    <i class="fa fa-file" aria-hidden="true"></i> التفاضل
                </a>
            </div>
            <hr>


            <a href="javascript:voied(0)" class="w3-padding w3-black w3-theme-l2 w3-large" onclick="myAccFunc3()">
                <i class="fa fa-keyboard-o" aria-hidden="true"></i>  النماذج المساعدة 
                <i class="fa fa-caret-down w3-left" aria-hidden="true"></i>
            </a>

            <div id="demoAcc54" class="w3-hide w3-white w3-card-4 w3-padding-right">
                <a href="{{route('admin.helpForms.addCountry')}}" class="w3-bar-item w3-button w3-right-align w3-large w3-large w3-margin-right">
                    <i class="fa fa-globe" aria-hidden="true"></i> إضافة دولة
                </a>
                <a href="{{route('admin.helpForms.addCity')}}" class="w3-bar-item w3-button w3-right-align w3-large w3-large w3-margin-right">
                    <i class="fa fa-building" aria-hidden="true"></i> إضافة مدينة
                </a>
                <a href="{{route('admin.helpForms.addRole')}}" class="w3-bar-item w3-button w3-right-align w3-large w3-large w3-margin-right">
                    <i class="fa fa-briefcase" aria-hidden="true"></i> إضافة دور
                </a>
                <a href="{{route('admin.helpForms.addCategoryTool')}}" class="w3-bar-item w3-button w3-right-align w3-large w3-large w3-margin-right">
                    <i class="fa fa-list" aria-hidden="true"></i> إضافة فئات للأدوات
                </a>
            </div>


            <a href="javascript:voied(0)" class="w3-padding w3-black w3-theme-l3 w3-large" onclick="myAccFunc4()">
                <i class="fa fa-university" aria-hidden="true"></i>  الجامعات  
                <i class="fa fa-caret-down w3-left" aria-hidden="true"></i>
            </a>

            <div id="demoAcc64" class="w3-hide w3-white w3-card-4 w3-padding-right">
                <a href="{{route('admin.addUniversity')}}" class="w3-bar-item w3-button w3-right-align w3-large w3-large w3-margin-right">
                    <i class="fa fa-university" aria-hidden="true"></i> إضافة جامعة   
                </a>
                <a href="{{ route('admin.addCollege') }}" class="w3-bar-item w3-button w3-right-align w3-large w3-large w3-margin-right">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i> إضافة كلية   
                </a>
                <a href="{{route('admin.addSpecialty')}}" class="w3-bar-item w3-button w3-right-align w3-large w3-large w3-margin-right">
                    <i class="fa fa-random" aria-hidden="true"></i> إضافة تخصص   
                </a>
            </div>

            <hr>
            <a href="{{route('admin.addTool')}}" class="w3-button w3-grey w3-large"><i class="fa fa-wrench" aria-hidden="true"></i>
                أدواتي </a>
        </div>
    </nav>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-right:350px;margin-top:43px;">
        @yield('content')
    </div>
    <!-- JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/w3.js') }}"></script>
    <script src="{{ asset('js/js.js') }}"></script>
    <script>
        $('label').addClass('w3-xlarge');
        //
        $("input[type='email'],input[type='number'],input[type='url'],input[type='tel'],input.email,input.number,input.url,input.ltr")
            .addClass('w3-left-align');
        $("input[type='email'],input[type='number'],input[type='url'],input[type='tel'],input.email,input.number,input.url,input.ltr")
            .addClass('dir', 'ltr');
    </script>
    @yield('script')
    <!-- End page content -->
</body>

</html>
