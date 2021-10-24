<!DOCTYPE html>
<html lang="ar-SA">

<head>
    <title> AOS | رسائل الدعم </title>

    <!--METAs tag and SEO-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--links tag-->

    <!-- css files -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/w3css.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/w3-theme-black.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cnsb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <!-- fonts files-->
    <link rel="stylesheet" href="{{ asset('css/fonts/markazi_text.css') }}">

    <!-- local css this page -->
    <style>
        /*global css*/
        

        *:not(h1, h2, h3, h4, h5, h6, i) {
            font-size: large !important;
        }

        *,
        body,
        html {
            direction: rtl !important;
        }
    </style>
</head>

<body id="myPage">
    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-theme-d2 w3-right-align">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-left w3-hover-white w3-theme-d2"
                href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-blue w3-right">
                <h1>AOS </h1>
            </a>
            @if ($contact->receiveReply==1)
                <a href="#our_team" class="w3-bar-item w3-button w3-right w3-hide-small w3-hover-red w3-hover-white">كتابة رد</a>
                <a href="#our_team" class="w3-bar-item w3-button w3-right w3-hide-small w3-hover-red w3-hover-white">إرسال رد</a>
            @else
                
            @endif
            <a href="#pricing" class="w3-bar-item w3-button w3-right w3-hide-small w3-hover-red w3-hover-white">نسخ المعلومات</a>
            <!-- -->
            <form style="display: inline!important" action="{{ route('admin.cms.homePage.contact.destroy', $contact) }}"
                method="post" >
                @csrf
                <button style="display: inline!important" type="submit" class="w3-button w3-bar-item w3-hover-none cnsb-hov-txt-red"
                    onclick="alert('سيتم حذف تخصص المواد التي بداخله')">
                    <i class="w3-large fa fa-trash cnsb-hov-txt-red"></i>
                </button>
            </form>
        </div>

        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
            @if ($contact->receiveReply==1)
                <a href="#our_team" class="w3-bar-item w3-button w3-right-align w3-large">كتابة رد</a>
                <a href="#our_team" class="w3-bar-item w3-button w3-right-align w3-large">إرسال رد</a>
            @else
                
            @endif
                <a href="#about_us" class="w3-bar-item w3-button w3-right-align w3-large">نسخ المعلومات </a>
        </div>
    </div>

    <!-- Contact Container -->
    <div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
        <div class="w3-content">
            <h1 class="w3-border-bottom cnsb-bor-teal w3-padding-64 cnsb-bor-large w3-clear"
                style="padding-bottom: 0!important;display:inline!important">اتصل بنا </h1>
            <!-- -->
            <div class="w3-row-padding w3-section w3-stretch">
                <div class="w3-col l6 w3-right">
                    <form action="{{ route('admin.cms.homePage.contact.store') }}" method="POST" class="w3-content w3-section w3-container w3-card-4 w3-padding-16 w3-white">
                        @csrf
                        <h2 class="cnsb-txt-red w3-padding-16">نموذج الرد </h2>
                        {{-- <p>
                            <label for="name">إلى</label>
                            <input readonly type="text" class="w3-input name" name="name" id="name"
                                value="{{ $contact->name }}" minlength="3" maxlength="25">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </p> --}}
                        <p>
                            <label for="email">إلى</label>
                            <input readonly type="email" class="w3-input email" name="email" id="email"
                                value="{{ $contact->email }}" minlength="7" maxlength="25">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </p>
                        <p>
                            <label for="subject">الموضوع</label>
                            <input readonly type="text" class="w3-input subject" name="subject" id="subject"
                                value="ردا على : {{ $contact->subject }}" minlength="3" maxlength="72">
                            @error('subject')
                            {{ $message }}
                            @enderror
                        </p>
                        <p>
                            <label for="message">الرسالة <span class="cnsb-txt-red"><b><i><a class="w3-medium" href="{{ asset('pdf/help/كيف_أكتب_بريدا_إلكترونيا_مميزا.pdf') }}">كيف أكتب بريدا إلكترونيا مميزا</a></i></b></span></label>
<textarea class="w3-input message" name="message" id="message" minlength="72"
maxlength="881" cols="30" rows="10">

