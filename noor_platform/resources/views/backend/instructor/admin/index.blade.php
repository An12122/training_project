@extends('backend.instructor.master')

@section('content')
    <div class="page-content">

        @if (!isApprovedUser())
            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                <div class="text-white">
                    <p style="font-size: 20px">حسابك غير نشط. يُرجى الانتظار حتى يتحقق منه المدير ويوافق عليه.</p>
                </div>
            </div>
        @endif

        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">إجمالي الدورات</p>
                                <h4 class="my-1 text-info">32</h4>
                                <p class="mb-0 font-13">+2 دورة عن الأسبوع الماضي</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class='bx bx-book-open'></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">إجمالي الأرباح</p>
                                <h4 class="my-1 text-danger">$12,345</h4>
                                <p class="mb-0 font-13">+5.4% عن الأسبوع الماضي</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i
                                    class='bx bx-wallet'></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">معدل التفاعل</p>
                                <h4 class="my-1 text-success">74%</h4>
                                <p class="mb-0 font-13">-3.2% عن الأسبوع الماضي</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i
                                    class='bx bx-bar-chart-alt-2'></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">عدد الطلاب</p>
                                <h4 class="my-1 text-warning">8,421</h4>
                                <p class="mb-0 font-13">+3.6% عن الأسبوع الماضي</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i
                                    class='bx bx-user'></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->

        <div class="row">
            <div class="col-12 col-lg-8 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header d-flex justify-content-between">
                        <h6 class="mb-0">نظرة عامة على الدورات</h6>
                        <div class="dropdown">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                                <i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">نشاط</a></li>
                                <li><a class="dropdown-item" href="#">نشاط آخر</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center ms-auto font-13 gap-2 mb-3">
                            <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1"
                                    style="color: #14abef"></i>المبيعات</span>
                            <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1"
                                    style="color: #ffc107"></i>المشاهدات</span>
                        </div>
                        <div class="chart-container-1">
                            <canvas id="chart1"></canvas>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
                        <div class="col">
                            <div class="p-3">
                                <h5 class="mb-0">24.1K</h5>
                                <small class="mb-0">عدد الزوار <i class="bx bx-up-arrow-alt align-middle"></i>
                                    2.4%</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3">
                                <h5 class="mb-0">12:38</h5>
                                <small class="mb-0">مدة التصفح <i class="bx bx-up-arrow-alt align-middle"></i>
                                    12.6%</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3">
                                <h5 class="mb-0">6.3</h5>
                                <small class="mb-0">صفحات لكل زيارة <i class="bx bx-up-arrow-alt align-middle"></i>
                                    5.6%</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- الكارد الجانبي مثلاً "أشهر الدورات" -->
            <div class="col-12 col-lg-4 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header d-flex justify-content-between">
                        <h6 class="mb-0">أشهر الدورات</h6>
                        <div class="dropdown">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                                <i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">عرض المزيد</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container-2">
                            <canvas id="chart2"></canvas>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li
                            class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                            دورة التصميم الجرافيكي <span class="badge bg-success rounded-pill">350</span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                            دورة برمجة الويب <span class="badge bg-danger rounded-pill">270</span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                            دورة الأمن السيبراني <span class="badge bg-primary rounded-pill">190</span>
                        </li>
                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                            دورة تطوير التطبيقات <span class="badge bg-warning text-dark rounded-pill">130</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!--end row-->

        <div class="card radius-10">
            <div class="card-header d-flex justify-content-between">
                <h6 class="mb-0">الطلاب الجدد المسجلين</h6>
                <div class="dropdown">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                        <i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>الاسم</th>
                                <th>الصورة</th>
                                <th>البريد الإلكتروني</th>
                                <th>الحالة</th>
                                <th>الدورة</th>
                                <th>تاريخ التسجيل</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>أحمد العتيبي</td>
                                <td><img src="{{ asset('backend/assets/images/avatars/avatar-1.png') }}"
                                        class="product-img-2" alt="avatar"></td>
                                <td>ahmed@email.com</td>
                                <td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">نشط</span></td>
                                <td>برمجة الويب</td>
                                <td>26 يوليو 2025</td>
                            </tr>
                            <!-- يمكنك إضافة المزيد هنا -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
