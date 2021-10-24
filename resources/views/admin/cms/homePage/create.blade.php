@extends('layouts.panel')
@section('content')

<div class="w3-container w3-large">
    <!-- header + title-->
    <div class="w3-bar" style="margin-top: 44px">
        <div class="w3-bar-item w3-right">
            <h1 class="fa-2x" style="padding: 0px;margin:0px;" >أضف لصفحة الرئيسية  <span id="main-title" style="padding: 0px;margin:0px;font-family: 'Aref Ruqaa', serif!important;"></span></h1>
        </div>
    </div>
    <form action="{{ route('admin.cms.homePage.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>
            <label for="headerImage">الصورة الرئيسية </label>
            <input accept="image/*" type="file" value="{{old('headerImage')}}" class="w3-input headerImage" name="headerImage" id="headerImage">
            @error('headerImage')
                {{ $message }}
            @enderror
        </p>
        <p>
            <label for="altHeaderImage"> صف ما تحويه الصورة أعلاه </label>
            <input type="text" minlength="3" maxlength="881" value="{{old('altHeaderImage')}}" class="w3-input altHeaderImage" name="altHeaderImage" id="altHeaderImage">
            @error('altHeaderImage')
                {{ $message }}
            @enderror
            <span class="cnsb-txt-red"> مهم لمحركات البحث والتسويق الاكتروني</span>
        </p>
        <p>
            <label for="about">نص عبارة عنا </label>
            <textarea type="text" class="w3-input about" name="about" id="about" cols="30" rows="5" minlength="72" maxlength="812">{{old('about')}}</textarea>
            @error('about')
                {{ $message }}
            @enderror
        </p>
        <p>
            <label for="keywords">نص الكلمات المفتاحية </label>
            <textarea type="text" value="" class="w3-input keywords" name="keywords" id="keywords" cols="30" rows="5" minlength="72" maxlength="812">{{old('keywords')}}</textarea>
            @error('keywords')
                {{ $message }}
            @enderror
            <div class="w3-panel w3-rightbar w3-border-blue w3-pale-blue">
                <ul class="w3-ul">
                    <h3>تذكر</h3>
                    <li>ضع بين كل عبارة بحث فاصلة </li>
                    <li>استخدم كلمات طويلة الذيل فأنت في العادة لا تبحث بكلمات قصيرة</li>
                    <li>انتقي كلماتك المفتاحية بعناية فائقة فهي من اسباب تصدرك لنتائج البحث</li>
                    <li>من الاساليب التسويقية غير الفعالة هي كثرة الكلمات المفتاحية التي لا تمت لمجالك بصلة مما يتسبب في في انقاص تصنيفك لدى محركات البحث</li>
                    <li>محركات البحث أذكى مما تبدو عليه لذا لا تحاول خداعها</li>
                </ul>
            </div>
        </p>
        <p>
            <label for="address">العنوان | <span class=" w3-medium cnsb-txt-red"> يفضل كتابة المنطقة ثم الدولة </span></label>
            <input type="text" value="{{old('address')}}" class="w3-input address" name="address" id="address" minlength="3" maxlength="72">
            @error('address')
                {{ $message }}
            @enderror
        </p>
        <p>
            <label for="tel">الرقم الخصص للدعم</label>
            <input type="tel" dir="ltr" maxlength="25" minlength="7" value="{{old('tel')}}" class="w3-input tel w3-left-align  tel" name="tel" id="tel">
            @error('tel')
                {{ $message }}
            @enderror
        </p>
        <p>
            <label for="email">البريد الإلكتروني المخصص لدعم</label>
            <input type="email" dir="ltr" maxlength="25" minlength="7" value="{{old('email')}}" class="w3-input email w3-left-align  mail" name="email" id="email">
            @error('email')
                {{ $message }}
            @enderror
        </p>
        <p>
            <label for="mapImage">صورة المنطقة التي تغطيها خدماتنا</label>
            <input accept="image/*" type="file" value="{{old('mapImage')}}" class="w3-input mapImage" name="mapImage" id="mapImage">
            @error('mapImage')
                {{ $message }}
            @enderror
        </p>
        <p>
            <label for="altMapImage"> صف ما تحويه الصورة أعلاه </label>
            <input type="text" minlength="3" maxlength="881" value="{{old('altMapImage')}}" class="w3-input altMapImage" name="altMapImage" id="altMapImage">
            @error('altMapImage')
                {{ $message }}
            @enderror
            <span class="cnsb-txt-red"> مهم لمحركات البحث والتسويق الاكتروني</span>
        </p>
        <p>
            <label for="whatsAppID">رمز روبوت الواتساب</label>
            <input value="{{old('whatsAppID')}}" class="w3-input whatsAppID" name="whatsAppID" id="whatsAppID">
            @error('whatsAppID')
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
