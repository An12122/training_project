@extends('frontend.master')

@section('content')
    <section class="breadcrumb-area section-padding img-bg-2 text-right" dir="rtl">
        <div class="overlay"></div>
        <div class="container">
            <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                <div class="section-heading">
                    <h2 class="section__title text-white">إنشاء حساب</h2>
                </div>
                <ul
                    class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                    <li><a href="index.html">الرئيسية</a></li>
                    <li>الصفحات</li>
                    <li>إنشاء حساب</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="contact-area section--padding position-relative text-right" dir="rtl">
        <span class="ring-shape ring-shape-1"></span>
        <span class="ring-shape ring-shape-2"></span>
        <span class="ring-shape ring-shape-3"></span>
        <span class="ring-shape ring-shape-4"></span>
        <span class="ring-shape ring-shape-5"></span>
        <span class="ring-shape ring-shape-6"></span>
        <span class="ring-shape ring-shape-7"></span>

        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title text-center fs-24 lh-35 pb-4">أنشئ حسابك وابدأ التعلم!</h3>
                            <div class="section-block"></div>

                            <form method="post" class="pt-4" action="{{ route('register') }}">
                                @csrf

                                <div class="input-box">
                                    <label class="label-text">الاسم الكامل</label>
                                    <div class="form-group">
                                        <input class="form-control form--control text-right" type="text" name="name"
                                            placeholder="أدخل اسمك" value="{{ old('name') }}">
                                        <span class="la la-user input-icon"></span>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="input-box">
                                    <label class="label-text">البريد الإلكتروني</label>
                                    <div class="form-group">
                                        <input class="form-control form--control text-right" type="email" name="email"
                                            placeholder="أدخل بريدك الإلكتروني" value="{{ old('email') }}">
                                        <span class="la la-envelope input-icon"></span>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="input-box">
                                    <label class="label-text">كلمة المرور</label>
                                    <div class="input-group mb-3">
                                        <span class="la la-lock input-icon"></span>
                                        <input class="form-control form--control password-field text-right" type="password"
                                            name="password" placeholder="أدخل كلمة المرور">
                                        <div class="input-group-append">
                                            <button class="btn theme-btn theme-btn-transparent toggle-password"
                                                type="button">
                                                <!-- أيقونات الرؤية -->
                                                <!-- نفس SVGs السابقة -->
                                            </button>
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="input-box">
                                    <label class="label-text">تأكيد كلمة المرور</label>
                                    <div class="input-group mb-3">
                                        <span class="la la-lock input-icon"></span>
                                        <input class="form-control form--control text-right" type="password"
                                            name="password_confirmation" placeholder="أعد إدخال كلمة المرور">
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="btn-box">
                                    <div class="custom-control custom-checkbox mb-4 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="agreeCheckbox" required>
                                        <label class="custom-control-label custom--control-label" for="agreeCheckbox">
                                            بتسجيلك، فإنك توافق على
                                            <a href="terms-and-conditions.html" class="text-color hover-underline">الشروط
                                                والأحكام</a>
                                            و
                                            <a href="privacy-policy.html" class="text-color hover-underline">سياسة
                                                الخصوصية</a>
                                        </label>
                                    </div>

                                    <button class="btn theme-btn" type="submit">
                                        إنشاء الحساب <i class="la la-arrow-left icon mr-1"></i>
                                    </button>

                                    <p class="fs-14 pt-2">
                                        لديك حساب بالفعل؟ <a href="login.html" class="text-color hover-underline">سجّل
                                            الدخول</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
