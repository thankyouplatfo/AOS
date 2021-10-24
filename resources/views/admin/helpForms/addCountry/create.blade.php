@extends('layouts.panel')
@section('content')

<div class="w3-container w3-large">
    <!-- header + title-->
    <div class="w3-bar" style="margin-top: 44px">
        <div class="w3-bar-item w3-right">
            <h1 class="fa-2x" style="padding: 0px;margin:0px;" > أضف بلدا جديدا باسم <span id="main-title" style="padding: 0px;margin:0px;font-family: 'Aref Ruqaa', serif!important;"></span></h1>
        </div>
    </div>
    <div class="w3-panel w3-leftbar w3-sand w3-xxlarge w3-serif">
        @if (session()->has('success'))
            <div class="alert alert-success w3-xlarge">
                <p><i>"{{ session()->get('success') }}"</i></p>
            </div>
        @endif
    </div>
    <form action="{{ route('admin.helpForms.addCountry.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>
            <label for="name">الاسم</label>
            <input class="w3-input name" name="name" id="name" minlength="3" maxlength="25"  value="{{old('name')}}" oninput="$('#slug').val($('#name').val().replace(/\s+|_+/g, '-').toLowerCase());
            $('#main-title').text($('#name').val())">
            @error('name')
                {{$message}}
            @enderror
        </p>
        <p>
            {{--<label for="slug">الللاحقة</label>--}}
            <input type="hidden" class="w3-input slug" name="slug" value="{{old('slug')}}" id="slug">
            @error('slug')
                {{$message}}
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
        تشكر مجموعة على <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a> اتاحتها هذا القالب
        بشكل مجاني
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