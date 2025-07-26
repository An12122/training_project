$(document).ready(function () {
    $('#name').on('input', function () {
        let name = $(this).val();
        let slug = name.trim()
            .toLowerCase()
            .replace(/\s+/g, '-')
            .replace(/[^\w\u0600-\u06FF-]/g, '')
            .replace(/-+/g, '-');
        $('#slug').val(slug);
    });
});
