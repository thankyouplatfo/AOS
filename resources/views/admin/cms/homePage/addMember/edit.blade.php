@extends('layouts.panel')
@section('content')

    <div class="w3-container w3-large">
        <!-- header + title-->
        <div class="w3-bar" style="margin-top: 44px">
            <div class="w3-bar-item w3-right">
                <h1 class="fa-2x" style="padding: 0px;margin:0px;">حرر عدل على عضو في الفريق <span style="padding: 0px;margin:0px;font-family: 'Aref Ruqaa', serif!important;">{{$addMember->name}}</span></h1>
            </div>
        </div>
        
        <form action="{{ route('admin.cms.homePage.addMember.update', $addMember) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p>
                <label for="image">صورة</label>
                <input type="file" class="w3-input image" name="image" id="image" value="{{$addMember->image}}" accept="image/*">
                @error('image')
                    {{$message}}
                @enderror
            </p>
            <p>
                <label for="alt">صف ما تحويه الصورة أعلاه</label>
                <input type="text" class="w3-input alt" name="alt" id="alt" value="{{$addMember->alt}}" minlength="3" max="881">
                @error('alt')
                    {{$message}}
                @enderror
            </p>
            <p>
                <label for="name">اسم</label>
                <input type="text" class="w3-input name" name="name" id="name" minlength="3" maxlength="40" value="{{$addMember->name}}">
                @error('name')
                    {{$message}}
                @enderror
            </p>
            <p>
                {{--<label for="slug">سبيكة</label>--}}
                <input type="hidden" class="w3-input slug" name="slug" id="slug" minlength="3" maxlength="40" value="{{$addMember->slug}}">
                @error('slug')
                    {{$message}}
                @enderror
            </p>
            <p>
                <label for="about">حول</label>
                <textarea class="w3-input about" name="about" id="about" minlength="3" maxlength="881" cols="30" rows="10">{{$addMember->about}}</textarea>
                @error('about')
                    {{$message}}
                @enderror
            </p>
            <p>
                <label for="keywords">نص الكلمات المفتاحية</label>
                <input type="keywords" class="w3-input keywords" name="keywords" id="keywords" minlength="3" maxlength="881" value="{{$addMember->keywords}}">
                @error('keywords')
                    {{$message}}
                @enderror
            </p>
            <p>
                <label for="email">البريد الإلكتروني</label>
                <input type="email" class="w3-input email" name="email" id="email" minlength="3" maxlength="40" value="{{$addMember->email}}">
                @error('email')
                    {{$message}}
                @enderror
            </p>
            <p>
                <label for="tel">رقم الهاتف المحمول</label>
                <input type="tel" class="w3-input tel" name="tel" id="tel" minlength="3" maxlength="40" value="{{$addMember->tel}}">
                @error('tel')
                    {{$message}}
                @enderror
            </p>
            <p>
                <label for="add_role_id">وظيفة</label>
                <select class="w3-input add_role_id" name="add_role_id" id="add_role_id">
                    @foreach ($addRole as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('add_role_id')
                    {{$message}}
                @enderror
            </p>
            <p>
                <label for="facebookAccount">حساب الفيسبوك</label>
                <input type="url" class="w3-input facebookAccount" name="facebookAccount" id="facebookAccount" minlength="3" maxlength="40" value="{{$addMember->facebookAccount}}">
                @error('facebookAccount')
                    {{$message}}
                @enderror
            </p>
            <p>
                <label for="twitterAccount">حساب على موقع تويتر</label>
                <input type="url" class="w3-input twitterAccount" name="twitterAccount" id="twitterAccount" minlength="3" maxlength="40" value="{{$addMember->twitterAccount}}">
                @error('twitterAccount')
                    {{$message}}
                @enderror
            </p>
            <p>
                <label for="instagramAccount">حساب الانستغرام</label>
                <input type="url" class="w3-input instagramAccount" name="instagramAccount" id="instagramAccount" minlength="3" maxlength="40" value="{{$addMember->instagramAccount}}">
                @error('instagramAccount')
                    {{$message}}
                @enderror
            </p>             
            <p>
                <input type="submit" class="w3-button w3-dark-grey" vlaue="إنشاء">
            </p>
        </form>
        <hr>
        <div class="w3-topbar w3-container w3-border-white"></div>
        <!-- Footer -->
        <footer class="w3-container w3-padding-16 w3-light-grey w3-medium">
            <h4 id="logo">AOS</h4>
            يشكر موقع AOS موقع <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a> هلى إتاحته
            هذا القالب بشكب مجاني
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
