@extends('layouts.panel')
@section('content')

<div class="w3-container w3-large">
    <!-- header + title-->
    <div class="w3-bar" style="margin-top: 44px">
        <div class="w3-bar-item w3-right">
            <h1 class="fa-2x" style="padding: 0px;margin:0px;" >إضافة عرض جديد باسم <span id="main-title" style="padding: 0px;margin:0px;font-family: 'Aref Ruqaa', serif!important;"></span></h1>
        </div>
    </div>
    
    <form action="{{ route('admin.cms.homePage.modal.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>
            <label for="openClose">فتح / غلق العرض</label>
            <select class="w3-input openClose" name="openClose" id="openClose">
                <option value="1">العرض مفتوح</option>
                <option value="2">العرض مغلق</option>
            </select>
            @error('openClose')
                {{ $message }}
            @enderror
        </p>
        <p>
            <label for="title">العنوان</label>
            <input type="text" class="w3-input title" name="title" id="title" value="{{ old('title') }}" minlength="3" maxlength="72" oninput="$('#slug').val($('#title').val().replace(/\s+|_+/g,'-').toLowerCase()); $('#main-title').text($('#title').val())">
            @error('title')
                {{ $message }}
            @enderror
        </p>
		<p>
            <label for="image">الصورة</label>
            <input type="file" class="w3-input image" name="image" id="image" minlength="3" maxlength="25" accept="image/*">
            @error('image')
                {{ $message }}
            @enderror
        </p>
		<p>
            <label for="describe">الوصف</label>
            <textarea class="w3-input describe" name="describe" id="describe" minlength="72" maxlength="881" cols="30" rows="10">{{old('describe')}}</textarea>
            @error('describe')
                {{ $message }}
            @enderror
        </p>
		<p>
            <label for="startDate">تاريخ البداية</label>
            <input type="date" class="w3-input startDate" name="startDate" id="startDate" value="{{ old('startDate') }}" minlength="3" maxlength="25">
            @error('startDate')
                {{ $message }}
            @enderror
        </p>
		<p>
            <label for="expiryDate">تاريخ النهاية</label>
            <input type="date" class="w3-input expiryDate" name="expiryDate" id="expiryDate" value="{{ old('expiryDate') }}" minlength="3" maxlength="25">
            @error('expiryDate')
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
        <h4 id="logo">ِAOS</h4>
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
