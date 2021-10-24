@extends('layouts.panel')
@section('content')

    <div class="w3-container w3-large">
        <!-- header + title-->
        <div class="w3-bar" style="margin-top: 44px">
            <div class="w3-bar-item w3-right">
                <h1 class="fa-2x" style="padding: 0px;margin:0px;"> أضف جامعة جديدة باسم <span id="main-title"
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
        <form action="{{ route('admin.addUniversity.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p>
                <label for="image">صورة</label>
                <input type="file" class="w3-input image" name="image" id="image" minlength="3" maxlength="40"
                    accept="image/*">
                @error('image')
                    {{ $message }}
                @enderror
            </p>
            <p>
                <label for="alt">صف ما تراه في الصورة</label>
                <input type="text" value="{{ old('alt') }}" class="w3-input alt" name="alt" id="alt" minlength="3"
                    maxlength="881">
                @error('alt')
                    {{ $message }}
                @enderror
            </p>
            <p>
                <label for="name">الاسم </label>
                <input type="text" value=" جامعة {{ old('name') }}" class="w3-input name" name="name" id="name" minlength="3"
                    maxlength="40"
                    oninput="$('#slug').val($('#name').val().replace(/\s+|_+/g,'-').toLowerCase()); $('#main-title').text($('#name').val())">
                @error('name')
                    {{ $message }}
                @enderror
            </p>
            <p>
                {{-- <label for="slug">slug</label> --}}
                <input type="hidden" value="{{ old('slug') }}" class="w3-input slug" name="slug" id="slug" minlength="3"
                    maxlength="40">
                @error('slug')
                    {{ $message }}
                @enderror
            </p>
            <p>
                <label for="add_countrie_id">البلد</label>
                <select class="w3-input add_countrie_id" name="add_countrie_id" id="add_countrie_id">
                    @foreach ($addCountry as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('add_countrie_id')
                    {{ $message }}
                @enderror
            </p>
            <p>
                <label for="add_citie_id">المدينة</label>
                <select class="w3-input add_citie_id" name="add_citie_id" id="add_citie_id">
                    @foreach ($addCity as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('add_citie_id')
                    {{ $message }}
                @enderror
            </p>
            <p>
                <label for="type">الفئة</label>
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
                <label for="internationalRanking">الترتيب الدولي</label>
                <input type="number" value="{{ old('internationalRanking') }}" class="w3-input internationalRanking"
                    name="internationalRanking" id="internationalRanking" minlength="1" maxlength="4">
                @error('internationalRanking')
                    {{ $message }}
                @enderror
            </p>
            <p>
                <label for="localRanking">الترتيب المحلي</label>
                <input type="number" value="{{ old('localRanking') }}" class="w3-input localRanking" name="localRanking"
                    id="localRanking" minlength="1" maxlength="4">
                @error('localRanking')
                    {{ $message }}
                @enderror
            </p>
            <p>
                <label for="url">الموقع الالكتروني</label>
                <input type="url" value="{{ old('url') }}" class="w3-input url" name="url" id="url" minlength="3"
                    maxlength="40">
                @error('url')
                    {{ $message }}
                @enderror
            </p>
            <p>
                <label for="about">حول/نبذة</label>
                <textarea class="w3-input about" name="about" id="about" minlength="3" maxlength="881" cols="30"
                    rows="10">{{ old('about') }}</textarea>
                @error('about')
                    {{ $message }}
                @enderror
            </p>
            <p>
                <label for="keywords">كلمات مفتاحية</label>
                <input type="keywords" value="{{ old('keywords') }}" class="w3-input keywords" name="keywords" id="keywords" minlength="3"
                    maxlength="881">
                @error('keywords')
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
