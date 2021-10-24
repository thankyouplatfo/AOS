@extends('layouts.panel')
@section('content')
    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5 class="w3-xxlarge"><b><i class="fa fa-puzzle-piece" aria-hidden="true"></i>الاجزاء الرئيسية</b><a
                href="{{ route('admin.cms.homePage.create') }}" class="w3-left"><i class="fa fa-plus"></i></a>
        </h5>
    </header>

    <div class="w3-panel">
        <div class="w3-panel w3-rightbar w3-sand w3-xxlarge w3-serif" style="margin: 0!important">
            @if (session()->has('success'))
                <div class="alert alert-success w3-xlarge" style="padding: 0!important">
                    <p><i>"{{ session()->get('success') }}"</i></p>
                    <!--<p class="w3-small"><b><i class="w3-opacity">يتغير الاسم الموجود بين قوسين إذا عدلت اسم القسم</i></b></p>-->
                </div>
            @endif
        </div>
        {{--<div class="w3-row-padding" style="margin:0 -16px">
            <button id="open" onclick="$('#open').click(function(){$('#sec-keywords').addClass('w3-block')});">تعليمات</button>
            <div class="w3-panel w3-rightbar w3-border-blue w3-pale-blue w3-display-container" style="display: none" id="sec-keywords">
                <ul class="w3-ul">
                    <h3>تذكر</h3>
                    <li>ضع بين كل ملمة مفتاحية فاصلة </li>
                    <li>استخدم كلمات طويلة الذيل فأنت في العادة لا تبحث بكلمات قصيرة</li>
                    <li>انتقي كلماتك المفتاحية بعناية فائقة فهي من اسباب تصدرك لنتائج البحث</li>
                    <li>من الاساليب التسويقية غير الفعالة هي كثرة الكلمات المفتاحية التي لا تمت لمجالك بصلة مما يتسبب في في انقاص
                        تصنيفك لدى محركات البحث</li>
                    <li>محركات البحث أذكى مما تبدو عليه لذا لا تحاول خداعها</li>
                </ul>
            </div>--}}
        
            <p>
                <input oninput="w3.filterHTML('#id01', '.item', this.value)" class="w3-input w3-block"
                    placeholder="أبحث في جدول الأقسام بواسطة المعرف || العنوان || الوصف">
            </p>
            <div class="w3-responsive">

                <table id="id01" class="w3-table w3-striped w3-white w3-centered w3-bordered">
                    <tr class="w3-bordered w3-border-black">
                        <th>
                            المعرف
                        </th>
                        <th>
                            الصورة الرئيسية
                        </th>
                        <th>
                            نص عبارة عنا
                        </th>
                        <th>
                            نص الكلمات المفتاحية
                        </th>
                        <th>
                            العنوان
                        </th>
                        <th>
                            هاتف الدعم
                        </th>
                        <th>
                            بريد الدعم الالكتروني
                        </th>
                        <th>
                            صورة منطقة خدماتنا
                        </th>
                        <th>
                            رمز بوت الواتساب
                        </th>
                        <th>
                            معاينة
                        </th>
                        <th>
                            تحرير
                        </th>
                        <th>
                            حذف
                        </th>
                    </tr>
                    @foreach ($CMSHomePage as $CMSHomePage)
                        <tr class="item">
                            <td class='w3-padding'>
                                {{ $CMSHomePage->id }}
                            </td>
                            <td id="td-bg"
                                style="background-image:url({{ asset('images/headerImage/' . $CMSHomePage->headerImage) }});">
                            </td>
                            </td>
                            <td class='w3-padding'>
                                <details>
                                    <summary>انقر للإطلاع</summary>
                                    <p>
                                        {{ $CMSHomePage->about }}
                                    </p>
                                </details>
                            </td>
                            <td class='w3-padding'>
                                <details>
                                    <summary>انقر للإطلاع</summary>
                                    <p>
                                        {{ $CMSHomePage->keywords }}
                                    </p>
                                </details>
                            </td>
                            <td class='w3-padding'>
                                {{ $CMSHomePage->address }}
                            </td>
                            <td class='w3-padding'>
                                {{ $CMSHomePage->tel }}
                            </td>
                            <td class='w3-padding'>
                                {{ $CMSHomePage->email }}
                            </td>
                            <td id="td-bg"
                                style="background-image:url({{ asset('images/mapImage/' . $CMSHomePage->mapImage) }});">
                            <td class='w3-padding'>
                                <details>
                                    <summary>انقر للإطلاع</summary>
                                    <p>
                                        {{ $CMSHomePage->whatsAppID }}
                                    </p>
                                </details>
                            </td>
                            <td>
                                <a href="{{ route('home') }}" class=" w3-hover-none w3-button w3-bar-item"
                                    target="_blank"><i class="w3-xlarge fa fa-eye cnsb-hov-txt-green"></i></a>
                            </td>
                            <td>
                                <a href="{{ route('admin.cms.homePage.edit', $CMSHomePage) }}"
                                    class=" w3-hover-none w3-button w3-bar-item"><i
                                        class="w3-xlarge fa fa-edit cnsb-hov-txt-blue"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('admin.cms.homePage.destroy', $CMSHomePage) }}" method="post">
                                    @csrf<button type="submit" class=" w3-hover-none w3-button w3-bar-item"
                                        onclick="alert('سيتم حذف هذا الصف وجميع بياناته من الجدول الموجود فيه قد يترتب على ذلك حذف التوابع المقترنة بهذا الصف')"><i
                                            class="w3-xlarge fa fa-trash cnsb-hov-txt-red"></i></button></form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <hr>
    <!-- Footer -->
    <footer class="w3-container w3-padding-16 w3-light-grey">
        <h4 id="logo">AOS</h4>
        يشكر موقع AOS موقع <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a> هلى إتاحته هذا
        القالب بشكب مجاني
        <p class="w3-opacity w3-text-black w3-border-top w3-border-bottom w3-border-black ">
            قام بتعديل هذا القالب بما يتلائم وهذا المشروع المبرمج/ <a href="https://www.facebook.com/almashkliabualeiz">معتز
                المشكلي</a> يمكنك الضغط على <a
                href="https://www.w3schools.com/w3css/tryit.asp?filename=tryw3css_templates_analytics&stacked=h">هنا</a>
            لرؤية القالب قبل التعديل
        </p>
    </footer>
@endsection
