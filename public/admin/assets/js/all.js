var token = jQuery('meta[name="csrf-token"]').attr('content');

function select2LoadData(url, target){
    $(target).select2({
        language: {
            searching: function() {
                return "Đang tìm kiếm...";
            },
            noResults: function(){
                return "Không tìm thấy kết quả.";
            }
        },
        placeholder: "Chọn",
        theme: 'bootstrap4',
        allowClear: true,
        ajax: {
            delay: 250,  // wait 250 milliseconds before triggering the request
            url: url,
            dataType: 'json',
            processResults: function (data, params) {
                return data;
            }
        }
    });
}
function selectImageCKFinder( preview, in_value, type ) {
    var url_home = $('meta[name="url-home"]').attr('content');
	CKFinder.popup( {
		width: 800,
		height: 600,
		chooseFiles: true,
		rememberLastFolder: true,
		onInit: function( finder ) {

			finder.on( 'files:choose', function( evt ) {

				if(type == 'MULTIPLE'){
					var files = evt.data.files;

				    var html = '', url_file;
				    var value = $(in_value).val() ? $(in_value).val()+',' : '' ;
				    files.forEach( function( file, i ) {
						url_file = file.getUrl().replace(url_home, ''); 
				    	html += `<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mt-3">
                                    <span data-route="0" data-url="${url_file}" class="delete-image-ckfinder">
                                        <i class="fas fa-times pointer"></i>
                                    </span>
                                    <img src="${file.getUrl()}" width="100%">
                                    <input type="hidden" name="gallery_id[]" value="0" />
                                </div>`;
						if(i < files.length - 1){
							value += url_file + ',';
						}else{
							value += url_file;
						}
				    } );
				    $(preview).append(html);
				    $(in_value).val(value);
				}
				else{
                    var file = evt.data.files.first();
					$(preview).attr('src', file.getUrl());
					$(in_value).val(file.getUrl().replace(url_home, ''));
				}
			} );
		}
		
	} );
	
}

function selectFileCKFinder( in_value ) {
	CKFinder.popup( {
		chooseFiles: true,
		width: 800,
		height: 600,
		onInit: function( finder ) {

			finder.on( 'files:choose', function( evt ) {

                var file = evt.data.files.first();
                $(in_value).val(file.getUrl());

			} );
		}
		
	} );
}
function deleteItemGallery(that, input) {
	var url = that.data('url'), 
		url_file = input.val().replace(url, ''); 
        
	if(url_file.indexOf(',,') !== -1) {
		url_file = url_file.replace(',,', ',');	
	}
	if(url_file.indexOf(',') == 0) {
		url_file = url_file.slice(1);	
	}
	if(url_file.lastIndexOf(',') == url_file.length - 1) {
		url_file = url_file.slice(0, -1);	
	}
	input.val(url_file);

}
function endAjax(element, text){

    element = element.find('button[type="submit"]');
    element.removeAttr('disabled');
    element.html(text);
    
    // $('.select2-selection__rendered').empty();
}
$(document).ready(function () {
    $("form").submit(function(){
        $(this).find("button[type='submit']").attr("disabled", "disabled");
        $(this).find("button[type='submit']").html('<span class="spinner-grow spinner-grow-sm"></span> Đang xử lý..');
    });

    $("button.submit-form").click(function(){
        if(!confirm("Bạn có muốn thực hiện?")){
            return;
        }
        $($(this).data('target')).submit();
    });
    // $("textarea.ckeditor").ckeditor();

});

$(document).on('click', '.delete-image-ckfinder', function(e) {
	if(!confirm('Bạn có muốn thực hiện ?')){
		return;
	}
	var that = $(this), route = that.data('route'), 
	input = $(that.parents('.wrap-ckfinder-multiple').find('input')), 
	flag = true;
	
	deleteItemGallery(that, input);
	if(route != 0 && route != null){
		flag = deleteItemGalleryData(route, input);
	}

	if(flag){
		that.parent().remove();
	}
});

//thông báo lỗi khi chưa chọn bản ghi để xử lý
$(document).on('submit', '#formMultiple', function(e) {

	if($('.check-list:checked').length == 0){
		e.preventDefault();
        $.toast({
            heading: 'Thông báo',
            text: 'Vui lòng chọn bản ghi để thực hiện',
            position: 'top-right',
            icon: 'warning'
        });
        endAjax($(this), 'Áp dụng');
		return;
    }
	if(!confirm('Bạn có muốn thực hiện?')){
		e.preventDefault();
		endAjax($(this), 'Áp dụng');
		return;
	}
})

//check all
$(document).on('click', '.check-all', function(e) {
    $(".check-list").prop('checked', $(this).prop('checked'));
    if($(this).prop('checked') == true){
        $('.check-all').prop('checked', true);
        $(".select-action-multiple").removeAttr('style');
    }
    else{
        $('.check-all').prop('checked', false);
        $(".select-action-multiple").css('display', 'none');
    }
});

$(document).on('click', '.check-list', function(e) {
    if($(this).prop('checked') == false){
        $('.check-all').prop('checked', false);
    }
    if($('.check-list:checked').length == $('.check-list').length){
        $('.check-all').prop('checked', true);
    }
    if($('.check-list:checked').length > 0){
        $(".select-action-multiple").removeAttr('style');
    }else{
        $(".select-action-multiple").css('display', 'none');
    }
});

$(document).on('click', '.add-image-ckfinder', function(event) {
	/* Act on the event */
	var preview = $(this).data('preview');
	
	var in_value = $(this).data('input');

	var type = $(this).data('type');
	selectImageCKFinder( preview, in_value, type );
});

$(document).on('click', '.add-file-ckfinder', function(event) {
	/* Act on the event */
	// var preview = $(this).data('preview');
	
	var in_value = $(this).data('input');

	var type = $(this).data('type');
	selectFileCKFinder( in_value );
});


$(document).on('click', '.focus-form', function () {
    if(!confirm("Bạn có muốn thực hiện?")){
        return;
    }
    var form = $(this).data('target'), action = $(this).data('route');
    $(form).attr('action', action);
    $(form).submit();
});