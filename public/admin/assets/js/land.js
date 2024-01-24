$(document).ready(function() {
    $('.select2bs4[name="district_id"]').select2({
        language: {
            searching: function() {
                return "Đang tìm kiếm...";
            },
            noResults: function(){
                return "Không tìm thấy kết quả.";
            }
        },
        placeholder: "Vui lòng chọn quận/huyện",
        theme: 'bootstrap4',
        ajax: {
            delay: 250,  // wait 250 milliseconds before triggering the request
            url: routeDistrict,
            dataType: 'json'
        }
    });

    $('.select2bs4[name="ward_id"]').select2({
        language: {
            searching: function() {
                return "Đang tìm kiếm...";
            },
            noResults: function(){
                return "Không tìm thấy kết quả.";
            }
        },
        placeholder: "Vui lòng chọn phường/xã",
        theme: 'bootstrap4'
    });
})
$('.select2bs4[name="district_id"]').on('change.select2', function (e) { 
    
    var district_code = $(this).val(), 
    elmRender = $('.select2bs4[name="ward_id"]'),
    html = '';
    $.ajax({
        type: "GET",
        url: routeWard,
        data: { district_code: district_code },
        dataType: "json",
        success: function (response) {
            $.each(response.results, (index, item) => {
                html += `<option value="${item.id}">${item.text}</option>`;
            });
            elmRender.html(html);
            
        }
    });
    
});