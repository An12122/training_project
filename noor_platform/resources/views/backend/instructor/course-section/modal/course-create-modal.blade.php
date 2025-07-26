<div class="modal" id="course-{{ $data->id }}">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">

            <!-- رأس النافذة -->
            <div class="modal-header">
                <h4 class="modal-title">إضافة محاضرة</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
            </div>

            <!-- جسم النافذة -->
            <div class="modal-body">
                <form method="post" action="{{ route('instructor.lecture.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}" />
                    <input type="hidden" name="section_id" value="{{ $data->id }}" />

                    <div class="col-md-12">
                        <label for="lecture_title" class="form-label">عنوان المحاضرة</label>
                        <input type="text" class="form-control" name="lecture_title" id="lecture-title"
                            placeholder="أدخل عنوان المحاضرة" required>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="video_url" class="form-label">رابط فيديو يوتيوب</label>
                        <input type="url" class="form-control" name="url" id="video_url"
                            placeholder="أدخل رابط فيديو يوتيوب" value="{{ old('url') }}" required>
                        <iframe id="videoPreview" style="margin-top: 15px; display: none; width: 100%; height: 400px;"
                            frameborder="0" allowfullscreen></iframe>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="video_duration" class="form-label">مدة الفيديو (بالدقائق)</label>
                        <input type="number" step="0.01" class="form-control" name="video_duration"
                            value="{{ old('video_duration') }}" id="video_duration" required />
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="content" class="form-label">محتوى المحاضرة</label>
                        <textarea class="form-control editor" name="content" required></textarea>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary w-100">إرسال</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let modal = document.getElementById("course-{{ $data->id }}");
            let videoInput = modal.querySelector("#video_url");
            let videoPreview = modal.querySelector("#videoPreview");

            modal.addEventListener("shown.bs.modal", function() {
                videoInput.addEventListener("input", function() {
                    let url = videoInput.value;
                    let videoId = extractYouTubeVideoID(url);

                    if (videoId) {
                        videoPreview.src = `https://www.youtube.com/embed/${videoId}`;
                        videoPreview.style.display = "block";
                    } else {
                        videoPreview.src = "";
                        videoPreview.style.display = "none";
                    }
                });
            });

            modal.addEventListener("hidden.bs.modal", function() {
                videoPreview.src = ""; // إعادة تعيين الفيديو عند إغلاق النافذة
                videoPreview.style.display = "none";
            });

            function extractYouTubeVideoID(url) {
                let regex =
                    /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/;
                let match = url.match(regex);
                return match ? match[1] : null;
            }
        });
    </script>
@endpush
