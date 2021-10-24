<!DOCTYPE html>
<html dir="rtl">
<title>وثيقة تصميم موقع (ِAOS)</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3css.min.css">
<body dir="rtl">
    <div class="w3-container w3-teal">
        <h1>وثيقة تصميم موقع (ِAOS)</h1>
    </div>
    <div class="w3-container w3-black">
        <p>تمكن هذه الوثيقة أي فرد لديه خبرة سابقة مع لارافيل من إنشاء وإحياء هذا المشروع(الموقع) مرة أخرى ويكن إعتبارها
            ورقة تعليمات كما انه تم ترك حرية الاختيار للمبرمج لتصميم لوح الادارة كما يراها..</p>
    </div>
    <div class="w3-container w3-content">
        <h2>أولا: قائمة التحقق المتبعة <br></h2>
        <p>
            أثناء سير العمل (تضمن قائمة التحقق هذه أقصى درجات الانتاجية وحفظ وقت المبرمج من الضياع) كما تمكن هذه القائمة
            من إكتشاف الخطأ بسهولة لئنها تحدد أماكن عمل المبرمج لذا يرجى إتباعها.
        </p>
        <ul class="w3-ul" dir="ltr">
            <li>
                routes
            </li>
            <li>
                views
            </li>
            <li>
                controller
            </li>
            <li>
                file system (option)
            </li>
            <li>
                model
            </li>
            <li>
                migrateion
            </li>
            <li>
                form->inputTag([input => type|class|name|id|minlingth|maxlingth|value|accept /Image |onInput /option"])
            </li>
        </ul>
        <h2>ثانيا الجداول</h2>
        <p>
            تم إنشاء الجداول على طريقة دوال جافا سكريبت وهي الطريقة المحبذة إلي للعمل مع الجداول حيث
            غالبا ما أكتب <br>
        <div class="w3-code w3-left-align" contenteditable>
            php artisan make:tableNameAsJSFunc --all
        </div>
        مثال <br>
        <div class="w3-code w3-left-align" contenteditable>
            php artisan CMSHomePage --all
        </div>
        <br>
        لانشاء الجدول والمودل وكل ما يلزم للعمل وقد تم إنشاء الجداول حسب الترتيب المتبع أدناه
        </p>
        <hr>
        <ul class="w3-ul">
            <li>
                جدول إدارة محتوى الاجزاء الرئيسية في الصفحة الرئيسية ويتبعه
            </li>
            <li>
                CMSHomePage
            </li>
            <li>
                <ul dir="ltr" class="w3-left-align">
                    <li>headerImage</li>
                    <li>altHeaderImage</li>
                    <li>about</li>
                    <li>keywords</li>
                    <li>address</li>
                    <li>tel</li>
                    <li>mail</li>
                    <li>mapImage</li>
                    <li>altMapImage</li>
                    <li>whatsAppBotID</li>
                </ul>
            </li>
            <br>
            <li>
                جدول النافذة المنبثقة
            </li>
            <li>
                Modal
            </li>
            <li>
                <ul dir="ltr" class="w3-left-align">
                    <li>
                        openClose
                    </li>
                    <li>
                        title
                    </li>
                    <li>
                        describe
                    </li>
                    <li>
                        startDate
                    </li>
                    <li>
                        expiryDate
                    </li>
                </ul>
            </li>
            <br>
            <li>
                جدول إضافة الاعضاء
            </li>
            <li>
                addMember
            </li>
            <li>
                <ul dir="ltr" class="w3-left-align">
                    <li>
                        image
                    </li>
                    <li>
                        alt
                    </li>
                    <li>
                        name
                    </li>
                    <li>
                        slug
                    </li>
                    <li>
                        about
                    </li>
                    <li>
                        keywords
                    </li>
                    <li>
                        email
                    </li>
                    <li>
                        tel
                    </li>
                    <li>
                        addRole
                    </li>
                    <li>
                        facebookAccount
                    </li>
                    <li>
                        twitterAccount
                    </li>
                    <li>
                        instagramAccount
                    </li>
                </ul>
            </li>
            <br>
            <li>
                جدول إضافة قنوات التواصل الاجتماعي
            </li>
            <li>
                Social
            </li>
            <li>
                <ul dir="ltr" class="w3-left-align">
                    <li>
                        url
                    </li>
                    <li>
                        alt
                    </li>
                    <li>
                        icon
                    </li>
                </ul>
            </li>
            <br>
            <li>
                جدول تواصل معنا (في حال تم تفعيله)
            </li>
            <li>
                Contact
            </li>
            <li>
                <ul dir="ltr" class="w3-left-align">
                    <li>
                        name
                    </li>
                    <li>
                        email
                    </li>
                    <li>
                        subject
                    </li>
                    <li>
                        message
                    </li>
                    <li>
                        receive_reply
                    </li>
                </ul>
            </li>
            <br>
            <li>
                جدول ملف التفاضل هنا تنتهي الجداول المتعلقة بإدارة محتوى الصفحة الرئيسية

            </li>
            <li>
                tfasol
            </li>
            <li>
                <ul dir="ltr" class="w3-left-align">
                    <li>
                        file
                    </li>
                    <li>
                        alt
                    </li>
                </ul>
            </li>
            <br>
            <li>
                مسار الوسائط المقترح (fileSys)
            </li>
            <li dir="ltr" class="w3-left-align">
                <mark>image|file/mediaFolderName</mark>
            </li>
        </ul>
        <h2>النماذج المساعدة (يتبع الجداول)</h2>
        <p>
            وقد تم إنشائها للحصول على خيارات فمثلا إذا أردت إضافة دولة يمكنك إضافة دولة من النماذج المساعدة ثم جدل إسمها
            كخيار في نموذج أخرى داخل المشروع وربط المحتوى المولد من النموذج بهذه الدولة
        </p>
        <hr>
        <ul class="w3-ul">
            <li>
                <b>helpForms</b>
                <p> (هذا الاسم ليس جدولا وإنما هو لبنية الرابط وتحته تندرج الجداول التالية)</p>
            </li>
            <li>
                جدول إضافة الدولة
            </li>
            <li>
                addCountry
            </li>
            <li>
                <ul dir="ltr" class="w3-left-align">
                    <li>
                        name
                    </li>
                    <li>
                        slug
                    </li>
                </ul>
            </li>
            <br>
            <li>
                جدول إضافة المدينة
            </li>
            <li>
                addCity
            </li>
            <li>
                <ul dir="ltr" class="w3-left-align">
                    <li>
                        name
                    </li>
                    <li>
                        slug
                    </li>
                    <li>
                        add_countrie_id
                    </li>
                </ul>
            </li>
            <br>
            <li>
                جدول إضافة دور (ويستخدم لاضافة أدوار للفريق)
            </li>
            <li>
                addRole
            </li>
            <li>
                <ul dir="ltr" class="w3-left-align">
                    <li>
                        name
                    </li>
                    <li>
                        slug
                    </li>
                </ul>
            </li>
            <br>
            <li>
                جدول إضافة قئات للأدوات (عند إنشاء رابط لاداة مهمة على الانترنت تحتاج إلى فئة لادراجها ضمنها هذا هو
                المكان الصحيح لذلك)
            </li>
            <li>
                addCategoryTool
            </li>
            <li>
                <ul dir="ltr" class="w3-left-align">
                    <li>
                        name
                    </li>
                    <li>
                        slug
                    </li>
                </ul>
            </li>

            <h3>الجامعات (يتبع الجداول)</h3>
            <p>
                إضافة جامعة وكلياتها وتخصصاتها
            </p>
            <ul class="w3-ul">
                <li>
                    جدول إضافة الجامعات تربطة علاقة بالمدن والدول
                </li>
                <li>
                    addUniversity
                </li>
                <li>
                    <ul class="w3-left-align">
                        <li>
                            image
                        </li>
                        <li>
                            alt
                        </li>
                        <li>
                            name
                        </li>
                        <li>
                            slug
                        </li>
                        <li>
                            add_countrie_id
                        </li>
                        <li>
                            add_citie_id
                        </li>
                        <li>
                            type
                        </li>
                        <li>
                            internationalRanking
                        </li>
                        <li>
                            localRanking
                        </li>
                        <li>
                            url
                        </li>
                        <li>
                            about
                        </li>
                        <li>
                            keywords
                        </li>
                        <li>
                            <mark>image|file/addUniversity/addCollege</mark>
                        </li>
                    </ul>
                </li>
                <br>
                <li>
                    جدول إضافة كلية تربطة علاقة بالجامعات
                </li>
                <li>
                    addCollege
                </li>
                <li>
                    <ul class="w3-left-align">
                        <li>
                            image
                        </li>
                        <li>
                            alt
                        </li>
                        <li>
                            name
                        </li>
                        <li>
                            slug
                        </li>
                        <li>
                            type
                        </li>
                        <li>
                            url
                        </li>
                        <li>
                            add_universitie_id
                        </li>
                        <li>
                            about
                        </li>
                        <li>
                            keywords
                        </li>
                        <li>
                            <mark>image|file/addSpecialty</mark>
                        </li>
                    </ul>
                </li>
                <br>
                <li>
                    جدول إضافة التخصصات تربطة علاقة بالكليات
                </li>
                <li>
                    addSpecialty
                </li>
                <li>
                    <ul class="w3-left-align">
                        <li>
                            image
                        </li>
                        <li>
                            alt
                        </li>
                        <li>
                            name
                        </li>
                        <li>
                            slug
                        </li>
                        <li>
                            url
                        </li>
                        <li>
                            add_college_id
                        </li>
                        <li>
                            about
                        </li>
                        <li>
                            keywords
                        </li>
                        <li>
                            <mark>image|file/addSpecialty</mark>
                        </li>
                    </ul>
                </li>
                <br>
                <li>
                    جدول إضافة أداة تربطه علاقة بفئات الادوات
                </li>
                <li>
                    addTool
                </li>
                <li>
                    <ul class="w3-left-align">
                        <ul>
                            name
                        </ul>
                        <ul>
                            url
                        </ul>
                        <ul>
                            about
                        </ul>
                        <ul>
                            add_category_tool_id
                        </ul>
                    </ul>
                </li>
            </ul>
            <h2>
                ثالثا: التطويرات (اختياري)
            </h2>
            <ul class="w3-ul">
                <li>
                    صفحة لكل دولة
                </li>
                <li>
                    صفحة لكل مدينة
                </li>
                <li>
                    التوسع في النبذة الخاصة بالجامعة
                </li>
            </ul>
    </div>
    
</body>

</html># aos
# aos
# aos
