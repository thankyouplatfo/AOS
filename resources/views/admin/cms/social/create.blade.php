@extends('layouts.panel')
@section('content')

<div class="w3-container w3-large">
    <!-- header + title-->
    <div class="w3-bar" style="margin-top: 44px">
        <div class="w3-bar-item w3-right">
            <h1 class="fa-2x" style="padding: 0px;margin:0px;" >إضافة عضو فريق جديد باسم <span id="main-title" style="padding: 0px;margin:0px;font-family: 'Aref Ruqaa', serif!important;"></span></h1>
        </div>
    </div>
    
    <form action="{{ route('admin.cms.social.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>
            <label for="url">الرابط <span class="w3-medium cnsb-txt-red">رابط صفحتك على موقع التواصل الاجتماعي</span></label> 
            <input type="text" class="w3-input url" name="url" id="url" minlength="3" maxlength="255" value="{{ old('url') }}">
            @error('url')
                {{ $message }}
            @enderror
        </p>
		<p>
            <label for="title">العنوان <span class="w3-medium cnsb-txt-red">عندما يتم التحويم بشكل مطول يظهر نص أكتبه هنا </span></label> 
            <input type="text" class="w3-input title" name="title" id="title" minlength="3" maxlength="255" value="{{ old('title') }}" placeholder="صفحتنا على فيسبوك">
            @error('title')
                {{ $message }}
            @enderror
        </p>
		<p>
            <label for="icon">الايقونة <span class="w3-medium cnsb-txt-red">الايقونة الظاهرة داخل أزرار التواصل الإجتماعي مثل  <i class="fa fa-facebook"></i> <b>أحصل على أيقونات  <a href="https://fontawesome.com/v4.7/icons/" target="_blank">من هنا</a> </b> </span></label> 
            <input type="text" class="w3-input icon ltr" name="icon" id="icon" minlength="3" maxlength="255" value="{{ old('icon') }}" placeholder="fa fa-facebook">
            @error('icon')
                {{ $message }}
            @enderror
        </p>
        <p>
            <input type="submit" value="إرسال" class="w3-button w3-dark-grey">
        </p>
    </form>
    <hr>
    <div class="w3-topbar w3-container w3-border-white"></div>
    <!-- Footer -->
    <footer class="w3-container w3-padding-16 w3-light-grey w3-medium">
        <h4 id="logo">AOS</h4>
            يشكر موقع AOS موقع <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a> هلى إتاحته هذا القالب بشكب مجاني
        <p class="w3-opacity w3-text-black w3-border-top w3-border-bottom w3-border-black">
            قام بتعديل هذا القالب بما يتلائم وهذا المشروع المبرمج/ <a href="https://www.facebook.com/almashkliabualeiz">معتز
                المشكلي</a> يمكنك الضغط على <a
                href="https://www.w3schools.com/w3css/tryit.asp?filename=tryw3css_templates_analytics&stacked=h">هنا</a>
            لرؤية القالب قبل التعديل
        </p>
    </footer>
    <hr>
</div>
@endsection
