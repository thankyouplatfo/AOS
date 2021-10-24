@extends('layouts.panel')
@section('content')

<div class="w3-container w3-large">
    <!-- header + title-->
    <div class="w3-bar" style="margin-top: 44px">
        <div class="w3-bar-item w3-right">
            <h1 class="fa-2x" style="padding: 0px;margin:0px;" >حرر عدل على ملف التفاضل <span id="main-title" style="padding: 0px;margin:0px;font-family: 'Aref Ruqaa', serif!important;"></span></h1>
        </div>
    </div>
         <!-- tfasol container-->
    <div class="w3-container w3-light-grey w3-center" id="tfasol">
        <object data="{{ asset('file/tfasol/'.$tfasol->file) }}"
            class="w3-block w3-container w3-card-4 w3-round-large w3-section" style="max-height: 75%!important"></object>
    </div>
     <form action="{{ route('admin.cms.homePage.tfasol.update',$tfasol) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>
            <label for="file">ملف</label>
            <input type="file" class="w3-input file" name="file" id="file" accept="application/pdf">
            @error('file')
                {{$message}}
            @enderror
        </p>
        <p>
            <label for="title">صف محتويات الملف</label>
            <input type="text" class="w3-input title" name="title" id="title" minlength="3" maxlength="881" value="{{$tfasol->title}}">
            @error('title')
                {{$message}}
            @enderror
        </p>
        <p>
            <label for="openClose">فتح/إغلاق الملف</label>
            <select class="w3-input openClose" name="openClose" id="openClose">
                <option value="1">مفتوح</option>
                <option value="2">مغلق</option>
            </select>
            @error('openClose')
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
