@extends('layouts.panel')
@section('content')

    <div class="w3-container w3-large">
        <!-- header + title-->
        <div class="w3-bar" style="margin-top: 44px">
            <div class="w3-bar-item w3-right">
                <h1 class="fa-2x" style="padding: 0px;margin:0px;"> أضف كلية جديدة باسم <span id="main-title"
                        style="padding: 0px;margin:0px;font-family:'Aref Ruqaa', serif!important;"></span></h1>
            </div>
        </div>
        <div class="w3-panel w3-leftbar w3-sand w3-xxlarge w3-serif">
            @if (session()->has('success'))
                <div class="alert alert-success w3-xlarge">
                    <p><i>"{{ session()->get('success') }}"</i></p>
                </div>
            @endif
        </div>
        <form action="{{ route('admin.addCollege.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p>
                <label for="image">صورة</label>
                <input type="file" class="w3-input image" name="image" id="image" accept="image/*">
                @error('image')
                    {{ $message }}
                @enderror
            </p>
            <p>
                <label for="alt">صف ما تراه في الصورة</label>
                <input type="text" class="w3-input alt" name="alt" id="alt" minlength="3" maxlength="881"
                    value="{{ old('alt') }}">
                @error('alt')
                    {{ $message }}
                @enderror
            </p>
            <p>
                <label for="name">اسم</label>
                <input type="text" class="w3-input name" name="name" id="name" minlength="3" maxlength="881" value=" كلية {{old('name')}}" oninput="$('#slug').val($('#name').val().replace(/\s+|_+/g,'-').toLowerCase()); $('#main-title').text($('#name').val())">
                @error('name')
                    {{ $message }}
                @enderror
            </p>
            <p>
                {{-- <label for="slug">سبيكة</label> --}}
                <input type="hidden" class="w3-input slug" name="slug" id="slug" value="{{ old('slug') }}">
                @error('slug')
                    {{ $message }}
                @enderror
            </p>
            <p>
                <label for="type">نوع</label>
                <select class="w3-input type" name="type" id="type">
                    <option value="1">حكومي</option>
                    <option value="2">أهلي</option>
                    <option value="3">أخرى</option>
                </select>
                @error('type')
                    {{ $message }}
                @enderror
            </p>
            <p>
                <label for="url">عنوان url</label>
                <input type="url" class="w3-input url" name="url" id="url"
                    value="{{ old('url') }}">
                @error('url')
                    {{ $message }}
                @enderror
            </p>
            <p>
                <label for="add_universitie_id">add_universitie_id</label>
                <select class="w3-input add_universitie_id" name="add_universitie_id" id="add_universitie_id">
                    @foreach ($addUniversity as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('add_universitie_id')
                    {{ $message }}
                @enderror
            </p>
            <p>
                <label for="about">حول</label>
                <textarea class="about w3-input" name="about" id="about" cols="30" rows="10" minlength="72" maxlength="881">{{old('about')}}</textarea>
                @error('about')
                    {{ $message }}
                @enderror
            </p>
            <p>
                <label for="keywords">الكلمات المفتاحية </label>
                <input type="text" class="w3-input keywords" name="keywords" id="keywords" minlength="3" maxlength="881" value="{{old('keywords')}}">
                @error('keywords')
                    {{ $message }}
                @enderror
            </p>
            <p>
                <input type="submit" class="w3-button w3-dark-grey" value="إنشاء">
            </p>
        </form>
        <hr>
        <div class="w3-topbar w3-container w3-border-white"></div>
        <!-- Footer -->
        <footer class="w3-container w3-padding-16 w3-light-grey w3-medium">
            <h4 id="logo">AOS</h4>
            تشكر مجموعة على <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a> اتاحتها هذا
            القالب
            بشكل مجاني
            <p class="w3-opacity w3-text-black w3-border-top w3-border-bottom w3-border-black">
                قام بتعديل هذا القالب بما يتلائم وهذا المشروع المبرمج/ <a
                    href="https://www.facebook.com/almashkliabualeiz">معتز
                    المشكلي</a> يمكنك الضغط على <a
                    href="https://www.w3schools.com/w3css/tryit.asp?filename=tryw3css_templates_analytics&stacked=h">هنا</a>
                لرؤية القالب قبل التعديل
            </p>
        </footer>
        <hr>
    </div>
@endsection
