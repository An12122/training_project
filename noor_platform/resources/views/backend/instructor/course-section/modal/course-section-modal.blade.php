<!-- مودال إضافة قسم جديد -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">إضافة قسم</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- المحتوى-->
            <div class="modal-body">
                <form method="post" action="{{ route('instructor.course-section.store') }}">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}" />
                    <div>
                        <label for="section" class="form-label">عنوان القسم</label>
                        <input type="text" class="form-control" name="section_title" id="section-title"
                            placeholder="أدخل عنوان القسم" required>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary w-100">إرسال</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
