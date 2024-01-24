<script>

function select2SearchColumnsDatatables(){
    // search data for district
    $('.select2bs4[name="district_id"]').select2({
        language: {
            searching: function() {
                return "Đang tìm kiếm...";
            },
            noResults: function(){
                return "Không tìm thấy kết quả.";
            }
        },
        placeholder: "Chọn quận/huyện",
        theme: 'bootstrap4',
        ajax: {
            delay: 250,  // wait 250 milliseconds before triggering the request
            url: routeDistrict,
            dataType: 'json',
            processResults: function (data, params) {
                data.results.unshift({ id: 0, text: "Tất cả" });
                return data;
            }
        }
    });
    // focus select2 in ward
    $('.select2bs4[name="ward_id"]').select2({
        language: {
            searching: function() {
                return "Đang tìm kiếm...";
            },
            noResults: function(){
                return "Không tìm thấy kết quả.";
            }
        },
        placeholder: "Chọn phường/xã",
        theme: 'bootstrap4'
    });
}
// event change district and render data for ward
$(document).on('change.select2', '.select2bs4[name="district_id"]', function (e) { 

    var district_code = $(this).val(), 
    elmRender = $('.select2bs4[name="ward_id"]'),
    html = '<option value="">---Tất cả---</option>';
    console.log(district_code);
    $.ajax({
        type: 'GET',
        url: routeWard,
        data: { district_code: district_code },
        dataType: 'json',
        success: function (response) {
            $.each(response.results, (index, item) => {
                html += '<option value="'+item.id+'">'+item.text+'</option>';
            });
            elmRender.html(html);
            
        }
    });

})

</script>