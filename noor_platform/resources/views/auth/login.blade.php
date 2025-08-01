@extends('frontend.master')

@section('content')
    <section class="breadcrumb-area section-padding img-bg-2 text-right" dir="rtl">
        <div class="overlay"></div>
        <div class="container">
            <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                <div class="section-heading">
                    <h2 class="section__title text-white">تسجيل الدخول</h2>
                </div>
                <ul
                    class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                    <li><a href="index.html">الرئيسية</a></li>
                    <li>الصفحات</li>
                    <li>تسجيل الدخول</li>
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
                            <h3 class="card-title text-center fs-24 lh-35 pb-4">سجل الدخول إلى حسابك!</h3>
                            <div class="section-block"></div>

                            <form method="post" class="pt-4" action="{{ route('login') }}">
                                @csrf

                                <div class="d-flex flex-wrap align-items-center pb-4 justify-content-center">
                                    <a href="{{ route('auth.google') }}" class="btn theme-btn flex-grow-1 mx-2 mb-2">
                                        <i class="la la-google mr-2"></i>تسجيل الدخول عبر Google
                                    </a>
                                </div>

                                <div class="text-center pt-3 pb-4">
                                    <div class="icon-element icon-element-md fs-25 shadow-sm">أو</div>
                                </div>

                                <div class="input-box">
                                    <label class="label-text">البريد الإلكتروني أو اسم المستخدم</label>
                                    <div class="form-group">
                                        <input class="form-control form--control text-right" type="email"
                                            value="{{ old('email') }}" name="email"
                                            placeholder="أدخل البريد الإلكتروني أو اسم المستخدم">
                                        <span class="la la-user input-icon"></span>
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
                                                <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px"
                                                    viewBox="0 0 24 24" width="22px" fill="#7f8897">
                                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                                    <path
                                                        d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z" />
                                                </svg>
                                                <svg class="eye-off" xmlns="http://www.w3.org/2000/svg" height="22px"
                                                    viewBox="0 0 24 24" width="22px" fill="#7f8897">
                                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                                    <path
                                                        d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13z" />
                                                </svg>
                                            </button>
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="btn-box">
                                    <div class="d-flex align-items-center justify-content-between pb-4">
                                        <div class="custom-control custom-checkbox fs-15">
                                            <input type="checkbox" class="custom-control-input" id="rememberMeCheckbox"
                                                required>
                                            <label class="custom-control-label custom--control-label"
                                                for="rememberMeCheckbox">تذكرني</label>
                                        </div>
                                        <a href="/forgot-password" class="btn-text">نسيت كلمة المرور؟</a>
                                    </div>
                                    <button class="btn theme-btn" type="submit">تسجيل الدخول <i
                                            class="la la-arrow-left icon mr-1"></i></button>
                                    <p class="fs-14 pt-2">ليس لديك حساب؟ <a href="{{ route('register') }}"
                                            class="text-color hover-underline">أنشئ حسابًا</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        @if (session('error'))
            Swal.fire({
                toast: true,
                icon: 'error',
                title: '{{ session('error') }}',
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                customClass: {
                    popup: 'colored-toast'
                },
                background: 'red',
                color: '#ffffff',
                iconColor: '#ffffff',
            });
        @endif
    </script>
@endpush
