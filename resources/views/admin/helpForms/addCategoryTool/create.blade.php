@extends('layouts.panel')
@section('content')

<div class="w3-container w3-large">
    <!-- header + title-->
    <div class="w3-bar" style="margin-top: 44px">
        <div class="w3-bar-item w3-right">
            <h1 class="fa-2x" style="padding: 0px;margin:0px;" >إضافة فئة أداة جديدة باسم <span id="main-title" style="padding: 0px;margin:0px;font-family: 'Aref Ruqaa', serif!important;"></span></h1>
        </div>
    </div>
    
    <form action="{{ route('admin.helpForms.addCategoryTool.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>
            <label for="name">الاسم</label>
            <input type="text" name="name" class="w3-input name" id="name" value="{{old('name')}}" minlength="3" maxlength="40" oninput="$('#slug').val($('#name').val().replace(/\s+|_+/g,'-').toLowerCase()); $('#main-title').text($('#name').val())">
            @error('name')
                {{$message}}
            @enderror
        </p>
        <p>
            {{--<label for="slug">slug</label>--}}
            <input type="hidden" name="slug" class="w3-input slug" id="slug" value="{{old('slug')}}" minlength="3" maxlength="40">
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
