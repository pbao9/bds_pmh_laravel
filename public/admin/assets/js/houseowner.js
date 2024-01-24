$(document).ready(function() {
    $('.select2bs4[name="district_id"]').select2({
        language: {
            searching: function() {
                return "Đang tìm kiếm...";
            },
            noResults: function() {
                return "Không tìm thấy kết quả.";
            }
        },
        placeholder: "Vui lòng chọn quận/huyện",
        theme: 'bootstrap4',
        ajax: {
            delay: 250, // wait 250 milliseconds before triggering the request
            url: routeDistrict,
            dataType: 'json'
        }
    });


})