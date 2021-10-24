@extends('layouts.panel')
@section('content')

<div class="w3-container w3-large">
    <!-- header + title-->
    <div class="w3-bar" style="margin-top: 44px">
        <div class="w3-bar-item w3-right">
            <h1 class="fa-2x" style="padding: 0px;margin:0px;" >إضافة أداة جديدة باسم <span id="main-title" style="padding: 0px;margin:0px;font-family:'Aref Ruqaa', serif!important;"></span></h1>
        </div>
    </div>
    
    <form action="{{ route('admin.addTool.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>
            <label for="name">الاسم</label>
            <input type="text" class="w3-input name" name="name" id="name" minlength="3" max="40" value="{{old('name')}}" oninput="$('#slug').val($('#name').val().replace(/\s+|_+/g,'-').toLowerCase()); $('#main-title').text($('#name').val())">
            @error('name')
                {{$message}}
            @enderror
        </p>
        <p>
            <label for="url">عنوان الرابط</label>
            <input type="text" class="w3-input url" name="url" id="url" minlength="3" max="40" value="{{old('url')}}">
            @error('url')
                {{$message}}
            @enderror
        </p>
        <p>
            <label for="about">ماذا تعمل</label>
            <textarea class="w3-input about" name="about" id="about" minlength="3" maxlength="881" cols="30" rows="10">{{old('about')}}</textarea>
            @error('about')
                {{$message}}
            @enderror
        </p>
        <p>
            <label for="add_category_tool_id">الفئة</label>
            <select class="w3-input add_category_tool_id" name="add_category_tool_id" id="add_category_tool_id">
                @foreach ($addCategoryTool as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('add_category_tool_id')
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
