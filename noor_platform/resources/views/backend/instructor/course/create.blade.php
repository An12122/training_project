@extends('backend.instructor.master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">الدورة التدريبية</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">إضافة دورة</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card col-md-12">
            <div class="card-body">
                <div class="card-body p-4">
                    <div style="display: flex; align-items:center; justify-content:space-between">
                        <h5 class="mb-4">إضافة دورة</h5>
                        <a href="{{ route('instructor.course.index') }}" class="btn btn-primary">رجوع</a>
                    </div>

                    <form class="row g-3" method="post" action="{{ route('instructor.course.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <input type="hidden" name="instructor_id" value="{{ auth()->user()->id }}" />

                        <div class="col-md-6">
                            <label for="name" class="form-label">اسم الدورة</label>
                            <input type="text" class="form-control" name="course_name" id="name"
                                placeholder="أدخل اسم الدورة" value="{{ old('course_name') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="slug" class="form-label">الرابط المختصر (Slug)</label>
                            <input type="text" class="form-control" name="course_name_slug" id="slug"
                                placeholder="أدخل الرابط المختصر" value="{{ old('course_name_slug') }}" required>
                        </div>

                        <div class="col-md-12">
                            <label for="course_title" class="form-label">عنوان الدورة</label>
                            <input type="text" class="form-control" name="course_title" id="course_title"
                                placeholder="أدخل عنوان الدورة" value="{{ old('course_title') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="category" class="form-label">اختر التصنيف</label>
                            <select class="form-select" name="category_id" id="category" required>
                                <option value="" disabled selected>اختر التصنيف</option>
                                @foreach ($all_categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="subcategory" class="form-label">اختر التصنيف الفرعي</label>
                            <select class="form-select" name="subcategory_id" id="subcategory" required>
                                <option value="" disabled selected>اختر التصنيف الفرعي</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="image" class="form-label">صورة الدورة</label>
                            <input type="file" class="form-control" name="image" id="Photo" accept="image/*">
                            <div style="margin-top: 10px">
                                <img src="" id="photoPreview" class="img-fluid"
                                    style="margin-top: 15px; display: none;" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="resources" class="form-label">عدد الموارد القابلة للتحميل</label>
                            <input class="form-control" type="number" name="resources" id="resources"
                                placeholder="أدخل عدد الموارد القابلة للتحميل" value="{{ old('resources') }}" />
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">وصف الدورة</label>
                            <textarea class="form-control editor" name="description" id="description" required> {{ old('description') }} </textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="video_url" class="form-label">رابط فيديو يوتيوب</label>
                            <input type="url" class="form-control" name="video_url" id="video_url"
                                placeholder="أدخل رابط فيديو يوتيوب" value="{{ old('video_url') }}" required>
                            <iframe id="videoPreview" style="margin-top: 15px; display: none; width: 100%; height: 400px;"
                                frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="col-md-6">
                            <label for="label" class="form-label">مستوى الدورة</label>
                            <select class="form-select" name="label" id="label" required>
                                <option selected disabled>اختر المستوى</option>
                                <option value="beginner">مبتدئ</option>
                                <option value="intermediate">متوسط</option>
                                <option value="advanced">متقدم</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="certificate" class="form-label">شهادة</label>
                            <select class="form-select" name="certificate" id="certificate" required>
                                <option selected disabled>اختر</option>
                                <option value="yes">نعم</option>
                                <option value="no">لا</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="selling_price" class="form-label">سعر البيع</label>
                            <input type="number" class="form-control" name="selling_price" id="selling_price"
                                placeholder="أدخل سعر البيع" value="{{ old('selling_price') }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="discount_price" class="form-label">سعر الخصم</label>
                            <input type="number" class="form-control" name="discount_price" id="discount_price"
                                placeholder="أدخل سعر الخصم" value="{{ old('discount_price') }}" />
                        </div>

                        <div class="col-md-6">
                            <label for="duration" class="form-label">مدة الدورة (بالساعات)</label>
                            <input type="number" step="0.01" class="form-control" name="duration" id="duration"
                                placeholder="أدخل مدة الدورة" value="{{ old('duration') }}" />
                        </div>

                        <div class="col-md-12">
                            <label for="prerequisites" class="form-label">متطلبات الدورة</label>
                            <textarea class="form-control editor" name="prerequisites" id="prerequisites">{{ old('prerequisites') }}</textarea>
                        </div>

                        <div class="col-md-12">
