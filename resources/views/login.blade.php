<!DOCTYPE html>
<html>
<title>@yield("title")</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/w3css.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/cnsb.min.css') }}">
<style>
    html,
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: "Raleway", sans-serif
    }
    *{
        direction: rtl!important;
        text-align: right!important;
    }
    input{
        direction: ltr!important;
        text-align: left!important;  
    }
</style>

<body class="w3-light-grey w3-content">
    <div style="position: relative;height: 50%;margin-top: 15%;">
        <h1>دخول المشرفين</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <p>
                <label class="w3-text-blue"><b>البريد الإلكتروني</b></label>
                <input name="email" class="w3-input w3-left-align w3-border" type="text" value="{{ old('email') }}">
                @error('email')
                    {{$message}}
                @enderror
            </p>
            <p>
                <label class="w3-text-blue"><b>كلمة المرور</b></label>
                <input name="password" class="w3-input w3-left-align w3-border" type="password">
                @error('password')
                    {{$message}}
                @enderror
            </p>
            <p>
                <button class="w3-btn w3-blue w3-right" type="submit">دخول</button>
            </p>
        </form>
    </div>
</body>

</html>
