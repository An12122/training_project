@extends('backend.instructor.master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">قسائم الخصم</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">إضافة قسيمة</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card col-md-8">
            <div class="card-body p-4">
                <div style="display: flex; align-items:center; justify-content:space-between">
                    <h5 class="mb-4">إنشاء قسيمة خصم</h5>
                    <a href="{{ route('instructor.coupon.index') }}" class="btn btn-primary">العودة</a>
                </div>

                <form class="row g-3" method="post" action="{{ route('instructor.coupon.store') }}">
                    @csrf

                    @if ($errors->any())
                        <ul class="text-danger" style="list-style:none">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="col-md-6">
                        <label for="coupon_name" class="form-label">اسم القسيمة</label>
                        <input type="text" class="form-control" name="coupon_name" id="coupon_name"
                            value="{{ old('coupon_name') }}" placeholder="أدخل اسم القسيمة">
                    </div>

                    <div class="col-md-6">
                        <label for="coupon_discount" class="form-label">قيمة الخصم</label>
                        <input type="text" class="form-control" name="coupon_discount" id="coupon_discount"
                            value="{{ old('coupon_discount') }}" placeholder="أدخل قيمة الخصم">
                    </div>

                    <div class="col-md-6">
                        <label for="coupon_validity" class="form-label">تاريخ الانتهاء</label>
                        <input type="date" class="form-control" name="coupon_validity" id="coupon_validity"
                            value="{{ old('coupon_validity') }}">
                    </div>

                    <div class="col-md-6">
                        <label for="status" class="form-label">الحالة</label>
                        <select id="status" name="status" class="form-select" value="{{ old('status') }}">
                            <option selected value="1">مفعل</option>
                            <option value="0">غير مفعل</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary px-4 w-100">حفظ القسيمة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