سيدي /سيدتي العزيز/ة {{ $contact->name }}
شكرا على تواصلك معتا 
علما أن هذه الرسالة تأتي ردا على استفسارك  ({{ $contact->subject }})  وقد ذكرت فيه ما نصه
({{ Str::limit($contact->message, 72, '...') }})
1-احرص أن يكون ردك موجزا
2-احرص أن يكون إملائك صحيحا

إذا كان لديك أي أسئلة أو أستفسارات  لا تتردد في التواصل معنا 

مع أطيب الامنيات

التدقيق الاملائي مرة أخيرة
</textarea>
                            @error('message')
                            {{ $message }}
                            @enderror
                        </p>
                    </form>
                </div>
                <div class="w3-col l6 w3-right">
                    <form action="{{ route('store') }}" method="POST" class="w3-content w3-section w3-container w3-card-4 w3-padding-16 w3-white">
                        @csrf
                        <h2 class="cnsb-txt-red w3-padding-16">نموذج الرسالة </h2>
                        <p>
                            <label for="name">الاسم</label>
                            <input readonly type="text" class="w3-input name" name="name" id="name"
                                value="{{ $contact->name }}" minlength="3" maxlength="25">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </p>
                        <p>
                            <label for="email">البريد الإلكتروني</label>
                            <input readonly type="email" class="w3-input email" name="email" id="email"
                                value="{{ $contact->email }}" minlength="7" maxlength="25">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </p>
                        <p>
                            <label for="subject">الموضوع</label>
                            <input readonly type="text" class="w3-input subject" name="subject" id="subject"
                                value="{{ $contact->subject }}" minlength="3" maxlength="72">
                            @error('subject')
                            {{ $message }}
                            @enderror
                        </p>
                        <p>
                            <label for="message">الرسالة</label>
                            <textarea readonly class="w3-input message" name="message" id="message" minlength="72"
                                maxlength="881" cols="30" rows="10">{{ $contact->message }}</textarea>
                            @error('message')
                            {{ $message }}
                            @enderror
                        </p>
                        <p>
                            <label for="receiveReply">تلقي رد</label>
                            @if ($contact->receiveReply==1)
                            <input readonly class="w3-input receiveReply" name="receiveReply" id="receiveReply"
                                value="{{ 'نعم' }}">
                            @else
                            <input readonly class="w3-input receiveReply" name="receiveReply" id="receiveReply"
                                value="{{ 'لا' }}">
                            @endif
                            @error('receiveReply')
                            {{ $message }}
                            @enderror
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
        <h4>تابعنا على </h4>
        @foreach ($social as $item)
        <a class="w3-button w3-xlarge w3-blue" href="{{ $item->url }}" title="{{ $item->title }}"><i
                class="{{ $item->icon }}" style="position: relative;top:4px"></i></a>
        @endforeach
        <p> يشكر موقع aos موقع <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a> على
            إتاحته هذا القالب بشكل مجاني </p>
        <span class="w3-opacity w3-medium">
            قام بتعديل هذا القالب بما يتلائم وهذا المشروع المبرمج/ <a
                href="https://www.facebook.com/almashkliabualeiz">معتز
                المشكلي</a> يمكنك الضغط على <a
                href="https://www.w3schools.com/w3css/tryw3css_templates_website.htm">هنا</a>
            لرؤية القالب قبل التعديل
        </span>


        <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
            <span class="w3-text w3-padding w3-blue w3-hide-small">إلى الاعلى</span>
            <a class="w3-button w3-theme" href="#myPage"><span class="w3-xlarge">
                    <i class="fa fa-chevron-circle-up"></i></span></a>
        </div>
    </footer>

    <script src="{{ asset('js/w3.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        // Script for side navigation
        function w3_open() {
            const x = document.getElementById("mySidebar");
            x.style.width = "300px";
            x.style.paddingTop = "10%";
            x.style.display = "block";
        }

        // Close side navigation
        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }

        // Used to toggle the menu on smaller screens when clicking on the menu button
        function openNav() {
            const x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") === -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
        //
        $('label').addClass('w3-xlarge');
        //
        $("input[type='email'],input[type='number'],input[type='url'],input[type='tel'],input.email,input.number,input.url,input.ltr").addClass('w3-left-align');
        $("input[type='email'],input[type='number'],input[type='url'],input[type='tel'],input.email,input.number,input.url,input.ltr").addClass('dir','ltr');

    </script>

</body>

</html>