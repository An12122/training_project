@extends('backend.instructor.master')

<style>
    .form-check-input {
        width: 2.5rem;
        height: 1.5rem;
        transform: scale(1.3);
    }
</style>

@section('content')
    <div class="page-content" dir="rtl">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">الكوبونات</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">جميع الكوبونات</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div style="display: flex; align-items:center; justify-content:space-between">
            <h6 class="mb-0 text-uppercase">جميع كوبونات الخصم</h6>
            <a href="{{ route('instructor.coupon.create') }}" class="btn btn-primary px-5">إنشاء كوبون</a>
        </div>

        <hr />

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>اسم الكوبون</th>
                                <th>نسبة الخصم</th>
                                <th>تاريخ الصلاحية</th>
                                <th>الحالة</th>
                                <th>الخيارات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_coupon as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->coupon_name }}</td>
                                    <td>{{ $item->coupon_discount }}%</td>
                                    <td>{{ \Carbon\Carbon::parse($item->coupon_validity)->format('d-m-Y') }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge bg-primary px-3 py-2" style="font-weight: 200">نشط</span>
                                        @else
                                            <span class="badge bg-danger px-3 py-2" style="font-weight: 200">غير نشط</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('instructor.coupon.edit', $item->id) }}" class="btn btn-primary">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <a href="javascript:void(0)" class="btn btn-danger delete-category"
                                            data-id="{{ $item->id }}" style="margin-right: 10px">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>

                                        <form id="delete-form" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('click', '.delete-category', function(e) {
            e.preventDefault();
            let couponId = $(this).data('id');
            let deleteUrl = "{{ route('instructor.coupon.destroy', ':id') }}".replace(':id', couponId);

            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "لن يمكنك التراجع بعد الحذف!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم، احذفه!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-form').attr('action', deleteUrl).submit();
                }
            });
        });
    </script>
@endpush
