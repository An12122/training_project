@extends('backend.admin.master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        @include('backend.section.breadcrumb', ['title'=> 'Category', 'sub_title'=> 'Update-Category'])
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-4">
                        <div style="display: flex; align-items:center; justify-content:space-between">
                            <h5 class="mb-4">Update Category</h5>
                            <a href="{{ route('admin.category.index') }}" class="btn btn-primary">Back</a>
                        </div>

                        <form class="row g-3" method="post" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                       placeholder="Category Name" value="{{ old('name', $category->name) }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                       placeholder="Create Unique Slug" value="{{ old('slug', $category->slug) }}">
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <img src="{{ $category->image ? asset($category->image) : '' }}" id="photoPreview" width="60" height="60"
                                     style="margin-top: 15px; {{ $category->image ? '' : 'display: none;' }}" />
                            </div>

                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('customjs/admin/category.js') }}"></script>

    <script>
        // تحديث الصورة عند اختيار ملف جديد
        document.getElementById('image').addEventListener('change', function () {
            const [file] = this.files;
            if (file) {
                const preview = document.getElementById('photoPreview');
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            }
        });
    </script>
@endpush
